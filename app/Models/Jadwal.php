<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'tb_jadwal';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'tanggal',
        'jam',
        'keterangan',
    ];

    // Jika Anda ingin menambahkan relasi, Anda bisa menambahkannya di sini
    // Contoh: public function siswa() { return $this->hasMany(Siswa::class); }
}
