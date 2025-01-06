<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'tb_paket';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama_paket',
        'harga_paket',
    ];

    // Jika Anda ingin menambahkan relasi, Anda bisa menambahkannya di sini
    // Contoh: public function pendaftar() { return $this->hasMany(Pendaftaran::class); }
}
