<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\Paket;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'tanggal_daftar' => 'required|date',
            'paket_id' => 'required',
            'metode_pembayaran' => 'required',
            'status_pembayaran' => 'required',
        ]);

        // Simpan data pendaftaran
        Pendaftaran::create($request->all());
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
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

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
