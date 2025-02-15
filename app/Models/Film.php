<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Film extends Model
{
    use HasFactory;

    protected $table = "films";
    protected $primaryKey = 'id'; // Pastikan kolom id_film ada di database, jika tidak gunakan 'id'

    // Kolom-kolom yang dapat diisi secara mass assignment
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

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    // Relasi ke Genre melalui tabel pivot
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_relations', 'id_film', 'id_genre');
    }

    // Relasi ke Comment
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_film');
    }

    // Relasi ke Casting
    public function castings()
    {
        return $this->hasMany(Casting::class, 'id_film'); // Tidak perlu mendefinisikan foreign key dan local key jika mengikuti konvensi default
    }

    // Akses poster sebagai URL yang benar
    public function getPosterUrlAttribute()
    {
        if (filter_var($this->poster, FILTER_VALIDATE_URL)) {
            return $this->poster; // Jika sudah berupa URL, langsung dikembalikan
        }
        return asset('storage/' . $this->poster);
    }
}
