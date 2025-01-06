<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        return view('admin.pendaftaran.create');
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

        Pendaftaran::create($request->all());
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function edit(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.edit', compact('pendaftaran'));
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
