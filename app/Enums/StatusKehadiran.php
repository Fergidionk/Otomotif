<?php

namespace App\Enums;

enum StatusKehadiran: string
{
    case HADIR = 'hadir';
    case TIDAK_HADIR = 'tidak_hadir';
    case IZIN = 'izin';
}