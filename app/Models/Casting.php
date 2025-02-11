<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casting extends Model
{
    use HasFactory;
    
    protected $table = 'castings';
    protected $primaryKey = 'id'; // Jangan lupa bahwa primary key default adalah 'id'
    
    protected $fillable = ['nama_panggung', 'nama_asli', 'id_film'];

    // Relasi ke model Film
    public function film()
    {
        return $this->belongsTo(Film::class, 'id_film');
    }
}
