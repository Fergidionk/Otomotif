@extends('user/components.app')
@section('content')
    <!-- Alert Modal -->
    <div id="alertModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100">
                    <i class="fas fa-exclamation-circle text-yellow-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Perhatian</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        {{ session('error') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

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
                                            <option value="SD">SD/Sederajat</option>
                                            <option value="SMP">SMP/Sederajat</option>
                                            <option value="SMA">SMA/Sederajat</option>
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
                                            class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-base py-2 px-3 bg-gray-100"
                                            value="{{ Auth::user()->email }}" readonly>
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
                                <p class="text-gray-600"><strong>Pendidikan:</strong> {{ $siswa->pendidikan_terakhir }}</p>
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
                                    <label class="block text-gray-700 font-medium mb-2">Pilih Paket *</label>
                                    <select name="paket_id" id="paket_id" class="form-select" required>
                                        <option value="">Pilih Paket</option>
                                        @foreach($paket as $p)
                                            <option value="{{ $p->id }}">{{ $p->nama_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium mb-2">Metode Pembayaran *</label>
                                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                                        <option value="">Pilih Metode Pembayaran</option>
                                        <option value="Uang Tunai">Uang Tunai</option>
                                        <option value="Transfer Bank">Transfer Bank</option>
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

                @if(!$siswa)
                    <div class="mt-6 flex justify-center">
                        <button type="submit" form="dataDiriForm" 
                            class="px-6 py-2 text-sm font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 transition-all duration-300">
                            Simpan
                        </button>
                    </div>
                @endif

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

            <!-- Tambahkan modal sukses setelah modal konfirmasi pembayaran -->
            <div id="successModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Pendaftaran Berhasil!</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                Silakan datang ke kantor kami untuk melakukan pembayaran.
                            </p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <button id="closeSuccessModal" class="px-4 py-2 bg-green-600 text-white rounded-md">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function validateForm() {
                    const requiredFields = [
                        'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
                        'pendidikan_terakhir', 'alamat', 'no_telepon', 'berkas_pdf'
                    ];

                    const allFilled = requiredFields.every(field => {
                        const element = document.getElementById(field);
                        if (!element) return false;
                        if (element.type === 'file') {
                            return element.files.length > 0;
                        }
                        return element.value.trim() !== '';
                    });

                    const submitBtn = document.querySelector('button[type="submit"]');
                    if (allFilled) {
                        submitBtn.disabled = false;
                        submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        submitBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
                    } else {
                        submitBtn.disabled = true;
                        submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                        submitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                    }
                }

                document.querySelectorAll('#dataDiriForm input, #dataDiriForm select').forEach(element => {
                    element.addEventListener('input', validateForm);
                });

                document.addEventListener('DOMContentLoaded', validateForm);

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

                document.addEventListener('DOMContentLoaded', function() {
                    // Tambahkan event listener untuk select paket
                    const paketSelect = document.getElementById('paket_id');
                    const detailPaket = document.getElementById('detailPaket');
                    const hargaPaket = document.getElementById('hargaPaket');
                    const pertemuanPaket = document.getElementById('pertemuanPaket');

                    paketSelect.addEventListener('change', function() {
                        const selectedOption = this.options[this.selectedIndex];
                        if (this.value) {
                            detailPaket.classList.remove('hidden');
                            hargaPaket.textContent = 'Rp ' + selectedOption.dataset.harga;
                            pertemuanPaket.textContent = selectedOption.dataset.pertemuan;
                        } else {
                            detailPaket.classList.add('hidden');
                        }
                    });

                    const pendaftaranForm = document.getElementById('pendaftaranForm');
                    if (pendaftaranForm) {
                        pendaftaranForm.addEventListener('submit', function(e) {
                            e.preventDefault();
                            
                            const formData = new FormData(this);
                            
                            // Debug form data
                            for (let pair of formData.entries()) {
                                console.log(pair[0] + ': ' + pair[1]);
                            }
                            
                            fetch(this.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => {
                                if (!response.ok) {
                                    return response.json().then(err => Promise.reject(err));
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    // Tampilkan modal sukses
                                    document.getElementById('successModal').classList.remove('hidden');
                                    
                                    // Redirect setelah beberapa detik
                                    setTimeout(() => {
                                        window.location.href = data.redirect;
                                    }, 3000);
                                } else {
                                    throw new Error(data.message || 'Terjadi kesalahan');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert(error.message || 'Terjadi kesalahan sistem');
                            });
                        });
                    }

                    // Tambahkan event listener untuk tombol close di modal sukses
                    document.getElementById('closeSuccessModal')?.addEventListener('click', function() {
                        document.getElementById('successModal').classList.add('hidden');
                        window.location.href = '{{ route("beranda") }}';
                    });
                });

                // Pastikan CSRF token tersedia di head
                document.head.insertAdjacentHTML('beforeend', `
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                `);
            </script>
        </div>
    </div>

    @if(session('showModal'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('alertModal');
            modal.classList.remove('hidden');
            
            // Otomatis hilang setelah 3 detik
            setTimeout(function() {
                modal.classList.add('hidden');
            }, 3000);
        });
    </script>
    @endif
@endsection
