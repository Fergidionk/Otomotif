<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::with(['siswa', 'paket', 'jadwal'])->get();
        return view('admin.jadwal', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendaftar_id' => 'required|exists:pendaftar,id',
            'tanggal' => 'required|date',
            'jam_pelatihan' => 'required|date_format:H:i',
        ]);

        Jadwal::create($validated);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pendaftar_id' => 'required|exists:tb_pendaftar,id',
            'tanggal' => 'required|date',
            'jam_pelatihan' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function show($id)
    {
        $jadwal = Jadwal::with(['pendaftar', 'absensi'])->findOrFail($id);
        return view('admin.jadwal-detail', compact('jadwal'));
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        
        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }

    public function bulkUpdate(Request $request, $pendaftarId)
    {
        try {
            $request->validate([
                'jadwal' => 'required|array',
                'jadwal.*.tanggal' => 'required|date',
                'jadwal.*.jam_pelatihan' => 'required',
            ]);

            // Hapus jadwal yang ada
            Jadwal::where('pendaftar_id', $pendaftarId)->delete();

            // Buat jadwal baru
            foreach ($request->jadwal as $data) {
                Jadwal::create([
                    'pendaftar_id' => $pendaftarId,
                    'tanggal' => $data['tanggal'],
                    'jam_pelatihan' => $data['jam_pelatihan'],
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Jadwal berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getJadwalByPendaftar($pendaftarId)
    {
        try {
            $jadwal = Jadwal::where('pendaftar_id', $pendaftarId)
                ->orderBy('tanggal')
                ->get();
            
            return response()->json($jadwal);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error in getJadwalByPendaftar: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createEmptyJadwal($pendaftarId)
    {
        try {
            $pendaftar = Pendaftaran::with('paket')->findOrFail($pendaftarId);
            
            if (!$pendaftar->paket) {
                throw new \Exception('Paket tidak ditemukan untuk pendaftar ini');
            }

            $jumlahPertemuan = $pendaftar->paket->jumlah_pertemuan;

            // Buat jadwal kosong sesuai jumlah pertemuan
            for ($i = 0; $i < $jumlahPertemuan; $i++) {
                Jadwal::create([
                    'pendaftar_id' => $pendaftarId,
                    'tanggal' => null,
                    'jam_pelatihan' => null
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Jadwal kosong berhasil dibuat']);
        } catch (\Exception $e) {
            \Log::error('Error in createEmptyJadwal: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
