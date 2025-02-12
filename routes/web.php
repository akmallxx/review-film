<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/detail/{id}', [HomeController::class, 'show'])->name('movies.detail');

Route::get('/dashboard', function () {
    return redirect()->to('/home');
})->name('dashboard');

Route::get('/movies', function () {
    return view('movies');
})->name('movies');

Route::get('/series', function () {
    return view('series');
})->name('series');

Route::get('/anime', function () {
    return view(view: 'anime');
})->name('anime');

Route::get('/genre', function () {
    return view('genres');
})->name('genre');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
