@extends('components.app')
@section('content')
    <div class="bg-putih p-8">
        <section id="hero" class="p-6 md:p-20 text-center">
            <h1 class="text-2xl md:text-4xl font-bold bg-white inline-block"><span class="text-biru">Latih</span> Kemampuan
                Menyetirmu</h1>
            <h2 class="text-xl md:text-3xl mt-4">Dengan <span class="text-biru">OTOMOTIF</span> Kursus Mengemudi Wlingi</h2>
            <p class="mt-4 text-sm md:text-base">Belajar dari para ahli untuk meningkatkan keterampilan mengemudi Anda.</p>
            <div class="mt-6 md:mt-10 flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                <a href="/daftar"
                    class="bg-biru hover:bg-blue-600 text-white py-2 px-4 rounded-[8px] text-sm md:text-base">Daftar
                    Sekarang</a>
                <button
                    class="bg-white hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-[8px] text-sm md:text-base">Selengkapnya</button>
            </div>

            <div class="mt-12 md:mt-20">
                <div class="bg-white p-4 md:p-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 md:gap-8 justify-items-center">
                        <div class="flex justify-center">
                            <img src="/images/KemnakerLambang.png" alt="Logo Kemenaker" class="h-10 md:h-14 mb-4">
                        </div>
                        <div class="flex justify-center">
                            <img src="/images/PolriLambang.png" alt="Logo Polri" class="h-10 md:h-14 mb-4">
                        </div>
                        <div class="flex justify-center">
                            <img src="/images/KemendikbudLambang.png" alt="Logo Kemendikbud" class="h-10 md:h-14 mb-4">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 md:mt-12 flex justify-center">
                <img src="/images/OtomotifHero.png" alt="Gedung Otomotif"
                    class="w-full max-w-[1000px] h-auto object-cover shadow-lg">
            </div>
        </section>

        <section id="fasilitas" class="p-4 md:p-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 md:mb-4">
                <div class="text-center md:text-left">
                    <h2 class="text-xl md:text-2xl font-semibold">Fasilitas</h2>
                    <p class="text-gray-600 mt-2 text-sm md:text-base">Kami menyediakan berbagai fasilitas modern untuk
                        mendukung proses belajar mengemudi Anda</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">
                <!-- Card 1 -->
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-4">
                        <h3 class="text-3xl md:text-5xl font-bold">01</h3>
                    </div>
                    <div>
                        <h4 class="text-lg md:text-xl font-semibold mb-2">Mobil Latihan</h4>
                        <p class="text-gray-600 text-sm md:text-base">Kami menyediakan mobil latihan terbaru dan terawat
                            secara rutin, sehingga Anda bisa belajar mengemudi dengan tenang tanpa perlu khawatir tentang
                            kondisi kendaraan.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-4">
                        <h3 class="text-3xl md:text-5xl font-bold">02</h3>
                    </div>
                    <div>
                        <h4 class="text-lg md:text-xl font-semibold mb-2">Instruktur Berpengalaman</h4>
                        <p class="text-gray-600 text-sm md:text-base">Instruktur kami memiliki pengalaman bertahun-tahun
                            dalam mengajar mengemudi dengan pendekatan yang sabar dan profesional dengan pengajaran yang
                            mudah dipahami.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <div class="flex justify-end mb-4">
                        <h3 class="text-3xl md:text-5xl font-bold">03</h3>
                    </div>
                    <div>
                        <h4 class="text-lg md:text-xl font-semibold mb-2">Tempat Latihan Yang Strategis</h4>
                        <p class="text-gray-600 text-sm md:text-base">Tempat latihan yang strategis, sehingga memudahkan
                            siswa untuk belajar mengemudi di berbagai kondisi jalan dan siap menghadapi situasi berkendara
                            yang sesungguhnya.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="kursus-kami" class="p-4 md:p-8">
            <!-- Header Section -->
            <div class=" md:flex md:justify-between md:items-center mb-6">
                <div>
                    <h2 class="text-xl md:text-2xl font-semibold">Kursus Kami</h2>
                    <p class="text-gray-600 mt-2 text-sm md:text-base">Pilih kursus yang sesuai dengan kebutuhan belajar
                        mengemudi Anda</p>
                </div>
            </div>

            <!-- Teori Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                <h3 class="text-lg md:text-xl font-semibold">Teori</h3>
                <button
                    class="mt-2 md:mt-0 bg-white hover:bg-gray-200 text-black py-2 px-4 rounded-[8px] text-sm md:text-base">Lihat
                    Semua</button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <div class="bg-blue-100 text-blue-800 text-xs md:text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Pemula
                    </div>
                    <h4 class="text-base md:text-lg font-semibold mb-2">Dasar-Dasar Mengemudi</h4>
                    <p class="text-gray-600 text-sm md:text-base mb-4">Pelajari dasar-dasar mengemudi, termasuk peraturan
                        lalu lintas dan keselamatan di jalan.</p>
                    <button
                        class="w-full bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-[8px] text-sm md:text-base">Lihat
                        Materi</button>
                </div>
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <div
                        class="bg-green-100 text-green-800 text-xs md:text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Menengah
                    </div>
                    <h4 class="text-base md:text-lg font-semibold mb-2">Teknik Mengemudi Lanjutan</h4>
                    <p class="text-gray-600 text-sm md:text-base mb-4">Pelajari teknik mengemudi lanjutan, termasuk
                        mengemudi di berbagai kondisi jalan dan situasi.</p>
                    <button
                        class="w-full bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-[8px] text-sm md:text-base">Lihat
                        Materi</button>
                </div>
            </div>

            <!-- Praktek Section -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-4 mt-8">
                <h3 class="text-lg md:text-xl font-semibold">Praktek</h3>
                <button
                    class="mt-2 md:mt-0 bg-white hover:bg-gray-200 text-black py-2 px-4 rounded-[8px] text-sm md:text-base">Lihat
                    Semua</button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6">
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <div
                        class="bg-yellow-100 text-yellow-800 text-xs md:text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Dasar
                    </div>
                    <h4 class="text-base md:text-lg font-semibold mb-2">Mengemudi di Jalan Raya</h4>
                    <p class="text-gray-600 text-sm md:text-base mb-4">Pelajari cara mengemudi di jalan raya dengan aman dan
                        nyaman.</p>
                    <button
                        class="w-full bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-[8px] text-sm md:text-base">Lihat
                        Materi</button>
                </div>
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <div
                        class="bg-purple-100 text-purple-800 text-xs md:text-sm font-medium px-3 py-1 rounded-full w-fit mb-3">
                        Mahir
                    </div>
                    <h4 class="text-base md:text-lg font-semibold mb-2">Mengemudi di Berbagai Kondisi</h4>
                    <p class="text-gray-600 text-sm md:text-base mb-4">Pelajari cara mengemudi di berbagai kondisi jalan dan
                        cuaca.</p>
                    <button
                        class="w-full bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-[8px] text-sm md:text-base">Lihat
                        Materi</button>
                </div>
            </div>
        </section>

        <section id="testimoni" class="p-4 md:p-8">
            <h2 class="text-xl md:text-2xl font-semibold text-center">Testimoni</h2>
            <p class="text-gray-600 mt-2 mb-6 text-sm md:text-base text-center">
                Lihat apa kata siswa kursus kami tentang pengalaman belajar mengemudi bersama instruktur profesional!
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8">
                <!-- Testimoni 1 -->
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <p class="text-gray-700 text-sm md:text-base mb-4">
                        "Saya tadinya takut karena nggak pernah bawa mobil sama sekali. Tapi, alhamdulillah, berkat Kursus
                        Otomotif Wlingi, saya bisa belajar dengan tenang. Instruktur-instrukturnya ramah dan ngasih arahan
                        yang jelas."
                    </p>
                    <div class="flex items-center">
                        <img src="/images/FotoTestimoni.png" alt="Sarah L"
                            class="w-10 h-10 md:w-12 md:h-12 rounded-full mr-3">
                        <div>
                            <h4 class="text-sm md:text-base font-semibold">Sarah L</h4>
                        </div>
                    </div>
                </div>

                <!-- Testimoni 2 -->
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-md">
                    <p class="text-gray-700 text-sm md:text-base mb-4">
                        "Saya tadinya takut karena nggak pernah bawa mobil sama sekali. Tapi, alhamdulillah, berkat Kursus
                        Otomotif Wlingi, saya bisa belajar dengan tenang. Instruktur-instrukturnya ramah dan ngasih arahan
                        yang jelas."
                    </p>
                    <div class="flex items-center">
                        <img src="/images/FotoTestimoni.png" alt="Jason M"
                            class="w-10 h-10 md:w-12 md:h-12 rounded-full mr-3">
                        <div>
                            <h4 class="text-sm md:text-base font-semibold">Jason M</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="paket-kursus" class="p-8">
            <h2 class="text-2xl font-semibold">Paket Kursus</h2>
            <p class="text-gray-600 mt-2 mb-8">Pilih paket kursus sesuai kebutuhan Anda, lengkap dengan sesi praktik dan
                teori bersama instruktur berpengalaman.</p>

            <div class="bg-white p-8 rounded-lg shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <!-- Paket 1 -->
                    <div class="bg-birucard p-4 rounded-lg">
                        <div class="bg-white rounded-lg p-3 text-center mb-8">
                            <h3 class="text-lg font-medium">Paket perpaket (1 pertemuan)</h3>
                        </div>

                        <div class="text-center mb-8">
                            <div class="text-5xl font-bold text-white">
                                Rp100K
                            </div>
                        </div>

                        <div class="bg-white rounded-lg p-6">
                            <h4 class="font-medium text-lg text-center mb-8">Layanan Tersedia</h4>
                            <div class="space-y-4">
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Instruktur Berpengalaman</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Simulasi Mengemudi di Jalan Raya</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Latihan Parkir</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Materi Teori Lalu Lintas</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <span>Ujian Simulasi Ujian SIM</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <span>Dukungan Persiapan Ujian SIM</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </div>
                                    <span>Materi Lengkap</span>
                                </div>
                            </div>
                        </div>

                        <button class="w-full bg-biru hover:bg-blue-600 text-white py-2 px-4 rounded-lg mt-4 font-medium">
                            Daftar
                        </button>
                    </div>

                    <!-- Paket 2 -->
                    <div class="bg-birucard p-4 rounded-lg">
                        <div class="bg-white rounded-lg p-3 text-center mb-8">
                            <h3 class="text-lg font-medium">Paket 6 pertemuan</h3>
                        </div>

                        <div class="text-center mb-8">
                            <div class="text-5xl font-bold text-white">
                                Rp350K
                            </div>
                        </div>

                        <div class="bg-white rounded-lg p-6">
                            <h4 class="font-medium text-lg text-center mb-8">Layanan Tersedia</h4>
                            <div class="space-y-4">
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Instruktur Berpengalaman</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Simulasi Mengemudi di Jalan Raya</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Latihan Parkir</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Materi Teori Lalu Lintas</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Simulasi Ujian Sim</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Dukungan Persiapan Ujian Sim</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Materi Menengah</span>
                                </div>
                            </div>
                        </div>

                        <button class="w-full bg-biru hover:bg-blue-600 text-white py-2 px-4 rounded-lg mt-4 font-medium">
                            Daftar
                        </button>
                    </div>

                    <!-- Paket 3 -->
                    <div class="bg-birucard p-4 rounded-lg">
                        <div class="bg-white rounded-lg p-3 text-center mb-8">
                            <h3 class="text-lg font-medium">Paket 12 Pertemuan</h3>
                        </div>

                        <div class="text-center mb-8">
                            <div class="text-5xl font-bold text-white">
                                Rp650K
                            </div>
                        </div>

                        <div class="bg-white rounded-lg p-6">
                            <h4 class="font-medium text-lg text-center mb-8">Layanan Tersedia</h4>
                            <div class="space-y-4">
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Instruktur Berpengalaman</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Simulasi Mengemudi di Jalan Raya</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Latihan Parkir</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Materi Teori Lalu Lintas</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Simulasi Ujian Sim</span>
                                </div>
                                <div class="flex items-center border-b pb-3">
                                    <div class="p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Dukungan Persiapan Ujian Sim</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="bg-white p-4 rounded-lg mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-biru" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Materi Expert</span>
                                </div>
                            </div>
                        </div>

                        <button class="w-full bg-biru hover:bg-blue-600 text-white py-2 px-4 rounded-lg mt-4 font-medium">
                            Daftar
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection