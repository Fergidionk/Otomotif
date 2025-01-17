@extends('user/components.app')
@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto mb-8">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">
                        {{ !$siswa ? 'Mengisi Data Diri' : 'Pendaftaran Kursus' }}
                    </span>
                    <span class="text-sm font-medium text-gray-700">
                        {{ !$siswa ? '50%' : '100%' }}
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-500" 
                         style="width: {{ !$siswa ? '50%' : '100%' }}">
                    </div>
                </div>
                <div class="flex justify-between mt-2 text-xs text-gray-500">
                    <div class="flex flex-col items-center">
                        <div class="w-6 h-6 flex items-center justify-center rounded-full bg-green-500 text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="mt-1">Login/Register</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-6 h-6 flex items-center justify-center rounded-full {{ !$siswa ? 'bg-blue-600 text-white' : 'bg-green-500 text-white' }}">
                            <i class="fas {{ !$siswa ? 'fa-pen' : 'fa-check' }}"></i>
                        </div>
                        <span class="mt-1">Data Diri</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-6 h-6 flex items-center justify-center rounded-full {{ !$siswa ? 'bg-gray-300' : 'bg-blue-600 text-white' }}">
                            <i class="fas fa-book"></i>
                        </div>
                        <span class="mt-1">Pendaftaran</span>
                    </div>
                </div>
            </div>

            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Form Pendaftaran Kursus</h1>

                <div class="bg-white shadow-lg rounded-2xl p-6">
                    @if (!$siswa)
                        <div class="border-b pb-3 mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Data Diri</h2>
                            <p class="text-gray-600 text-sm mt-1">Silakan lengkapi data diri Anda dengan benar</p>
                        </div>

                        <form id="dataDiriForm" action="{{ route('siswa.store') }}" method="POST"
                            enctype="multipart/form-data">
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
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-6">
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

                                <div class="space-y-4">
                                    <label class="block">
                                        <span class="text-gray-700 font-semibold mb-2 block">Berkas PDF *</span>
                                        <div class="relative">
                                            <input type="file" name="berkas_pdf" id="berkas_pdf"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                                focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                                file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                                file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                                                hover:file:bg-blue-100"
                                                accept=".pdf" required>
                                        </div>
                                        <div class="mt-3 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                            <span class="text-sm text-gray-600 font-medium block mb-2">
                                                Lampirkan dalam 1 file PDF:
                                            </span>
                                            <ul class="space-y-2 text-sm text-gray-600">
                                                <li class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                    Fotokopi KTP (1 lembar)
                                                </li>
                                                <li class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                    Foto 3x4 (2 lembar)
                                                </li>
                                            </ul>
                                        </div>
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
                                <p class="text-gray-600"><strong>Pendidikan Terakhir :</strong>
                                    {{ $siswa->pendidikan_terakhir }}</p>
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
                                        @foreach ($paket as $p)
                                            <option value="{{ $p->id }}"
                                                data-harga="{{ number_format($p->harga_paket, 0, ',', '.') }}"
                                                data-pertemuan="{{ $p->jumlah_pertemuan }}">
                                                {{ $p->nama_paket }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <!-- Tambahkan div untuk menampilkan detail paket -->
                                    <div id="detailPaket" class="mt-3 p-4 bg-gray-50 rounded-lg hidden">
                                        <p class="text-gray-700"><strong>Harga:</strong> <span id="hargaPaket">-</span>
                                        </p>
                                        <p class="text-gray-700"><strong>Jumlah Pertemuan:</strong> <span
                                                id="pertemuanPaket">-</span> kali</p>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">Metode Pembayaran *</label>
                                    <select name="metode_pembayaran" id="metode_pembayaran"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        required>
                                        <option value="">-- Pilih Metode Pembayaran --</option>
                                        <option value="Uang Tunai">Uang Tunai</option>
                                        <option value="Transfer Bank">Transfer Bank</option>
                                    </select>
                                </div>

                                <div id="buktiPembayaran" class="mb-4 hidden">
                                    <label class="block text-gray-700 font-medium mb-2">Unggah Bukti Pembayaran *</label>
                                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*"
                                        class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-md file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-50 file:text-blue-700
                                        hover:file:bg-blue-100">
                                    <p class="mt-1 text-sm text-gray-500">Unggah tangkapan layar bukti transfer pembayaran (JPG, PNG)</p>
                                    <p class="mt-2 text-sm text-red-500 font-medium">*Harap transfer dengan nominal yang sesuai dengan harga paket yang dipilih (tidak kurang/lebih)</p>
                                </div>
                                {{-- bukti pembayaran transfer bank --}}
                                <script>
                                    document.getElementById('metode_pembayaran').addEventListener('change', function() {
                                        const buktiPembayaran = document.getElementById('bukti_pembayaran');
                                        const buktiPembayaranDiv = document.getElementById('buktiPembayaran');
                                        
                                        if (this.value === 'Transfer Bank') {
                                            buktiPembayaranDiv.classList.remove('hidden');
                                            buktiPembayaran.required = true;
                                        } else {
                                            buktiPembayaranDiv.classList.add('hidden');
                                            buktiPembayaran.required = false;
                                        }
                                    });
                                </script>

                                <div class="flex justify-center mt-6">
                                    <button type="submit"
                                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
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
            $('.modal').on('show.bs.modal', function() {
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
