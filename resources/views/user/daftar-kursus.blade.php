@extends('user/components.app')
@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Form Pendaftaran Kursus</h1>

                <div class="bg-white shadow-lg rounded-2xl p-6">
                    @if(!$siswa)
                        <div class="border-b pb-3 mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Data Diri</h2>
                            <p class="text-gray-600 text-sm mt-1">Silakan lengkapi data diri Anda dengan benar</p>
                        </div>

                        <form id="dataDiriForm" action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">Nama Lengkap *</span>
                                        <input type="text" name="nama_siswa" id="nama_siswa"
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                            placeholder="Contoh: John Doe" required>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">Alamat *</span>
                                        <input type="text" name="alamat_siswa" id="alamat_siswa"
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                            required>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">Jenis Kelamin *</span>
                                        <select name="jenis_kelamin" id="jenis_kelamin"
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                            required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">Tempat Lahir *</span>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                            required>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">Tanggal Lahir *</span>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                            required>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">No. HP *</span>
                                        <input type="text" name="no_hp" id="no_hp"
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                            required>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">Pendidikan Terakhir *</span>
                                        <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                            required>
                                            <option value="">-- Pilih Pendidikan Terakhir --</option>
                                            <option value="TidakBersekolah">Tidak Bersekolah</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="PerguruanTinggi">Perguruan Tinggi</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="block">
                                        <span class="text-gray-700 font-medium">Berkas PDF *</span>
                                        <input type="file" name="berkas_pdf" id="berkas_pdf"
                                            class="mt-1 block w-full" accept=".pdf" required>
                                    </label>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-center">
                                <button type="submit" 
                                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                    Simpan Data Diri
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="border-b pb-3 mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Data Diri Anda</h2>
                            <p class="text-gray-600 text-sm mt-1">Data diri Anda sudah tersimpan</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-gray-600"><strong>Nama:</strong> {{ $siswa->nama_siswa }}</p>
                                <p class="text-gray-600"><strong>Tempat Lahir:</strong> {{ $siswa->tempat_lahir }}</p>
                                <p class="text-gray-600"><strong>Tanggal Lahir:</strong> {{ $siswa->tanggal_lahir }}</p>
                                <p class="text-gray-600"><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
                            </div>
                            <div>
                                <p class="text-gray-600"><strong>Pendidikan Terakhir :</strong> {{ $siswa->pendidikan_terakhir }}</p>
                                <p class="text-gray-600"><strong>Alamat:</strong> {{ $siswa->alamat_siswa }}</p>
                                <p class="text-gray-600"><strong>No. Telepon:</strong> {{ $siswa->no_hp }}</p>
                                <p class="text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <form id="pendaftaranForm" action="{{ route('daftar.kursus.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                                <input type="hidden" name="status_pembayaran" value="Belum Dibayar">
                                
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">Tanggal Pendaftaran</label>
                                    <input type="date" name="tanggal_daftar" 
                                        class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3 bg-gray-100"
                                        value="{{ date('Y-m-d') }}" readonly>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">Pilih Paket *</label>
                                    <select name="paket_id" id="paket_id"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        required>
                                        <option value="">Pilih Paket</option>
                                        @foreach($paket as $p)
                                            <option value="{{ $p->id }}" 
                                                data-harga="{{ number_format($p->harga_paket, 0, ',', '.') }}"
                                                data-pertemuan="{{ $p->jumlah_pertemuan }}">
                                                {{ $p->nama_paket }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <!-- Tambahkan div untuk menampilkan detail paket -->
                                    <div id="detailPaket" class="mt-3 p-4 bg-gray-50 rounded-lg hidden">
                                        <p class="text-gray-700"><strong>Harga:</strong> <span id="hargaPaket">-</span></p>
                                        <p class="text-gray-700"><strong>Jumlah Pertemuan:</strong> <span id="pertemuanPaket">-</span> kali</p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">Metode Pembayaran *</label>
                                    <select name="metode_pembayaran" id="metode_pembayaran"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        required>
                                        <option value="">-- Pilih Metode Pembayaran --</option>
                                        <option value="Uang Tunai">Uang Tunai</option>
                                        <option value="Transfer Bank" disabled>Transfer Bank (Tidak Tersedia)</option>
                                    </select>
                                </div>

                                <div class="flex justify-center mt-6">
                                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                        Daftar Sekarang
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    

    <script>
        $(document).ready(function() {
            $('#dataDiriForm').on('submit', function(e) {
                e.preventDefault();
                
                const form = $(this);
                const formData = new FormData(this);
                
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            // Tampilkan modal sukses
                            $('#successModal').modal('show');
                            
                            // Reload halaman setelah 2 detik
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'Terjadi kesalahan sistem';
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            errorMessage = Object.values(errors)[0][0];
                        }
                        alert(errorMessage);
                    }
                });
            });

            // Pastikan modal berada di tengah layar
            $('.modal').on('show.bs.modal', function () {
                $(this).css('display', 'flex');
                $(this).css('align-items', 'center');
                $(this).css('justify-content', 'center');
            });
        });
    </script>

    <style>
        .modal {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-dialog {
            margin: 0 auto;
            max-width: 500px;
            width: 90%;
        }
        .modal-content {
            border: none;
            border-radius: 1rem;
        }
    </style>
@endsection
