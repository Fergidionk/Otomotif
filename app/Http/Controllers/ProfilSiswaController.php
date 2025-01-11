<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $siswa = Siswa::where('user_id', auth()->id())->first();
        
        // if (!$siswa) {
        //     return redirect()->route('daftar.kursus')
        //                    ->with('error', 'Silakan lengkapi data diri Anda terlebih dahulu');
        // }

        // return view('user.profilsiswa', compact('siswa'));

        $siswa = Siswa::all();
        // Kirim data ke view
        return view('user.profilsiswa', ['siswa' => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $siswa = Siswa::where('user_id', auth()->id())->first();
        
        if (!$siswa) {
            return redirect()->route('daftar.kursus')
                           ->with('error', 'Silakan lengkapi data diri Anda terlebih dahulu');
        }

        return view('user.edit-profilsiswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $siswa = Siswa::where('user_id', auth()->id())->first();
        
        if (!$siswa) {
            return back()->with('error', 'Data siswa tidak ditemukan');
        }

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
            // Hapus berkas lama jika ada
            if ($siswa->berkas_pdf) {
                Storage::delete('public/' . $siswa->berkas_pdf);
            }
            // Upload berkas baru
            $pdfPath = $request->file('berkas_pdf')->store('public/berkas');
            $validatedData['berkas_pdf'] = str_replace('public/', '', $pdfPath);
        }

        $siswa->update($validatedData);

        return redirect()->route('profil.siswa')
                        ->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
