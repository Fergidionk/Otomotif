<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\Paket;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Mengambil semua pendaftaran dengan data siswa dan paket yang terkait
        $pendaftaran = Pendaftaran::with(['siswa', 'paket'])->get();
        $siswa = Siswa::all();  // Ambil data siswa untuk dipilih dalam modal
        $paket = Paket::all();  // Ambil data paket untuk dipilih dalam modal
        return view('admin.pendaftaran', compact('pendaftaran', 'siswa', 'paket'));
    }

    public function create()
    {
        $paket = Paket::all();
        return view('user.daftar-kursus', compact('paket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tanggal_daftar' => 'required|date',
            'paket_id' => 'required',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
        ]);

        // Hanya simpan data pendaftaran tanpa membuat jadwal
        $pendaftaran = Pendaftaran::create($request->all());

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tanggal_daftar' => 'required|date',
            'paket_id' => 'required',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
        ]);

        $pendaftaran->update($request->all());
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function show($id)
    {
        try {
            $pendaftaran = Pendaftaran::with(['siswa', 'paket'])->findOrFail($id);
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'data' => $pendaftaran
                ]);
            }
            
            return view('pendaftaran.show', compact('pendaftaran'));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error in PendaftaranController@show: ' . $e->getMessage());
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->route('pendaftaran.index')
                ->with('error', 'Terjadi kesalahan saat mengambil data pendaftaran');
        }
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function getPendaftar($id)
    {
        $pendaftar = Pendaftaran::with(['paket'])->findOrFail($id);
        return response()->json($pendaftar);
    }
}
