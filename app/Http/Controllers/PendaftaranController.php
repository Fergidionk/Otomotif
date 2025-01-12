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
        // Mengambil semua data yang diperlukan untuk view admin
        $pendaftaran = Pendaftaran::with(['siswa', 'paket'])
                        ->orderBy('tanggal_daftar', 'desc')
                        ->get();
        $siswa = Siswa::all(); // Untuk dropdown di modal tambah/edit
        $paket = Paket::all(); // Untuk dropdown di modal tambah/edit
        
        return view('admin.pendaftaran', compact('pendaftaran', 'siswa', 'paket'));
    }

    public function create()
    {
        // Cek apakah user sudah memiliki data siswa
        $siswa = Siswa::where('user_id', auth()->id())->first();
        $paket = Paket::all();
        
        return view('user.daftar-kursus', [
            'paket' => $paket,
            'siswa' => $siswa
        ]);
    }

    public function store(Request $request)
    {
        try {
            // Debug request data
            \Illuminate\Support\Facades\Log::info('Pendaftaran Request:', $request->all());

            // Validasi request
            $validated = $request->validate([
                'siswa_id' => 'required|exists:tb_siswa,id',
                'paket_id' => 'required|exists:tb_paket,id',
                'metode_pembayaran' => 'required|in:Uang Tunai,Transfer Bank'
            ]);

            // Create pendaftaran dengan data yang sudah divalidasi
            $pendaftaran = Pendaftaran::create([
                'siswa_id' => $validated['siswa_id'],
                'paket_id' => $validated['paket_id'],
                'tanggal_daftar' => now(),
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'status_pembayaran' => 'Belum Dibayar'
            ]);

            \Illuminate\Support\Facades\Log::info('Pendaftaran berhasil dibuat:', ['id' => $pendaftaran->id]);

            return redirect()->route('beranda')->with('success', 'Pendaftaran berhasil! Silakan datang ke kantor kami untuk melakukan pembayaran.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Illuminate\Support\Facades\Log::error('Validation error:', ['errors' => $e->errors()]);
            return redirect()->route('daftar.kursus')->withErrors($e->errors());
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Pendaftaran error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('daftar.kursus')->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
        }
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        try {
            $request->validate([
                'siswa_id' => 'required',
                'paket_id' => 'required',
                'tanggal_daftar' => 'required|date',
                'metode_pembayaran' => 'required|in:Uang Tunai,Transfer Bank',
                'status_pembayaran' => 'required|in:Sudah Dibayar,Belum Dibayar',
            ]);

            $pendaftaran->update($request->all());
            
            return redirect()->route('pendaftaran.index')
                ->with('success', 'Pendaftaran berhasil diperbarui');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Pendaftaran $pendaftaran)
    {
        try {
            $pendaftaran->load(['siswa', 'paket']);
            
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'data' => $pendaftaran
                ]);
            }
            
            return view('admin.pendaftaran.show', compact('pendaftaran'));
        } catch (\Exception $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        try {
            $pendaftaran->delete();
            return redirect()->route('pendaftaran.index')
                ->with('success', 'Pendaftaran berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function getPendaftar($id)
    {
        $pendaftar = Pendaftaran::with(['paket'])->findOrFail($id);
        return response()->json($pendaftar);
    }
}
