<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre_relation extends Model
{
    use HasFactory;

    // Model Genre_relation
    protected $table = 'genre_relations';
    protected $primaryKey = 'id';

    protected $fillable = ['id_film', 'id_genre'];

    // Relasi ke Film
    public function film()
    {
        return $this->belongsTo(Film::class, 'id_film');
    }

    // Relasi ke Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }
}
