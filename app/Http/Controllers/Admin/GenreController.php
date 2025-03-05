<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genre.index', compact( 'genres'));
    }

    public function create($id = null)
    {
        $genres = Genre::all();
        return view('admin.genre.create', compact('genres'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        genre::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.genre')->with('success', 'Genre berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);

        return view('admin.genre.create', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $genre = Genre::findOrFail($id);
        $genre->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('admin.genre')->with('success', 'Data genre berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            Genre::findOrFail($id)->delete();

            return redirect()->route('admin.genre')->with('success', 'Genre berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.genre')->with('error', 'Data tidak ditemukan atau terjadi kesalahan.');
        }
    }
}
