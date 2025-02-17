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
        $search_genre = $request->input('genre');
        $genres = Genre::all();

        if ($search || $search_genre) {
            // Jika ada query pencarian, tampilkan hasil pencarian berdasarkan slug, kategori, dan genre
            $films = Film::query();

            // Jika ada pencarian berdasarkan slug atau kategori_film
            if ($search) {
                $films = $films->where('slug', 'like', '%' . $search . '%')
                    ->orWhere('kategori_film', 'like', '%' . $search . '%');
            }

            // Jika ada pencarian berdasarkan genre
            if ($search_genre) {
                $films = $films->whereHas('genre_relations.genre', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            // Ambil data film berdasarkan kondisi pencarian yang sudah digabung
            $films = $films->get();

            return view('home', compact('films', 'search', 'search_genre', 'genres'));
        } else {
            // Jika tidak ada query pencarian, tampilkan data default
            $movies = Film::latest()->where('kategori_film', 'movies')->take(12)->get();
            $series = Film::latest()->where('kategori_film', 'series')->take(12)->get();
            $animes = Film::latest()->where('kategori_film', 'anime')->take(12)->get();
            return view('home', compact('movies', 'series', 'animes', 'genres'));
        }
    }

    public function movies(Request $request)
    {
        $search = $request->input('search');
        $search_genre = $request->input('genre');
        $genres = Genre::all();

        if ($search || $search_genre) {
            $films = Film::where('kategori_film', 'movies');

            if ($search) {
                $films = $films->where('slug', 'like', '%' . $search . '%');
            }

            if ($search_genre) {
                $films = $films->whereHas('genre_relations.genre', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            $films = $films->get();

            return view('movies', compact('films', 'search', 'search_genre', 'genres'));
        } else {
            $movies = Film::latest()->where('kategori_film', 'movies')->paginate(12);
            return view('movies', compact('movies', 'genres'));
        }
    }

    public function series(Request $request)
    {
        $search = $request->input('search');
        $search_genre = $request->input('genre');
        $genres = Genre::all();

        if ($search || $search_genre) {
            $films = Film::where('kategori_film', 'series');

            if ($search) {
                $films = $films->where('slug', 'like', '%' . $search . '%');
            }

            if ($search_genre) {
                $films = $films->whereHas('genre_relations.genre', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            $films = $films->get();

            return view('series', compact('films', 'search', 'search_genre', 'genres'));
        } else {
            $series = Film::latest()->where('kategori_film', 'series')->paginate(12);
            return view('series', compact('series', 'genres'));
        }
    }

    public function animes(Request $request)
    {
        $search = $request->input('search');
        $search_genre = $request->input('genre');
        $genres = Genre::all();

        if ($search || $search_genre) {
            $films = Film::where('kategori_film', 'anime');

            if ($search) {
                $films = $films->where('slug', 'like', '%' . $search . '%');
            }

            if ($search_genre) {
                $films = $films->whereHas('genre_relations.genre', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            $films = $films->get();

            return view('anime', compact('films', 'search', 'search_genre', 'genres'));
        } else {
            $animes = Film::latest()->where('kategori_film', 'anime')->paginate(12);
            return view('anime', compact('animes', 'genres'));
        }
    }

    public function show($slug)
    {
        $film = Film::where('slug', $slug)->firstOrFail();

        $genres = Genre_relation::with('genre')
            ->where('id_film', $film->id)
            ->get()
            ->pluck('genre'); // Ambil hanya data genre

        $castings = Casting::where('id_film', $film->id)->get();

        $comment = Comment::where('id_film', $film->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $countComment = Comment::where('id_user', auth()->id())->where('id_film', $film->id)->count();

        $ratings = Comment::where('id_film', $film->id)->pluck('rating');

        $numberOfComments = $ratings->count() ?? 0;
        if ($ratings->isNotEmpty()) {
            $totalRatings = $ratings->sum();
            $numberOfComments = $ratings->count();
            $averageRating = $totalRatings / $numberOfComments;
            $roundedAverage = round($averageRating, 1); // Bulatkan ke 1 desimal
        } else {
            $roundedAverage = 0;
        }

        return view('detail', get_defined_vars());
    }
}
