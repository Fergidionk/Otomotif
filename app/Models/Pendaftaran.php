<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pendaftar';
    protected $guarded = [];
    
    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class, 'pendaftar_id');
    }
}
