<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = "films";
    protected $primaryKey = 'id_film'; // Pastikan kolom id_film ada di database, jika tidak gunakan 'id'

    // Kolom-kolom yang dapat diisi secara mass assignment
    protected $fillable = [
        'judul', 'poster', 'deskripsi', 'tahun_rilis', 'durasi', 'pencipta', 'trailer', 'id_users', 'kategori_umur'
    ];

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
}
