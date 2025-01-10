<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'tb_siswa';

    // Tentukan kolom yang dapat diisi
    protected $guarded = [''];

    // Jika Anda ingin menambahkan relasi, Anda bisa menambahkannya di sini
    // Contoh: public function pendaftaran() { return $this->hasMany(Pendaftaran::class); }
}
