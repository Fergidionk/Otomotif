@extends('user/components.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-20">
            <h1 class="text-3xl font-bold mt-8 mb-4">Profil Siswa</h1>
            <p class="text-gray-600">Halaman ini menampilkan informasi lengkap tentang siswa dan paket yang diambil.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach ($siswa as $data)
                <!-- Data Siswa -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Data Siswa</h2>
                    <p class="text-gray-600 mb-2"><strong>Nama Siswa:</strong> {{ $data->nama_siswa }}</p>
                    <p class="text-gray-600 mb-2"><strong>Alamat Siswa:</strong> {{ $data->alamat_siswa }}</p>
                    <p class="text-gray-600 mb-2"><strong>Jenis Kelamin:</strong> {{ $data->jenis_kelamin }}</p>
                    <p class="text-gray-600 mb-2"><strong>Tempat Lahir:</strong> {{ $data->tempat_lahir }}</p>
                    <p class="text-gray-600 mb-2"><strong>Tanggal Lahir:</strong> {{ $data->tanggal_lahir }}</p>
                    <p class="text-gray-600 mb-2"><strong>No HP:</strong> {{ $data->no_hp }}</p>
                </div>
            @endforeach

            <!-- Paket yang Diambil -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Paket yang Diambil</h2>
                <p class="text-gray-600 mb-2"><strong>Paket:</strong> Kursus Mengemudi Mobil</p>
                <p class="text-gray-600 mb-2"><strong>Durasi:</strong> 1 Bulan</p>
                <p class="text-gray-600 mb-2"><strong>Jadwal:</strong> Senin, Rabu, Jumat</p>
                <p class="text-gray-600 mb-2"><strong>Waktu:</strong> 10:00 - 12:00</p>
            </div>
        </div>
    </div>
@endsection
