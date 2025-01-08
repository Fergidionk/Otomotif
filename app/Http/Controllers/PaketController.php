<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Menampilkan daftar paket.
     * 
     * Fungsi ini mengambil semua data paket dari database dan menampilkannya di halaman paket.
     */
    public function index()
    {
        $paket = Paket::all();
        return view('admin.paket', compact('paket'));
    }

    /**
     * Menyimpan paket baru ke dalam penyimpanan.
     * 
     * Fungsi ini memvalidasi data input, membuat record paket baru di database,
     * dan mengarahkan pengguna kembali ke halaman daftar paket dengan pesan sukses.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket' => 'required',
            'harga_paket' => 'required|numeric',
        ]);

        Paket::create($validatedData);
        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    /**
     * Memperbarui paket tertentu dalam penyimpanan.
     * 
     * Fungsi ini mencari paket berdasarkan ID, memvalidasi data input baru,
     * memperbarui record paket di database, dan mengarahkan pengguna kembali
     * ke halaman daftar paket dengan pesan sukses.
     */
    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);
        $validatedData = $request->validate([
            'nama_paket' => 'required',
            'harga_paket' => 'required|numeric',
        ]);

        $paket->update($validatedData);
        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    /**
     * Menghapus paket tertentu dari penyimpanan.
     * 
     * Fungsi ini mencari paket berdasarkan ID, menghapusnya dari database,
     * dan mengarahkan pengguna kembali ke halaman daftar paket dengan pesan sukses.
     */
    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
