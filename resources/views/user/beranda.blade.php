@extends('user/components.app')
@section('content')
    <!-- Modal Login Alert -->
    <div id="loginAlert" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100">
                    <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Autentikasi Diperlukan</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Anda harus login atau register terlebih dahulu untuk mengakses halaman pendaftaran kursus.
                    </p>
                </div>
                <div class="flex justify-center space-x-4 mt-4">
                    <button onclick="closeLoginAlert()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                        Tutup
                    </button>
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="p-8">
        <section id="hero" class="p-5 md:p-20 text-center">
            <h1 class="text-4xl font-bold bg-white inline-block"><span class="text-[#445FB5]">Latih</span> Kemampuan Menyetirmu</h1>
            <h2 class="text-3xl mt-4">Dengan <span class="text-[#445FB5]">OTOMOTIF</span> Kursus Mengemudi Wlingi</h2>
            <p class="mt-4">Belajar dari para ahli untuk meningkatkan keterampilan mengemudi Anda.</p>
            <div class="mt-10 flex justify-center space-x-4">
                <a href="#" onclick="handleDaftarKursusClick(event)" class="bg-[#445FB5] hover:bg-[#364b8f] text-white py-2 px-4 rounded-[8px]">Daftar Sekarang</a>
                <button class="bg-white hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-[8px]">Selengkapnya</button>
            </div>

            <div class="mt-20">
                <div class="bg-white p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">
                        <div class="flex justify-center">
                            <img src="/images/KemnakerLambang.png" alt="Logo Kemenaker" class="h-14 mb-4">
                        </div>
                        <div class="flex justify-center">
                            <img src="/images/PolriLambang.png" alt="Logo Polri" class="h-14 mb-4">
                        </div>
                        <div class="flex justify-center">
                            <img src="/images/KemendikbudLambang.png" alt="Logo Kemendikbud" class="h-14 mb-4">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-center">
                <img src="/images/OtomotifHero.png" alt="Gedung Otomotif" class="w-[1000px] h-[500px] object-cover shadow-lg">
            </div>
        </section>

        <section id="fasilitas" class="p-5 md:p-8">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="text-2xl font-semibold">Fasilitas</h2>
                    <p class="text-gray-600 mt-2">Kami menyediakan berbagai fasilitas modern untuk mendukung proses belajar mengemudi Anda</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-5">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-4">
                        <h3 class="text-5xl font-bold">01</h3>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Mobil Latihan</h4>
                        <p class="text-gray-600">Kami menyediakan mobil latihan terbaru dan terawat secara rutin, sehingga Anda bisa belajar mengemudi dengan tenang tanpa perlu khawatir tentang kondisi kendaraan.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-4">
                        <h3 class="text-5xl font-bold">02</h3>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Instruktur Berpengalaman</h4>
                        <p class="text-gray-600">Instruktur kami memiliki pengalaman bertahun-tahun dalam mengajar mengemudi dengan pendekatan yang sabar dan profesional dengan pengajaran yang mudah dipahami</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-4">
                        <h3 class="text-5xl font-bold">03</h3>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold mb-2">Tempat Latihan Yang Strategis</h4>
                        <p class="text-gray-600">tempat latihan yang strategis, sehingga memudahkan siswa untuk belajar mengemudi di berbagai kondisi jalan dan siap menghadapi situasi berkendara yang sesungguhnya.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="kursus-kami" class="p-5 md:p-8">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h2 class="text-2xl font-semibold">Kursus Kami</h2>
                    <p class="text-gray-600 mt-2">Pilih kursus yang sesuai dengan kebutuhan belajar mengemudi Anda</p>
                </div>
            </div>

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Teori</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Pemula
                    </div>
                    <h4 class="text-lg font-semibold mb-2">Dasar-Dasar Mengemudi</h4>
                    <p class="text-gray-600 mb-4">Pelajari dasar-dasar mengemudi, termasuk peraturan lalu lintas dan keselamatan di jalan.</p>
                    <button onclick="location.href='{{ url('/kursus?materi=Dasar-Dasar-Mengemudi') }}'" class="w-full bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-[8px]">Lihat Materi</button>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Menengah
                    </div>
                    <h4 class="text-lg font-semibold mb-2">Teknik Mengemudi Lanjutan</h4>
                    <p class="text-gray-600 mb-4">Pelajari teknik mengemudi lanjutan, termasuk mengemudi di berbagai kondisi jalan dan situasi.</p>
                    <button onclick="location.href='{{ url('/kursus?materi=Teknik-Mengemudi-Lanjutan') }}'" class="w-full bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-[8px]">Lihat Materi</button>
                </div>
            </div>

            <div class="flex justify-between items-center mb-4 mt-8">
                <h3 class="text-xl font-semibold">Praktek</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Dasar
                    </div>
                    <h4 class="text-lg font-semibold mb-2">Praktek Dasar Mengemudi</h4>
                    <p class="text-gray-600 mb-4">Pelajari cara mengemudi di jalan raya dengan aman dan nyaman.</p>
                    <button onclick="location.href='{{ url('/kursus?materi=Praktek-Dasar-Mengemudi') }}'" class="w-full bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-[8px]">Lihat Materi</button>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Mahir
                    </div>
                    <h4 class="text-lg font-semibold mb-2">Praktek Teknik Mengemudi Lanjutan</h4>
                    <p class="text-gray-600 mb-4">Pelajari cara mengemudi di berbagai kondisi jalan dan cuaca.</p>
                    <button onclick="location.href='{{ url('/kursus?materi=Praktek-Teknik-Mengemudi-Lanjutan') }}'" class="w-full bg-[#F1F1F3] hover:bg-[#E1F1E3] text-black py-2 px-4 rounded-[8px]">Lihat Materi</button>
                </div>
            </div>
        </section>

        <section id="testimoni" class="p-5 md:p-8">
            <h2 class="text-2xl font-semibold">Testimoni</h2>
            <p class="text-gray-600 mt-2 mb-8">Lihat apa kata siswa kursus kami tentang pengalaman belajar mengemudi bersama instruktur profesional!</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-gray-700 mb-6">"saya tadinya takut karena nggak pernah bawa mobil sama sekali. Tapi, alhamdulillah, berkat Kursus Otomotif Wlingi, saya bisa belajar dengan tenang. Instruktur-instrukturnya ramah dan ngasih arahan yang jelas.</p>
                    
                    <div class="flex items-center">
                        <img src="/images/FotoTestimoni.png" alt="Sarah L" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Sarah L</h4>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-gray-700 mb-6">"saya tadinya takut karena nggak pernah bawa mobil sama sekali. Tapi, alhamdulillah, berkat Kursus Otomotif Wlingi, saya bisa belajar dengan tenang. Instruktur-instrukturnya ramah dan ngasih arahan yang jelas.</p>
                    
                    <div class="flex items-center">
                        <img src="/images/FotoTestimoni.png" alt="Jason M" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Jason M</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="paket-kursus" class="p-5 md:p-8">
            <h2 class="text-2xl font-semibold">Paket Kursus</h2>
            <p class="text-gray-600 mt-2 mb-8">Pilih paket kursus sesuai kebutuhan Anda, lengkap dengan sesi praktik dan teori bersama instruktur berpengalaman.</p>
            
            <div class="bg-white p-5 md:p-20 rounded-lg shadow-md">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                    <!-- Paket 1 -->
                    <div class="bg-[#8B9FDB] p-4 rounded-lg">
                        <div class="bg-white rounded-lg p-3 text-center mb-8">
                            <h3 class="text-lg font-medium">Paket perpaket (1 pertemuan)</h3>
                        </div>
                        
                        <div class="text-center mb-8">
                            <div class="text-5xl font-bold text-white">
                                Rp100K
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg p-12">
                            <h4 class="font-medium text-lg text-center mb-8">Layanan Tersedia</h4>
                            <div class="space-y-4">
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Instruktur Berpengalaman</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Simulasi Mengemudi di Jalan Raya</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Latihan Parkir</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Materi Teori Lalu Lintas</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </div>
                                    <span>Ujian Simulasi Ujian SIM</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </div>
                                    <span>Dukungan Persiapan Ujian SIM</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                    </div>
                                    <span>Materi Lengkap</span>
                                </div>
                            </div>
                        </div>
                        
                        <button onclick="handleDaftarClick()" class="w-full bg-[#445FB5] hover:bg-[#364b8f] text-white py-2 px-4 rounded-lg mt-4 font-medium">
                            Daftar
                        </button>
                    </div>

                    <!-- Paket 2 -->
                    <div class="bg-[#8B9FDB] p-4 rounded-lg">
                        <div class="bg-white rounded-lg p-3 text-center mb-8">
                            <h3 class="text-lg font-medium">Paket 6 pertemuan</h3>
                        </div>
                        
                        <div class="text-center mb-8">
                            <div class="text-5xl font-bold text-white">
                                Rp350K
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg p-12">
                            <h4 class="font-medium text-lg text-center mb-8">Layanan Tersedia</h4>
                            <div class="space-y-4">
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Instruktur Berpengalaman</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Simulasi Mengemudi di Jalan Raya</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Latihan Parkir</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Materi Teori Lalu Lintas</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Ujian Simulasi Ujian SIM</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Dukungan Persiapan Ujian SIM</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Materi Menengah</span>
                                </div>
                            </div>
                        </div>
                        
                        <button onclick="handleDaftarClick()" class="w-full bg-[#445FB5] hover:bg-[#364b8f] text-white py-2 px-4 rounded-lg mt-4 font-medium">
                            Daftar
                        </button>
                    </div>

                    <!-- Paket 3 -->
                    <div class="bg-[#8B9FDB] p-4 rounded-lg">
                        <div class="bg-white rounded-lg p-3 text-center mb-8">
                            <h3 class="text-lg font-medium">Paket 12 Pertemuan</h3>
                        </div>
                        
                        <div class="text-center mb-8">
                            <div class="text-5xl font-bold text-white">
                                Rp650K
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg p-12">
                            <h4 class="font-medium text-lg text-center mb-8">Layanan Tersedia</h4>
                            <div class="space-y-4">
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Instruktur Berpengalaman</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Simulasi Mengemudi di Jalan Raya</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Latihan Parkir</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Materi Teori Lalu Lintas</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Ujian Simulasi Ujian SIM</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Dukungan Persiapan Ujian SIM</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-[#FFF4E5] p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <span>Materi Expert</span>
                                </div>
                            </div>
                        </div>
                        
                        <button onclick="handleDaftarClick()" class="w-full bg-[#445FB5] hover:bg-[#364b8f] text-white py-2 px-4 rounded-lg mt-4 font-medium">
                            Daftar
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function handleDaftarClick() {
            @auth
                window.location.href = "{{ route('daftar.kursus') }}";
            @else
                document.getElementById('loginAlert').classList.remove('hidden');
            @endauth
        }

        function closeLoginAlert() {
            document.getElementById('loginAlert').classList.add('hidden');
        }
    </script>
@endsection