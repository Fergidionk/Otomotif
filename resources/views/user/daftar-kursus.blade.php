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
                                    cursor-pointer" required>
                                </div>
                            </div>
                    </form>
                </div>

                <div class="mt-6 flex justify-center">
                    <button type="button" id="lanjutkanBtn" onclick="validateAndShowNext()" disabled
                        class="px-6 py-2 text-sm font-medium rounded-full text-white bg-gray-400 cursor-not-allowed transition-all duration-300">
                        Lanjutkan
                    </button>
                </div>

                <div id="nextForm" class="hidden mt-6 transition-all duration-300">
                    <!-- Form content remains the same -->
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

                    function validateAndShowNext() {
                        const form = document.getElementById('dataDiriForm');
                        if (form.checkValidity()) {
                            document.getElementById('nextForm').classList.remove('hidden');
                            document.getElementById('nextForm').classList.add('animate-fadeIn');
                        } else {
                            form.reportValidity();
                        }
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
