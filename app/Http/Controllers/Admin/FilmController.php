<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Genre_relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Str;

class FilmController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->can('crud admin')) {
            $films = Film::all();
        } elseif ($user->can('crud author')) {
            $films = Film::where('id_users', $user->id)->get();
        } else {
            $films = collect(); // Jika tidak memiliki izin, tampilkan koleksi kosong
        }

        $columns = array_map('strtoupper', DB::getSchemaBuilder()->getColumnListing('films'));

        return view('admin.film.index', compact('films', 'columns'));
    }

    public function create($id = null)
    {

        $film = new Film();
        $genres = Genre::orderBy('title', 'asc')->get();

        return view('admin.film.create', get_defined_vars());
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::orderBy('title', 'asc')->get();
        $selectedGenres = $film->genres->pluck('id')->toArray();    

        return view('admin.film.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'pencipta' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'tahun_rilis' => 'required|integer|min:1800|max:' . date('Y'),
                'durasi' => 'required|integer|min:1', // Validasi sebagai integer dengan minimal 1 menit
                'kategori_umur' => 'required|string',
                'poster_method' => 'required|in:url,upload',
                'poster_url' => 'nullable|required_if:poster_method,url|url',
                'poster_file' => 'nullable|required_if:poster_method,upload|image|mimes:jpeg,png,jpg,gif|max:2048',
                'trailer' => 'required',
                'kategori_film' => 'nullable|string|max:255',
                'total_episode' => 'nullable|integer|min:1',
                'id_genre' => 'nullable|array',
                'id_genre.*' => 'integer|exists:genres,id',
            ]);

            // Tentukan nilai poster
            if ($request->poster_method == 'url' && $request->poster_url) {
                $poster = $request->poster_url;
            } else {
                try {
                    if (!$request->hasFile('poster_file')) {
                        throw new Exception('File poster harus diunggah!');
                    }
                    $file = $request->file('poster_file');
                    $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                    $poster = $file->storeAs('posters', $filename, 'public');
                } catch (Exception $e) {
                    return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
                }
            }

            // Buat film baru
            $film = Film::create([
                'poster' => $poster,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul . ' ' . $request->tahun_rilis),
                'pencipta' => $request->pencipta,
                'deskripsi' => $request->deskripsi,
                'tahun_rilis' => $request->tahun_rilis,
                'durasi' => (int)$request->durasi,
                'kategori_umur' => $request->kategori_umur,
                'kategori_film' => $request->kategori_film,
                'total_episode' => $request->total_episode,
                'trailer' => $request->trailer,
                'id_users' => Auth::id(),
            ]);

            // Simpan relasi genre jika ada
            if ($request->has('id_genre') && is_array($request->id_genre)) {
                foreach ($request->id_genre as $genre_id) {
                    $genreRelation = new Genre_relation();
                    $genreRelation->id_film = $film->id;
                    $genreRelation->id_genre = $genre_id;
                    $genreRelation->save();
                }
            }

            return redirect()->route('admin.film')->with('success', 'Film berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('admin.film')->with('error', 'Terjadi kesalahan saat menambahkan film: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id_film)
    {
        try {
            // Cari film berdasarkan ID
            $film = Film::findOrFail($id_film);

            // Validasi data yang masuk
            $validated = $request->validate([
                'judul' => 'nullable|string|max:255',
                'pencipta' => 'nullable|string|max:255',
                'deskripsi' => 'nullable|string',
                'tahun_rilis' => 'nullable|integer|min:1800|max:' . date('Y'),
                'durasi' => 'nullable|integer|min:1',
                'kategori_umur' => 'nullable|string',
                'poster_method' => 'nullable|in:url,upload',
                'poster_url' => 'nullable|required_if:poster_method,url|url',
                'poster_file' => 'nullable|required_if:poster_method,upload|image|mimes:jpeg,png,jpg,gif|max:2048',
                'trailer' => 'nullable',
                'kategori_film' => 'nullable|string|max:255',
                'total_episode' => 'nullable|integer|min:1',
                'id_genre' => 'nullable|array',
                'id_genre.*' => 'integer|exists:genres,id',
            ]);

            // Tentukan nilai poster
            if ($request->poster_method == 'url' && $request->poster_url) {
                $posterPath = $request->poster_url;
            } elseif ($request->hasFile('poster_file')) {
                // Hapus poster lama jika ada
                if ($film->poster && Storage::disk('public')->exists($film->poster)) {
                    Storage::disk('public')->delete($film->poster);
                }
                // Simpan file baru
                $file = $request->file('poster_file');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $posterPath = $file->storeAs('posters', $filename, 'public');
            } else {
                $posterPath = $film->poster; // Gunakan yang lama jika tidak ada perubahan
            }

            // Update data hanya jika ada input baru
            $film->update([
                'judul' => $validated['judul'] ?? $film->judul,
                'slug' => isset($validated['judul']) ? Str::slug($validated['judul'] . ' ' . ($validated['tahun_rilis'] ?? $film->tahun_rilis)) : $film->slug,
                'pencipta' => $validated['pencipta'] ?? $film->pencipta,
                'deskripsi' => $validated['deskripsi'] ?? $film->deskripsi,
                'tahun_rilis' => $validated['tahun_rilis'] ?? $film->tahun_rilis,
                'durasi' => $validated['durasi'] ?? $film->durasi,
                'kategori_umur' => $validated['kategori_umur'] ?? $film->kategori_umur,
                'kategori_film' => $validated['kategori_film'] ?? $film->kategori_film,
                'total_episode' => $validated['total_episode'] ?? $film->total_episode,
                'trailer' => $validated['trailer'] ?? $film->trailer,
                'poster' => $posterPath,
            ]);

            // Update genre relations
            if ($request->has('id_genre')) {
                // Delete existing relations
                Genre_relation::where('id_film', $film->id)->delete();

                // Create new relations
                if (is_array($request->id_genre)) {
                    foreach ($request->id_genre as $genre_id) {
                        $genreRelation = new Genre_relation();
                        $genreRelation->id_film = $film->id;
                        $genreRelation->id_genre = $genre_id;
                        $genreRelation->save();
                    }
                }
            }

            return redirect()->route('admin.film')->with('success', 'Film berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('admin.film')->with('error', 'Terjadi kesalahan saat memperbarui film: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('admin.film')->with('success', 'Film berhasi dihapus');
    }
}
