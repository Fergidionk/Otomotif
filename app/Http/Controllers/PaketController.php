<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('admin.paket', compact('paket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga_paket' => 'required',
        ]);

        if ($request->has('paketId') && $request->paketId != '') {
            $paket = Paket::find($request->paketId);
            if ($paket) {
                $paket->update($request->all());
                return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui.');
            } else {
                return redirect()->route('paket.index')->with('error', 'Paket tidak ditemukan.');
            }
        } else {
            Paket::create($request->all());
            return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan.');
        }
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
