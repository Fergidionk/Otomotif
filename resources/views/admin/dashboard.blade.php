@extends('admin/components.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Card Selamat Datang -->
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang {{ Auth::user()->name }}! 🎉</h5>
                                <p class="mb-4">
                                    Anda memiliki <span class="fw-bold">{{ $totalPendaftaran }}</span> total pendaftaran
                                </p>
                                <a href="{{ route('pendaftaran.index') }}" class="btn btn-sm btn-outline-primary">Lihat Pendaftaran</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards Statistik -->
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                            class="rounded" />
                                    </div>
                                </div>
                                <span class="d-block mb-1">Total Siswa</span>
                                <h3 class="card-title mb-2">{{ $totalSiswa }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                </div>
                                <span>Total Paket</span>
                                <h3 class="card-title text-nowrap mb-1">{{ $totalPaket }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Terbaru -->
            <div class="col-12 order-2">
                <div class="card">
                    <h5 class="card-header">Pendaftaran Terbaru</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Paket</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendaftaranTerbaru as $p)
                                <tr>
                                    <td>{{ $p->siswa->nama_siswa }}</td>
                                    <td>{{ $p->paket->nama_paket }}</td>
                                    <td>{{ $p->tanggal_daftar }}</td>
                                    <td>
                                        <span class="badge bg-label-{{ $p->status_pembayaran == 'SudahDibayar' ? 'success' : 'warning' }}">
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