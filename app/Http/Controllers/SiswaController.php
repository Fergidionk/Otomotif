<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar siswa.
     * 
     * Fungsi ini mengambil semua data siswa dari database dan menampilkannya di halaman siswa.
     */
    public function index()
    {
        $siswa = Siswa::with('user')->get();
        $users = User::where('role', 'user')->get();

        return view('admin.siswa', compact('siswa', 'users'));
    }

    /**
     * Menyimpan siswa baru ke dalam penyimpanan.
     * 
     * Fungsi ini memvalidasi data input, membuat record siswa baru di database,
     * dan mengarahkan pengguna kembali ke halaman daftar siswa dengan pesan sukses.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_siswa' => 'required',
                'alamat_siswa' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'no_hp' => 'required',
                'pendidikan_terakhir' => 'required',
                'berkas_pdf' => 'required|mimes:pdf|max:2048'
            ]);

            // Proses upload file
            if ($request->hasFile('berkas_pdf')) {
                $file = $request->file('berkas_pdf');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/berkas', $filename);
                $validated['berkas_pdf'] = $filename;
            }

            $validated['user_id'] = auth()->id();
            
            $siswa = Siswa::create($validated);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data siswa berhasil disimpan'
                ]);
            }

            return redirect()->back()->with('success', 'Data siswa berhasil disimpan');
        } catch (\Exception $e) {
            Log::error('Error in SiswaController@store: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menyimpan data: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
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
            
            return response()->json([
                'success' => true,
                'message' => 'Data siswa berhasil diperbarui',
                'data' => $siswa
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data siswa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $siswa = Siswa::with('pendaftaran')->findOrFail($id);
        return view('admin.siswa-detail', compact('siswa'));
    }

    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail($id);

            if ($siswa->berkas_pdf) {
                Storage::delete('public/' . $siswa->berkas_pdf);
            }

            $siswa->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data siswa berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data siswa',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function profilSiswa()
    {
        $siswa = auth()->user()->siswa->load([
            'pendaftaran.paket',
            'pendaftaran.jadwal.absensi' // Pastikan relasi ini dimuat
        ]);
        // Debug untuk melihat data
        Log::info('Data Siswa:', ['siswa' => $siswa->toArray()]);

        return view('user.profilsiswa', compact('siswa'));
    }
}
