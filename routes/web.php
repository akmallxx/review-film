<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\GenreRelationsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/home');
});

Route::get('/dashboard', function () {
    return redirect()->to('/home');
})->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/movies', [HomeController::class, 'movies'])->name('movies');
Route::get('/series', [HomeController::class, 'series'])->name('series');
Route::get('/anime', [HomeController::class, 'animes'])->name('anime');

Route::get('/detail/{slug}', [HomeController::class, 'show'])->name('film.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
});

Route::group(['middleware' => ['can:crud author']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin');

        Route::get('/film', [FilmController::class, 'index'])->name('admin.film');
        Route::get('/film/create', [FilmController::class, 'create'])->name('admin.film.create');
        Route::post('/film/store', [FilmController::class, 'store'])->name('admin.film.store');
        Route::get('/film/edit/{id}', [FilmController::class, 'edit'])->name('admin.film.edit');
        Route::put('/film/update/{id}', [FilmController::class, 'update'])->name('admin.film.update');
        Route::delete('/film/delete/{id}', [FilmController::class, 'destroy'])->name('admin.film.delete');
        
        Route::get('/genre-relations', [GenreRelationsController::class, 'index'])->name('admin.genre-relations');
        Route::get('/genre-relations/create', [GenreRelationsController::class, 'create'])->name('admin.genre-relations.create');
        Route::post('/genre-relations/store', [GenreRelationsController::class, 'store'])->name('admin.genre-relations.store');
        Route::get('/genre-relations/edit/{id}', [GenreRelationsController::class, 'edit'])->name('admin.genre-relations.edit');
        Route::put('/genre-relations/update/{id}', [GenreRelationsController::class, 'update'])->name('admin.genre-relations.update');
        Route::delete('/genre-relations/delete/{id}', [GenreRelationsController::class, 'destroy'])->name('admin.genre-relations.delete');
        
        Route::group(['middleware' => ['can:crud admin']], function () {
            Route::get('/users', [UserController::class, 'index'])->name('admin.users');
            Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::put('/users/update/{user}', [UserController::class, 'update'])->name('admin.users.update');
            Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');
        });
    });
});

require __DIR__ . '/auth.php';
