<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        // Pastikan request menerima response JSON
        if (!$request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Hanya menerima request JSON'
            ], 406);
        }

        try {
            // Jika request dari user biasa
            if (auth()->user()->role !== 'admin') {
                $validated = $request->validate([
                    'nama_lengkap' => 'required|string|max:255',
                    'alamat' => 'required|string',
                    'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date',
                    'no_telepon' => 'required|string',
                    'pendidikan_terakhir' => 'required|in:TidakBersekolah,SD,SMP,SMA,PerguruanTinggi',
                    'dokumen' => 'required|file|mimes:pdf|max:5120',
                ]);

                if ($request->hasFile('dokumen')) {
                    $pdfPath = $request->file('dokumen')->store('berkas', 'public');
                }

                $siswa = Siswa::create([
                    'user_id' => auth()->id(),
                    'nama_siswa' => $validated['nama_lengkap'],
                    'alamat_siswa' => $validated['alamat'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                    'tempat_lahir' => $validated['tempat_lahir'],
                    'tanggal_lahir' => $validated['tanggal_lahir'],
                    'no_hp' => $validated['no_telepon'],
                    'pendidikan_terakhir' => $validated['pendidikan_terakhir'],
                    'berkas_pdf' => $pdfPath ?? null,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Data diri berhasil disimpan',
                    'data' => $siswa
                ]);
            } 
            // Jika request dari admin (kode yang sudah ada)
            else {
                $validated = $request->validate([
                    'nama_siswa' => 'required|string|max:255',
                    'email' => 'required|email|exists:users,email',
                    'alamat_siswa' => 'required|string',
                    'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date',
                    'no_hp' => 'required|string',
                    'pendidikan_terakhir' => 'required|in:TidakBersekolah,SD,SMP,SMA,PerguruanTinggi',
                    'berkas_pdf' => 'required|file|mimes:pdf|max:5120',
                ]);

                // Proses seperti sebelumnya untuk admin
                $user = User::where('email', $validated['email'])->first();
                if ($request->hasFile('berkas_pdf')) {
                    $pdfPath = $request->file('berkas_pdf')->store('berkas', 'public');
                    $validated['berkas_pdf'] = $pdfPath;
                }
                $validated['user_id'] = $user->id;
                unset($validated['email']);

                $siswa = Siswa::create($validated);

                return response()->json([
                    'success' => true,
                    'message' => 'Data siswa berhasil ditambahkan',
                    'data' => $siswa
                ]);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error in SiswaController@store: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
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
}
