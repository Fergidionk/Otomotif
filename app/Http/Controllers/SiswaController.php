<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar siswa.
     * 
     * Fungsi ini mengambil semua data siswa dari database dan menampilkannya di halaman siswa.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa', compact('siswa'));
    }

    /**
     * Menyimpan siswa baru ke dalam penyimpanan.
     * 
     * Fungsi ini memvalidasi data input, membuat record siswa baru di database,
     * dan mengarahkan pengguna kembali ke halaman daftar siswa dengan pesan sukses.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'pendidikan_terakhir' => 'required',
        ]);

        Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Memperbarui siswa tertentu dalam penyimpanan.
     * 
     * Fungsi ini mencari siswa berdasarkan ID, memvalidasi data input baru,
     * memperbarui record siswa di database, dan mengarahkan pengguna kembali
     * ke halaman daftar siswa dengan pesan sukses.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $validatedData = $request->validate([
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'pendidikan_terakhir' => 'required',
        ]);

        $siswa->update($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    /**
     * Menghapus siswa tertentu dari penyimpanan.
     * 
     * Fungsi ini mencari siswa berdasarkan ID, menghapusnya dari database,
     * dan mengarahkan pengguna kembali ke halaman daftar siswa dengan pesan sukses.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
