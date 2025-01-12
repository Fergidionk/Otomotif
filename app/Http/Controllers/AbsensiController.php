<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AbsensiController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::with(['siswa', 'paket', 'jadwal'])->get();
        return view('admin.absensi', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'pendaftar_id' => 'required|exists:tb_pendaftar,id',
                'absensi' => 'required|array',
                'absensi.*.jadwal_id' => 'required|exists:tb_jadwal,id',
                'absensi.*.hadir' => 'required|in:hadir,tidak_hadir',
                'absensi.*.keterangan' => 'nullable|string'
            ]);

            foreach ($request->absensi as $data) {
                // Cek apakah absensi sudah ada
                $absensi = Absensi::where('jadwal_id', $data['jadwal_id'])->first();
                
                if ($absensi) {
                    // Update jika sudah ada
                    $absensi->update([
                        'hadir' => $data['hadir'],
                        'keterangan' => $data['keterangan']
                    ]);
                } else {
                    // Buat baru jika belum ada
                    Absensi::create([
                        'jadwal_id' => $data['jadwal_id'],
                        'pendaftar_id' => $request->pendaftar_id,
                        'hadir' => $data['hadir'],
                        'keterangan' => $data['keterangan']
                    ]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Data absensi berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan absensi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hadir' => 'required|in:hadir,tidak_hadir',
            'keterangan' => 'nullable|string',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($validated);

        return response()->json(['success' => true, 'message' => 'Data absensi berhasil diperbarui']);
    }

    public function getJadwalByPendaftar($pendaftarId)
    {
        try {
            $jadwal = Jadwal::where('pendaftar_id', $pendaftarId)
                ->with(['absensi'])
                ->get();

            return response()->json($jadwal);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data jadwal',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
