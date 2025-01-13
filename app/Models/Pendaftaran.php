<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pendaftar';

    protected $fillable = [
        'siswa_id',
        'paket_id',
        'tanggal_daftar',
        'metode_pembayaran',
        'status_pembayaran'
    ];

    protected $casts = [
        'tanggal_daftar' => 'date'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'pendaftar_id');
    }

    public function absensi()
    {
        return $this->hasManyThrough(Absensi::class, Jadwal::class, 'pendaftar_id', 'jadwal_id');
    }
}
