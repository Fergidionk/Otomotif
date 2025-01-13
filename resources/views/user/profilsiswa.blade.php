@extends('user/components.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-4">Profil Siswa</h1>
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
            @if($siswa->pendaftaran->count() > 0)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Informasi Paket</h2>
                    <div class="space-y-4">
                        @foreach($siswa->pendaftaran as $pendaftaran)
                            <div class="border-b pb-4 last:border-b-0 last:pb-0">
                                <p class="text-gray-600"><strong>Nama Paket:</strong> {{ $pendaftaran->paket->nama_paket }}</p>
                                <p class="text-gray-600"><strong>Jumlah Pertemuan:</strong> {{ $pendaftaran->paket->jumlah_pertemuan }} Kali</p>
                                <p class="text-gray-600"><strong>Status Pembayaran:</strong> {{ $pendaftaran->status_pembayaran }}</p>
                                <p class="text-gray-600"><strong>Tanggal Daftar:</strong> {{ $pendaftaran->tanggal_daftar->format('d/m/Y') }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Jadwal Kursus -->
                <div class="bg-white p-6 rounded-lg shadow-md lg:col-span-2">
                    <h2 class="text-2xl font-semibold mb-4">Jadwal Kursus</h2>
                    @foreach($siswa->pendaftaran as $pendaftaran)
                        <div class="mb-6 last:mb-0">
                            <h3 class="text-xl font-medium mb-3">{{ $pendaftaran->paket->nama_paket }}</h3>
                            @if($pendaftaran->jadwal->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="min-w-full table-auto">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="px-4 py-2">Pertemuan Ke</th>
                                                <th class="px-4 py-2">Hari & Tanggal</th>
                                                <th class="px-4 py-2">Jam</th>
                                                <th class="px-4 py-2">Keterangan</th>
                                                <th class="px-4 py-2">Status Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pendaftaran->jadwal as $jadwal)
                                                @php
                                                    \Log::info('Data Jadwal:', [
                                                        'jadwal_id' => $jadwal->id,
                                                        'absensi' => $jadwal->absensi,
                                                        'status' => $jadwal->absensi->hadir ?? 'tidak ada'
                                                    ]);
                                                @endphp
                                            <tr>
                                                <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                                <td class="border px-4 py-2 text-center">
                                                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->isoFormat('dddd, D MMMM Y') }}
                                                </td>
                                                <td class="border px-4 py-2 text-center">{{ $jadwal->jam_pelatihan }}</td>
                                                <td class="border px-4 py-2">
                                                    @if($jadwal->absensi)
                                                        {{ $jadwal->absensi->keterangan ?: '-' }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="border px-4 py-2 text-center">
                                                    @if($jadwal->absensi)
                                                        @if($jadwal->absensi->hadir === 'hadir')
                                                            <span class="px-2 py-1 rounded text-sm bg-blue-100 text-blue-800 fw-bold">
                                                                Hadir
                                                            </span>
                                                        @elseif($jadwal->absensi->hadir === 'tidak_hadir')
                                                            <span class="px-2 py-1 rounded text-sm bg-red-100 text-red-800 fw-bold">
                                                                Tidak Hadir
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span class="px-2 py-1 rounded text-sm bg-gray-100 text-gray-800">
                                                            Belum ada status
                                                        </span>
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
                    @endforeach
                </div>
            @else
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600">Anda belum mendaftar kursus.</p>
                    <a href="{{ route('daftar.kursus') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Daftar Kursus Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
