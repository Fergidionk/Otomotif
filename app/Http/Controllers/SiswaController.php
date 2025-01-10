<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'pendidikan_terakhir' => 'required|in:TidakBersekolah,SD,SMP,SMA,PerguruanTinggi',
            'berkas_pdf' => 'required|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('berkas_pdf')) {
            $pdfPath = $request->file('berkas_pdf')->store('public/berkas');
            $validatedData['berkas_pdf'] = str_replace('public/', '', $pdfPath);
        }

        Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $validatedData = $request->validate([
            'nama_siswa' => 'required',
            'alamat_siswa' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required',
            'pendidikan_terakhir' => 'required|in:TidakBersekolah,SD,SMP,SMA,PerguruanTinggi',
            'berkas_pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        if ($request->hasFile('berkas_pdf')) {
            if ($siswa->berkas_pdf) {
                Storage::delete('public/' . $siswa->berkas_pdf);
            }
            $pdfPath = $request->file('berkas_pdf')->store('public/berkas');
            $validatedData['berkas_pdf'] = str_replace('public/', '', $pdfPath);
        }

        $siswa->update($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function show($id)
    {
        $siswa = Siswa::with('pendaftaran')->findOrFail($id);
        return view('admin.siswa-detail', compact('siswa'));
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->berkas_pdf) {
            Storage::delete('public/' . $siswa->berkas_pdf);
        }

        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
