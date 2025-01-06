<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'tb_pendaftaran';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'paket_id',
    ];

    // Jika Anda ingin menambahkan relasi, Anda bisa menambahkannya di sini
    // Contoh: public function paket() { return $this->belongsTo(Paket::class); }
}
