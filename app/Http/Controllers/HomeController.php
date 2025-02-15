<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Casting;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Genre_relation;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Jika ada query pencarian, tampilkan hasil pencarian
            $films = Film::where('judul', 'like', '%' . $search . '%')
                ->orWhere('kategori_film', 'like', '%' . $search . '%')
                ->get();

            return view('home', compact('films', 'search'));
        } else {
            // Jika tidak ada query, tampilkan data default
            $movies = Film::latest()->where('kategori_film', 'movies')->take(12)->get();
            $series = Film::latest()->where('kategori_film', 'series')->take(12)->get();
            $animes = Film::latest()->where('kategori_film', 'anime')->take(12)->get();
            return view('home', compact('movies', 'series', 'animes'));
        }
    }

    public function movies(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Jika ada query pencarian, tampilkan hasil pencarian
            $films = Film::where('judul', 'like', '%' . $search . '%')
                ->where('kategori_film', 'movies')
                ->get();

            return view('movies', compact('films', 'search'));
        } else {
            $movies = Film::latest()->where('kategori_film', 'movies')->paginate(12);
            return view('movies', compact('movies'));
        }
    }
    public function series(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Jika ada query pencarian, tampilkan hasil pencarian
            $films = Film::where('judul', 'like', '%' . $search . '%')
                ->where('kategori_film', 'series')
                ->get();

            return view('series', compact('films', 'search'));
        } else {
            $series = Film::latest()->where('kategori_film', 'series')->paginate(12);
            return view('series', compact('series'));
        }
    }
    public function animes(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Jika ada query pencarian, tampilkan hasil pencarian
            $films = Film::where('judul', 'like', '%' . $search . '%')
                ->where('kategori_film', 'anime')
                ->get();

            return view('anime', compact('films', 'search'));
        } else {
            $animes = Film::latest()->where('kategori_film', 'anime')->paginate(12);
            return view('anime', compact('animes'));
        }
    }

    public function show($slug)
    {
        // Ambil film berdasarkan slug
        $film = Film::where('slug', $slug)->firstOrFail();

        // Mengambil daftar genre unik untuk film tertentu
        $genres = Genre_relation::with('genre')
            ->where('id_film', $film->id) // Menggunakan ID film yang sudah diambil berdasarkan slug
            ->get()
            ->pluck('genre'); // Ambil hanya data genre

        $castings = Casting::where('id_film', $film->id)->get();

        $comment = Comment::where('id_film', $film->id) // Menggunakan ID film yang sudah diambil berdasarkan slug
            ->orderBy('created_at', 'asc') // Mengurutkan berdasarkan kolom 'created_at' secara menurun
            ->get();

        $ratings = Comment::where('id_film', $film->id)->pluck('rating');

        $numberOfComments = $ratings->count() ?? 0;
        if ($ratings->isNotEmpty()) {
            $totalRatings = $ratings->sum(); // Total semua rating
            $numberOfComments = $ratings->count(); // Jumlah komentar
            $averageRating = $totalRatings / $numberOfComments; // Rata-rata rating
            $roundedAverage = round($averageRating, 1); // Bulatkan ke 1 desimal
        } else {
            $roundedAverage = 0; // Jika tidak ada rating, set rata-rata ke 0
        }

        return view('detail', get_defined_vars());
    }
}
