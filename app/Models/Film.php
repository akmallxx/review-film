<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    use HasFactory;

    // Model Film
    protected $table = "films";
    protected $primaryKey = 'id';

    // Kolom yang dapat diisi
    protected $fillable = [
        'judul',
        'slug',
        'total_episode',
        'poster',
        'deskripsi',
        'kategori_film',
        'tahun_rilis',
        'durasi',
        'pencipta',
        'trailer',
        'id_users',
        'kategori_umur'
    ];

    // Relasi ke Genre melalui tabel pivot
    public function genres()
    {
        // Relasi Many to Many ke Genre melalui tabel pivot genre_relations
        return $this->belongsToMany(Genre::class, 'genre_relations', 'id_film', 'id_genre');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    // Format durasi
    public function getDurasiFormatAttribute()
    {
        $jam = floor($this->durasi / 60);
        $menit = $this->durasi % 60;

        if ($jam > 0) {
            return "{$jam}h {$menit}min";
        } else {
            return "{$menit}min";
        }
    }

    // Relasi ke Comment
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id');
    }

    // Relasi ke Casting
    public function castings()
    {
        return $this->hasMany(Casting::class, 'id');
    }

    // Akses poster sebagai URL yang benar
    public function getPosterUrlAttribute()
    {
        if (filter_var($this->poster, FILTER_VALIDATE_URL)) {
            return $this->poster;
        }
        return asset('storage/' . $this->poster);
    }
}
