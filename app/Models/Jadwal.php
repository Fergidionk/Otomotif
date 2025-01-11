<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'tb_jadwal';

    protected $fillable = [
        'pendaftar_id',
        'tanggal',
        'jam_pelatihan',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function getHariAttribute()
    {
        $hari = date('l', strtotime($this->tanggal));
        $hariIndonesia = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        return $hariIndonesia[$hari];
    }
}
