<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'tb_jadwal';
    
    protected $fillable = [
        'pendaftar_id',
        'tanggal',
        'jam_pelatihan'
    ];

    protected $dates = ['tanggal'];

    public function absensi()
    {
        return $this->hasOne(Absensi::class, 'jadwal_id');
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftar_id');
    }
}
