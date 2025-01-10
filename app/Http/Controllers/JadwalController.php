<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with('pendaftar')->get();
        return view('admin.jadwal', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pendaftar_id' => 'required|exists:pendaftar,id',
            'hari' => 'required|string',
            'jam_pelatihan' => 'required|date_format:H:i',
        ]);

        Jadwal::create($validated);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pendaftar_id' => 'required|exists:pendaftar,id',
            'hari' => 'required|string',
            'jam_pelatihan' => 'required|date_format:H:i',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validated);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}
