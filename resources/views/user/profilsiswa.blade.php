@extends('user/components.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-20">
            <h1 class="text-3xl font-bold mt-8 mb-4">Profil Siswa</h1>
            <p class="text-gray-600">Informasi lengkap tentang data diri, paket, jadwal, dan absensi.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Data Diri -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Data Diri</h2>
                <div class="space-y-3">
                    <p class="text-gray-600"><strong>Nama:</strong> {{ $siswa->nama_siswa }}</p>
                    <p class="text-gray-600"><strong>Alamat:</strong> {{ $siswa->alamat_siswa }}</p>
                    <p class="text-gray-600"><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
                    <p class="text-gray-600"><strong>Tempat Lahir:</strong> {{ $siswa->tempat_lahir }}</p>
                    <p class="text-gray-600"><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</p>
                    <p class="text-gray-600"><strong>No HP:</strong> {{ $siswa->no_hp }}</p>
                    <p class="text-gray-600"><strong>Pendidikan Terakhir:</strong> {{ $siswa->pendidikan_terakhir }}</p>
                </div>
            </div>

            <!-- Informasi Paket -->
            @if($siswa->pendaftaran)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Informasi Paket</h2>
                    <div class="space-y-3">
                        <p class="text-gray-600"><strong>Nama Paket:</strong> {{ $siswa->pendaftaran->paket->nama_paket }}</p>
                        <p class="text-gray-600"><strong>Jumlah Pertemuan:</strong> {{ $siswa->pendaftaran->paket->jumlah_pertemuan }} Kali</p>
                        <p class="text-gray-600"><strong>Status Pembayaran:</strong> {{ $siswa->pendaftaran->status_pembayaran }}</p>
                        <p class="text-gray-600"><strong>Tanggal Daftar:</strong> {{ $siswa->pendaftaran->tanggal_daftar }}</p>
                    </div>
                </div>

                <!-- Jadwal Kursus -->
                <div class="bg-white p-6 rounded-lg shadow-md lg:col-span-2">
                    <h2 class="text-2xl font-semibold mb-4">Jadwal Kursus</h2>
                    @if($siswa->pendaftaran->jadwal->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2">Pertemuan Ke</th>
                                        <th class="px-4 py-2">Tanggal</th>
                                        <th class="px-4 py-2">Jam</th>
                                        <th class="px-4 py-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswa->pendaftaran->jadwal as $jadwal)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2 text-center">{{ $jadwal->tanggal }}</td>
                                        <td class="border px-4 py-2 text-center">{{ $jadwal->jam }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            @if($jadwal->absensi)
                                                {{ $jadwal->absensi->status }}
                                            @else
                                                Belum ada status
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600">Jadwal belum diatur oleh admin.</p>
                    @endif
                </div>
            @else
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600">Anda belum mendaftar kursus.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
