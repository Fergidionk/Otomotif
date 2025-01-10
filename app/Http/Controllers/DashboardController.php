<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data untuk statistik
        $totalSiswa = Siswa::count();
        $totalPaket = Paket::count();
        $totalPendaftaran = Pendaftaran::count();

        // Mengambil 5 pendaftaran terbaru
        $pendaftaranTerbaru = Pendaftaran::with(['siswa', 'paket'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalPaket',
            'totalPendaftaran',
            'pendaftaranTerbaru'
        ));
    }
}
