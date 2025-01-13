<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class JadwalController extends Controller
{
    public function index()
    {
        try {
            $pendaftaran = Pendaftaran::with([
                'siswa',
                'paket',
                'jadwal' => function($query) {
                    $query->orderBy('tanggal', 'asc');
                },
                'jadwal.absensi'
            ])->get();

            return view('admin.jadwal', compact('pendaftaran'));
        } catch (\Exception $e) {
            Log::error('Error in JadwalController@index: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat data jadwal');
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'pendaftar_id' => 'required|exists:tb_pendaftar,id',
                'tanggal' => 'required|date',
                'jam_pelatihan' => 'required',
            ]);

            Jadwal::create($validated);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Jadwal berhasil ditambahkan!'
                ]);
            }

            return redirect()->route('admin.jadwal.index')
                ->with('success', 'Jadwal berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error in JadwalController@store: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menambahkan jadwal: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Gagal menambahkan jadwal: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'pendaftar_id' => 'required|exists:tb_pendaftar,id',
                'tanggal' => 'required|date',
                'jam_pelatihan' => 'required',
            ]);

            $jadwal = Jadwal::findOrFail($id);
            $jadwal->update($validated);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Jadwal berhasil diperbarui'
                ]);
            }

            return redirect()->route('admin.jadwal.index')
                ->with('success', 'Jadwal berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error in JadwalController@update: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memperbarui jadwal: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Gagal memperbarui jadwal: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id);
            $jadwal->delete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Jadwal berhasil dihapus'
                ]);
            }

            return redirect()->route('admin.jadwal.index')
                ->with('success', 'Jadwal berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error in JadwalController@destroy: ' . $e->getMessage());
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus jadwal: ' . $e->getMessage()
                ], 500);
            }

            return back()->with('error', 'Gagal menghapus jadwal: ' . $e->getMessage());
        }
    }

    public function getJadwalByPendaftar($pendaftarId)
    {
        try {
            $jadwal = Jadwal::where('pendaftar_id', $pendaftarId)
                ->with('absensi')
                ->orderBy('tanggal', 'asc')
                ->get();

            return response()->json($jadwal);
        } catch (\Exception $e) {
            Log::error('Error in JadwalController@getJadwalByPendaftar: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data jadwal: ' . $e->getMessage()
            ], 500);
        }
    }

    public function createEmptyJadwal($pendaftarId)
    {
        try {
            // Ambil data pendaftaran
            $pendaftaran = Pendaftaran::with('paket')->findOrFail($pendaftarId);
            
            // Hitung jumlah pertemuan dari paket
            $jumlahPertemuan = $pendaftaran->paket->jumlah_pertemuan;
            
            // Buat jadwal kosong sejumlah pertemuan
            for ($i = 0; $i < $jumlahPertemuan; $i++) {
                Jadwal::create([
                    'pendaftar_id' => $pendaftarId,
                    'tanggal' => null,
                    'jam_pelatihan' => null
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Jadwal kosong berhasil dibuat'
            ]);
        } catch (\Exception $e) {
            Log::error('Error in createEmptyJadwal: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat jadwal: ' . $e->getMessage()
            ], 500);
        }
    }

    public function bulkUpdate(Request $request, $pendaftarId)
    {
        try {
            // Validasi request
            $request->validate([
                'jadwal' => 'required|array',
                'jadwal.*.tanggal' => 'required|date',
                'jadwal.*.jam_pelatihan' => 'required'
            ]);

            // Ambil semua jadwal yang ada untuk pendaftar ini
            $existingJadwals = Jadwal::where('pendaftar_id', $pendaftarId)->get();

            // Update setiap jadwal
            foreach ($request->jadwal as $index => $jadwalData) {
                if (isset($existingJadwals[$index])) {
                    $jadwal = $existingJadwals[$index];
                    $jadwal->update([
                        'tanggal' => $jadwalData['tanggal'],
                        'jam_pelatihan' => $jadwalData['jam_pelatihan']
                    ]);
                } else {
                    // Jika jadwal belum ada, buat baru
                    Jadwal::create([
                        'pendaftar_id' => $pendaftarId,
                        'tanggal' => $jadwalData['tanggal'],
                        'jam_pelatihan' => $jadwalData['jam_pelatihan']
                    ]);
                }
            }

            // Log untuk debugging
            Log::info('Jadwal berhasil diupdate', [
                'pendaftar_id' => $pendaftarId,
                'data' => $request->jadwal
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Jadwal berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            Log::error('Error in JadwalController@bulkUpdate: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan jadwal: ' . $e->getMessage()
            ], 500);
        }
    }

    // Tambahkan route untuk bulk update
    public function routes()
    {
        Route::post('/admin/jadwal/bulk-update/{pendaftarId}', 'JadwalController@bulkUpdate')
            ->name('admin.jadwal.bulk-update');
    }
}
