<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Casting;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Genre_relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $search_genre = $request->input('genre');
        $search_tahun = $request->input('tahun');
        
        $genres = Genre::all();
        $tahuns = Film::select('tahun_rilis')->orderBy('tahun_rilis', 'desc')->distinct()->get();

        if ($search || $search_genre || $search_tahun) {
            $films = Film::query();

            if ($search) {
                $films = $films->where('slug', 'like', '%' . $search . '%');
            }

            if ($search_tahun) {
                $films = $films->where('slug', 'like', '%-' . $search_tahun);
            }
            
            if ($search_genre) {
                $films = $films->whereHas('genres', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            $films = $films->get();

            // Menambahkan rating rata-rata ke setiap film
            $films->each(function ($film) {
                $film->average_rating = $this->calculateAverageRating($film->id);
            });

            return view('home', compact('films', 'search', 'search_genre', 'search_tahun', 'genres', 'tahuns'));
        } else {
            $populars = Film::withCount('comments')->orderByDesc('comments_count')->take(12)->get();
            $movies = Film::latest()->where('kategori_film', 'movies')->take(12)->get();
            $series = Film::latest()->where('kategori_film', 'series')->take(12)->get();
            $animes = Film::latest()->where('kategori_film', 'anime')->take(12)->get();

            // Menambahkan rating rata-rata ke setiap film
            $populars->each(function ($popular) {
                $popular->average_rating = $this->calculateAverageRating($popular->id);
            });
            
            $movies->each(function ($movie) {
                $movie->average_rating = $this->calculateAverageRating($movie->id);
            });

            $series->each(function ($series) {
                $series->average_rating = $this->calculateAverageRating($series->id);
            });

            $animes->each(function ($anime) {
                $anime->average_rating = $this->calculateAverageRating($anime->id);
            });

            return view('home', compact('movies', 'series', 'animes', 'genres', 'tahuns'));
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
                $films = $films->whereHas('genres', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            $films = $films->get();

            // Menambahkan rating rata-rata ke setiap film
            $films->each(function ($film) {
                $film->average_rating = $this->calculateAverageRating($film->id);
            });

            return view('movies', compact('films', 'search', 'search_genre', 'genres'));
        } else {
            $movies = Film::latest()->where('kategori_film', 'movies')->paginate(12);

            // Menambahkan rating rata-rata ke setiap film
            $movies->each(function ($movie) {
                $movie->average_rating = $this->calculateAverageRating($movie->id);
            });

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
                $films = $films->whereHas('genres', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            $films = $films->get();

            // Menambahkan rating rata-rata ke setiap film
            $films->each(function ($film) {
                $film->average_rating = $this->calculateAverageRating($film->id);
            });

            return view('series', compact('films', 'search', 'search_genre', 'genres'));
        } else {
            $series = Film::latest()->where('kategori_film', 'series')->paginate(12);

            // Menambahkan rating rata-rata ke setiap film
            $series->each(function ($series) {
                $series->average_rating = $this->calculateAverageRating($series->id);
            });

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
                $films = $films->whereHas('genres', function ($query) use ($search_genre) {
                    $query->where('slug', 'like', '%' . $search_genre . '%');
                });
            }

            $films = $films->get();

            // Menambahkan rating rata-rata ke setiap film
            $films->each(function ($film) {
                $film->average_rating = $this->calculateAverageRating($film->id);
            });

            return view('anime', compact('films', 'search', 'search_genre', 'genres'));
        } else {
            $animes = Film::latest()->where('kategori_film', 'anime')->paginate(12);

            // Menambahkan rating rata-rata ke setiap film
            $animes->each(function ($anime) {
                $anime->average_rating = $this->calculateAverageRating($anime->id);
            });

            return view('anime', compact('animes', 'genres'));
        }
    }


    public function show($slug)
    {
        $film = Film::where('slug', $slug)->firstOrFail();

        $genres = Genre_relation::with('genre')
            ->where('id_film', $film->id)
            ->get()
            ->sortBy(fn($item) => $item->genre->title)
            ->pluck('genre');

        $castings = Casting::where('id_film', $film->id)->get();

        $comment = Comment::where('id_film', $film->id)
            ->orderBy('created_at', 'desc')
            ->get();

        if (Auth::user() == null) {
            $user = null;
        } else {
            $user = Auth::user()->id;
        }
        $countComment = Comment::where('id_user', $user)->where('id_film', $film->id)->count();

        // Ambil rating dari komentar tanpa rating dari role admin dan author
        $ratings = Comment::where('id_film', $film->id)
            ->whereHas('user', function ($query) {
                $query->whereDoesntHave('roles', function ($roleQuery) {
                    $roleQuery->whereIn('name', ['admin', 'author']); // Mengabaikan role admin dan author
                });
            })
            ->pluck('rating');

        $numberOfComments = $ratings->count() ?? 0;
        $roundedAverage = $this->calculateAverageRating($film->id);

        return view('detail', get_defined_vars());
    }

    private function calculateAverageRating($filmId)
    {
        $ratings = Comment::where('id_film', $filmId)
            ->whereHas('user', function ($query) {
                $query->whereDoesntHave('roles', function ($roleQuery) {
                    $roleQuery->whereIn('name', ['admin', 'author']);
                });
            })
            ->pluck('rating');

        if ($ratings->isNotEmpty()) {
            return round($ratings->sum() / $ratings->count(), 1);
        }

        return 0;
    }
}
