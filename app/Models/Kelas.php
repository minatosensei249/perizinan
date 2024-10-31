<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'wali_kelas',
    ];

    // Relasi ke model Siswa (jika satu kelas memiliki banyak siswa)
    // public function siswa()
    // {
    //     return $this->hasMany(Siswa::class);
    // }
}
