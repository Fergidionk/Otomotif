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

    // Tambahkan relasi
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'siswa_id');
    }

    public function jadwal()
    {
        return $this->hasManyThrough(Jadwal::class, Pendaftaran::class);
    }

    public function absensi()
    {
        return $this->hasManyThrough(Absensi::class, Jadwal::class);
    }
}
