<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('admin.jadwal', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required',
            'hari' => 'required',
            'jam_pelatihan' => 'required',
        ]);

        if ($request->has('jadwalId') && $request->jadwalId != '') {
            $jadwal = Jadwal::find($request->jadwalId);
            $jadwal->update($request->all());
            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
        } else {
            Jadwal::create($request->all());
            return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
        }
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
