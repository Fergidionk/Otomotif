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
    protected $fillable = [
        'nama_siswa',
        'alamat_siswa',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'pendidikan_terakhir',
        'berkas_pdf',
        'user_id'
    ];

    // Tambahkan relasi

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'siswa_id');
    }

    public function jadwal()
    {
        return $this->hasManyThrough(Jadwal::class, Pendaftaran::class, 'siswa_id', 'pendaftar_id');
    }

    public function absensi()
    {
        return $this->hasManyThrough(Absensi::class, Jadwal::class);
    }
}
