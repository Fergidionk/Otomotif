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
        'hari',
        'jam_pelatihan',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
