<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Genre_relation;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Film::latest()->where('kategori_film', 'movies')->take(12)->get();
        $series = Film::latest()->where('kategori_film', 'series')->take(12)->get();
        $animes = Film::latest()->where('kategori_film', 'anime')->take(12)->get();

        return view('home', get_defined_vars());
    }

    public function movies()
    {
        $movies = Film::latest()->where('kategori_film', 'movies')->paginate(12);

        return view('movies', get_defined_vars());
    }
    public function series()
    {
        $series = Film::latest()->where('kategori_film', 'series')->paginate(12);

        return view('series', get_defined_vars());
    }
    public function animes()
    {
        $animes = Film::latest()->where('kategori_film', 'anime')->paginate(12);

        return view('anime', get_defined_vars());
    }

    public function show($id)
    {
        $film = Film::findOrFail($id);

        // Mengambil daftar genre unik untuk film tertentu
        $genres = Genre_relation::with('genre')
            ->where('id_film', $id) // Menambahkan filter berdasarkan ID film
            ->get()
            ->pluck('genre'); // Ambil hanya data genre

        return view('detail', compact('film', 'genres'));
    }
}
