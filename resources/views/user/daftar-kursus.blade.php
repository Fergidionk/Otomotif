@extends('user/components.app')
@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Form Pendaftaran Kursus</h1>

                <div class="bg-white shadow-lg rounded-2xl p-6">
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
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        placeholder="Contoh: John Doe" required>
                                </label>
                            </div>

                            <div class="space-y-3">
                                <label class="block">
                                    <span class="text-gray-700 font-medium">Tempat Lahir *</span>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        placeholder="Contoh: Jakarta" required>
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
                                    <span class="text-gray-700 font-medium">Alamat Tempat Tinggal *</span>
                                    <textarea name="alamat" id="alamat"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        placeholder="Masukkan alamat lengkap Anda" rows="2" required></textarea>
                                </label>
                            </div>

                            <div class="space-y-3">
                                <label class="block">
                                    <span class="text-gray-700 font-medium">No Telepon *</span>
                                    <input type="tel" name="no_telepon" id="no_telepon"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        placeholder="Contoh: 08123456789" required>
                                </label>
                            </div>

                            <div class="space-y-3">
                                <label class="block">
                                    <span class="text-gray-700 font-medium">Email *</span>
                                    <input type="email" name="email" id="email"
                                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        placeholder="Contoh: email@domain.com" required>
                                </label>
                            </div>

                            <div class="md:col-span-2 space-y-4">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-3">Unggah Data yang diperlukan</h3>
                                    <div class="bg-blue-50 rounded-lg p-4">
                                        <ul class="space-y-2">
                                            <li class="flex items-center space-x-2">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-gray-700">Foto Copy KTP : 1 lembar</span>
                                            </li>
                                            <li class="flex items-center space-x-2">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-gray-700">Foto 3x4 : 2 lembar</span>
                                            </li>
                                            <li class="text-red-600 text-sm font-medium">* Pastikan tipe file : PDF</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <input type="file" name="dokumen" id="dokumen"
                                        class="block w-full text-sm text-gray-500 
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-medium
                                    file:bg-blue-600 file:text-white
                                    hover:file:bg-blue-700
                                    cursor-pointer"
                                        required>
                                </div>
                            </div>
                    </form>
                </div>

                <div class="mt-6 flex justify-center">
                    <button type="submit" form="dataDiriForm" 
                        class="px-6 py-2 text-sm font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 transition-all duration-300">
                        Simpan
                    </button>
                </div>

                <div id="nextForm" class="hidden mt-6 transition-all duration-300">
                    <div class="bg-white shadow-lg rounded-2xl p-6">
                        <div class="border-b pb-3 mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Data Pendaftaran</h2>
                            <p class="text-gray-600 text-sm mt-1">Silakan pilih paket kursus dan metode pembayaran</p>
                        </div>
                        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-6">
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">Pilih Paket Kursus *</label>
                                    <select name="paket_id" id="paket_id"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        required>
                                        <option value="">-- Pilih Paket Kursus --</option>
                                        @foreach ($paket as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_paket }} - Rp
                                                {{ number_format($p->harga, 0, ',', '.') }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">Metode Pembayaran *</label>
                                    <select name="metode_pembayaran" id="metode_pembayaran"
                                        class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3"
                                        onchange="handlePaymentMethod(this.value)" required>
                                        <option value="">-- Pilih Metode Pembayaran --</option>
                                        <option value="UangTunai">Uang Tunai</option>
                                    </select>
                                </div>

                                <input type="hidden" name="tanggal_daftar" value="{{ date('Y-m-d') }}">
                                <input type="hidden" name="status_pembayaran" value="BelumDibayar">

                                <div class="flex justify-center mt-6">
                                    <button type="button" onclick="handleDaftar()"
                                        class="px-6 py-2 text-sm font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 transition-all duration-300">
                                        Daftar Sekarang
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

            </div>

            <!-- Modal Konfirmasi Pembayaran Tunai -->
            <div id="modalPembayaranTunai" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi Pembayaran Tunai</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                Silakan datang ke kantor kami untuk melakukan pembayaran kepada pengurus.
                            </p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="closeModal" class="px-4 py-2 bg-blue-600 text-white rounded-md">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function validateForm() {
                    const requiredFields = [
                        'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
                        'pendidikan_terakhir', 'alamat', 'no_telepon', 'email', 'dokumen'
                    ];

                    const allFilled = requiredFields.every(field => {
                        const element = document.getElementById(field);
                        return element && element.value;
                    });

                    const lanjutkanBtn = document.getElementById('lanjutkanBtn');
                    if (allFilled) {
                        lanjutkanBtn.disabled = false;
                        lanjutkanBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        lanjutkanBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    } else {
                        lanjutkanBtn.disabled = true;
                        lanjutkanBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                        lanjutkanBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                    }
                }

                document.querySelectorAll('#dataDiriForm input, #dataDiriForm select').forEach(element => {
                    element.addEventListener('input', validateForm);
                });

                function handlePaymentMethod(method) {
                    // Simpan metode pembayaran yang dipilih
                    window.selectedPaymentMethod = method;
                }

                function handleDaftar() {
                    if (window.selectedPaymentMethod === 'UangTunai') {
                        document.getElementById('modalPembayaranTunai').classList.remove('hidden');
                    }
                }

                document.getElementById('closeModal').addEventListener('click', function() {
                    document.getElementById('modalPembayaranTunai').classList.add('hidden');
                    document.querySelector('form').submit();
                });
            </script>
        </div>
    </div>
    </div>
@endsection
