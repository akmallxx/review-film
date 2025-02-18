<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre_relation;
use App\Models\Genre;
use App\Models\Film;

class GenreRelationsController extends Controller
{
    public function index()
    {
        $genre_relations = Genre_relation::with(['film', 'genre'])
            ->get()
            ->groupBy('film.judul');

        $genres = Genre::all();
        $films = Film::all();

        return view('admin.genre-relations.index', compact('films', 'genres', 'genre_relations'));
    }

    public function create($id = null)
    {
        $genres = Genre::all();
        $filmList = Film::all();
        return view('admin.genre-relations.create', compact('genres', 'filmList'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_film' => 'required|integer|exists:films,id',
            'id_genre' => 'required|array',
            'id_genre.*' => 'integer|exists:genres,id',
        ]);

        // Loop untuk menyimpan setiap genre yang dipilih
        foreach ($request->id_genre as $genre_id) {
            $filmGenre = new Genre_relation();
            $filmGenre->id_film = $request->id_film;
            $filmGenre->id_genre = $genre_id;
            $filmGenre->save();
        }

        // Redirect dengan pesan sukses
        return redirect()->route('admin.genre-relations')->with('success', 'Genre berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $filmList = Film::all();
        $genres = Genre::all();
        $selectedGenres = $film->genres->pluck('id')->toArray();

        return view('admin.genre-relations.create', compact('film', 'filmList', 'genres', 'selectedGenres'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'film' => 'required|exists:films,id',
            'id_genre' => 'array',
            'id_genre.*' => 'exists:genres,id'
        ]);

        // Cari film berdasarkan ID
        $film = Film::findOrFail($id);

        // Ambil genre yang sudah ada terkait dengan film ini
        $existingGenres = $film->genres->pluck('id')->toArray();

        // Ambil genre yang dikirimkan melalui request
        $newGenres = $request->id_genre ?? [];

        // Filter untuk genre yang belum ada di relasi, agar hanya menambahkan genre baru yang belum ada
        $genresToAdd = array_diff($newGenres, $existingGenres);

        // Update genre-film di pivot table hanya dengan genre baru yang belum ada
        if (count($genresToAdd) > 0) {
            $film->genres()->syncWithoutDetaching($genresToAdd); // Tidak menghapus genre yang tidak terpilih
        }

        return redirect()->route('admin.genre-relations')->with('success', 'Data genre berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            // Cari data berdasarkan ID
            $genreRelation = Genre_relation::findOrFail($id);

            // Hapus semua genre yang terkait dengan film yang sama
            Genre_relation::where('id_film', $genreRelation->id_film)->delete();

            return redirect()->route('admin.genre-relations')->with('success', 'Semua genre terkait berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.genre-relations')->with('error', 'Data tidak ditemukan atau terjadi kesalahan.');
        }
    }
}
