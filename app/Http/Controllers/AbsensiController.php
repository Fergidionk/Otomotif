<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('jadwal')->get();
        return view('admin.absensi', compact('absensi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jadwal_id' => 'required|exists:tb_jadwal,id',
            'pertemuan_ke' => 'required|integer|min:1',
            'hadir' => 'required|boolean',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $jadwal = Jadwal::findOrFail($validated['jadwal_id']);
        $paket = $jadwal->pendaftar->paket;

        // Validasi jumlah pertemuan tidak melebihi paket
        if ($validated['pertemuan_ke'] > $paket->jumlah_pertemuan) {
            return back()->with('error', 'Pertemuan melebihi jumlah yang ada di paket');
        }

        Absensi::create($validated);
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jadwal_id' => 'required|exists:jadwal,id',
            'tanggal' => 'required|date',
            'status' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($validated);
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui!');
    }

    public function show($id)
    {
        $absensi = Absensi::with(['jadwal.pendaftar'])->findOrFail($id);
        return view('admin.absensi-detail', compact('absensi'));
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus!');
    }
}
