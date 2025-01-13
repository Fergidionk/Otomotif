<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'tb_absensi';
    
    protected $fillable = [
        'jadwal_id',
        'pendaftar_id',
        'hadir',
        'keterangan'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftar_id');
    }
}
