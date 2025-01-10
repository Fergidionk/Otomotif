@extends('user/components.app')
@section('content')
    <div class="container p-8 px-20 min-h-screen">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <!-- Data Diri Siswa -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="text-gray-800">
                    <h1 class="text-4xl font-bold mb-2">{{ Auth::user()->siswa->nama_lengkap }}</h1>
                    <p class="text-gray-600">{{ Auth::user()->siswa->email }}</p>
                </div>
                <div class="text-right">
                    <a href="{{ route('daftar.kursus') }}" class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition-all duration-300">
                        Daftar Kursus Baru
                    </a>
                </div>
            </div>

            <!-- Informasi Pribadi -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Informasi Pribadi</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Tempat, Tanggal Lahir</p>
                        <p class="font-medium">{{ Auth::user()->siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse(Auth::user()->siswa->tanggal_lahir)->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Jenis Kelamin</p>
                        <p class="font-medium">{{ Auth::user()->siswa->jenis_kelamin }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Pendidikan Terakhir</p>
                        <p class="font-medium">{{ Auth::user()->siswa->pendidikan_terakhir }}</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Alamat</p>
                        <p class="font-medium">{{ Auth::user()->siswa->alamat }}</p>
                    </div>
                </div>
            </div>

            <!-- Daftar Paket yang Diambil -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Paket Kursus yang Diambil</h2>
                @forelse(Auth::user()->siswa->pendaftaran as $pendaftaran)
                    <div class="bg-gray-50 rounded-lg p-6 mb-4">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h3 class="text-xl font-semibold">{{ $pendaftaran->paket->nama_paket }}</h3>
                                <p class="text-gray-600">Terdaftar pada: {{ $pendaftaran->tanggal_daftar->format('d/m/Y') }}</p>
                            </div>
                            <div class="text-right">
                                <span class="px-4 py-2 rounded-full {{ $pendaftaran->status_pembayaran == 'Lunas' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $pendaftaran->status_pembayaran }}
                                </span>
                            </div>
                        </div>

                        <!-- Absensi Checkbox -->
                        <div class="mt-4">
                            <p class="text-gray-600 mb-2">Progress Pertemuan:</p>
                            <div class="flex flex-wrap gap-2">
                                @for($i = 1; $i <= $pendaftaran->paket->jumlah_pertemuan; $i++)
                                    @php
                                        $absensi = $pendaftaran->jadwal->absensi->where('pertemuan_ke', $i)->first();
                                    @endphp
                                    <div class="relative">
                                        <input type="checkbox" 
                                            class="w-6 h-6 rounded border-gray-300" 
                                            {{ $absensi && $absensi->hadir ? 'checked' : '' }}
                                            disabled>
                                        <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-xs">{{ $i }}</span>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        @if($pendaftaran->jadwal)
                            <div class="mt-8 text-sm text-gray-600">
                                <p>Jadwal: {{ $pendaftaran->jadwal->hari }}, {{ \Carbon\Carbon::parse($pendaftaran->jadwal->jam_pelatihan)->format('H:i') }} WIB</p>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-600">Belum ada paket kursus yang diambil</p>
                        <a href="{{ route('daftar.kursus') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition-all duration-300">
                            Daftar Kursus Sekarang
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
