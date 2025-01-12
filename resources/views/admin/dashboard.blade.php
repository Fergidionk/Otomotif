@extends('admin/components.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Card Selamat Datang -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="flex flex-col sm:flex-row">
                    <div class="p-6 flex-1">
                        <h5 class="text-2xl font-bold text-blue-600 mb-3">Selamat Datang {{ Auth::user()->name }}! 🎉</h5>
                        <p class="text-gray-600 mb-6">
                            Anda memiliki <span class="font-semibold text-gray-800">{{ $totalPendaftaran }}</span> total pendaftaran
                        </p>
                        <a href="{{ route('pendaftaran.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                            <span>Lihat Pendaftaran</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="p-6 flex items-center justify-center">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png" 
                             class="h-48 w-auto object-contain" 
                             alt="Welcome illustration" />
                    </div>
                </div>
            </div>

            <!-- Cards Statistik -->
            <div class="grid grid-cols-3 gap-4">
                <!-- Card Total Siswa -->
                <div class="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <i class="bx bx-user-circle text-2xl text-blue-600"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalSiswa }}</h3>
                    <p class="text-gray-600">Total Siswa</p>
                </div>

                <!-- Card Total Paket -->
                <div class="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-100 rounded-full">
                            <i class="bx bx-package text-2xl text-green-600"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalPaket }}</h3>
                    <p class="text-gray-600">Total Paket</p>
                </div>

                <!-- Card Total User -->
                <div class="bg-white p-6 rounded-xl shadow-lg transform hover:scale-105 transition-transform duration-200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-cyan-100 rounded-full">
                            <i class="bx bx-group text-2xl text-cyan-600"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalUser }}</h3>
                    <p class="text-gray-600">Total User</p>
                </div>
            </div>

            <!-- Tabel Data Terbaru -->
            <div class="col-span-1 lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h5 class="text-xl font-semibold text-gray-800">Pendaftaran Terbaru</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Siswa</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Paket</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($pendaftaranTerbaru as $p)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->siswa->nama_siswa }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $p->paket->nama_paket }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ date('Y-m-d', strtotime($p->tanggal_daftar)) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 rounded-full text-sm font-medium
                                            {{ $p->status_pembayaran == 'SudahDibayar' 
                                                ? 'bg-green-100 text-green-800' 
                                                : 'bg-yellow-100 text-yellow-800' 
                                            }}">
                                            {{ $p->status_pembayaran }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection