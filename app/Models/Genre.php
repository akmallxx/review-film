<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'slug'];

    // Relasi ke Film melalui tabel pivot genre_relations
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
