<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\Paket;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;


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
            Log::info('Incoming pendaftaran request:', $request->all());

            $validated = $request->validate([
                'siswa_id' => 'required|exists:tb_siswa,id',
                'paket_id' => 'required|exists:tb_paket,id',
                'metode_pembayaran' => 'required|in:Uang Tunai,Transfer Bank',
                'tanggal_daftar' => 'required|date'
            ]);

            Log::info('Validated pendaftaran data:', $validated);

            // Cek apakah siswa sudah terdaftar di paket yang sama
            $existingPendaftaran = Pendaftaran::where('siswa_id', $validated['siswa_id'])
                ->where('paket_id', $validated['paket_id'])
                ->exists();

            if ($existingPendaftaran) {
                Log::warning('Duplicate registration attempt:', $validated);
                return response()->json([
                    'success' => false,
                    'message' => 'Anda sudah terdaftar di paket ini'
                ], 422);
            }

            // Buat pendaftaran baru
            $pendaftaran = Pendaftaran::create([
                'siswa_id' => $validated['siswa_id'],
                'paket_id' => $validated['paket_id'],
                'tanggal_daftar' => $validated['tanggal_daftar'],
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'status_pembayaran' => 'Belum Dibayar'
            ]);

            Log::info('Pendaftaran created successfully:', $pendaftaran->toArray());

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pendaftaran berhasil'
                ]);
            }

            return redirect()->route('profil.siswa')
                ->with('success', 'Pendaftaran berhasil');

        } catch (ValidationException $e) {
            Log::error('Validation Error:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Pendaftaran error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
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
            Log::error('Update pendaftaran error: ' . $e->getMessage());
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
            Log::error('Show pendaftaran error: ' . $e->getMessage());
            if (request()->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            
            $pendaftaran = Pendaftaran::findOrFail($id);
            
            // Hapus jadwal dan absensi terkait
            $pendaftaran->jadwal()->each(function ($jadwal) {
                $jadwal->absensi()->delete();
            });
            $pendaftaran->jadwal()->delete();
            
            // Hapus pendaftaran
            $pendaftaran->delete();
            
            DB::commit();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pendaftaran berhasil dihapus'
                ]);
            }

            return redirect()->route('pendaftaran.index')
                ->with('success', 'Pendaftaran berhasil dihapus');
            
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in PendaftaranController@destroy: ' . $e->getMessage());
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus pendaftaran: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Gagal menghapus pendaftaran: ' . $e->getMessage());
        }
    }

    public function getPendaftar($id)
    {
        try {
            $pendaftar = Pendaftaran::with(['paket'])->findOrFail($id);
            return response()->json($pendaftar);
        } catch (\Exception $e) {
            Log::error('Get pendaftar error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
