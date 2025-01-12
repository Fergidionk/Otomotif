<?php

namespace App\Models;

use App\Enums\StatusKehadiran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'tb_absensi';
    protected $fillable = [
        'jadwal_id',
        'pendaftar_id',
        'hadir',
        'keterangan'
    ];

    protected $casts = [
        'hadir' => StatusKehadiran::class,
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftar_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }
}
