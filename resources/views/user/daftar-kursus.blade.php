@extends('user/components.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Form Pendaftaran Kursus</h1>

    <div class="bg-white shadow-md rounded-lg p-6 max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Tempat Lahir" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full px-3 py-2 border rounded" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Pendidikan Terakhir" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Alamat Tempat Tinggal</label>
                <input type="text" name="alamat" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Alamat" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">No Telepon</label>
                <input type="tel" name="no_telepon" class="w-full px-3 py-2 border rounded" placeholder="Masukkan No Telepon" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Email" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Unggah Foto Profil</label>
                <input type="file" name="foto_profil" class="w-full px-3 py-2 border rounded" accept="image/*">
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-auto bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Daftar Sekarang
            </button>
        </div>
    </div>
</div>
@endsection