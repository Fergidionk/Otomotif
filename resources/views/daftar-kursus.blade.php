@extends('components.app')
@section('content')
<div class="container bg-[#F7F7F8] mx-auto px-4 py-20">
    <div class="max-w-6xl mx-auto bg-[#F1F1F1] p-6 rounded-lg">
        <h1 class="text-4xl font-bold text-center mb-8">Daftar Kursus Online</h1>
        <p class="text-center text-gray-600 mb-8">Isi form berikut ini dan bertemu oleh konsultan belajar di</p>
        
        <form action="" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Tempat Lahir</label>
                    <input type="text" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Tempat Lahir">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Tanggal Lahir</label>
                    <input type="date" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Tanggal Lahir">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Jenis Kelamin</label>
                    <input type="text" class="w-full px-3 py-2 border rounded" placeholder="Pilih Jenis Kelamin">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Pendidikan Terakhir</label>
                    <input type="text" class="w-full px-3 py-2 border rounded" placeholder="Pilih jenis Kelamin">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Alamat Tempat Tinggal</label>
                    <input type="text" class="w-full px-3 py-2 border rounded" placeholder="Masukkan Alamat">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">No Telepon</label>
                    <input type="tel" class="w-full px-3 py-2 border rounded" placeholder="Masukkan No Telepon">
                </div>
            </div>

            <div class="mt-6">
                <label class="block text-gray-700 mb-2">Unggah Berkas</label>
                <p class="text-sm text-gray-600 mb-2">Review unggah file dalam format PDF yang berisi foto KTP (terpaut), foto, Self statement & sertifikat, dan berkas lainnya dalam satu file. Pastikan semua dokumen terlampir sebelum dikirimkan.</p>
                <div class="flex items-center space-x-2">
                    <button type="button" class="px-4 py-2 border rounded flex items-center text-blue-600 border-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        Unggah Berkas
                    </button>
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Daftar Sekarang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection