<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['title' => 'Drama', 'slug' => 'drama'],
            ['title' => 'Romance', 'slug' => 'romance'],
            ['title' => 'Fantasi', 'slug' => 'fantasi'],
            ['title' => 'Horror', 'slug' => 'horror'],
            ['title' => 'Action', 'slug' => 'action'],
            ['title' => 'Sci-Fi', 'slug' => 'sci-fi'],
            ['title' => 'Adventure', 'slug' => 'adventure'],
            ['title' => 'Thriller', 'slug' => 'thriller'],
            ['title' => 'Crime', 'slug' => 'crime'],
            ['title' => 'Comedy', 'slug' => 'Comedy'],
        ];

        foreach ($genres as $genre) {
            Genre::firstOrCreate($genre);
        }
    }
}
