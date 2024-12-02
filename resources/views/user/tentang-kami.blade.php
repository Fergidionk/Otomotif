@extends('components.app')
@section('content')
    <div class="container bg-[#F7F7F8] mx-auto px-24 py-12">
        {{-- <!-- Section Tentang Otomotif -->
        <div class="text-center mb-36 px-20">
            <h1 class="text-3xl font-bold mt-8 mb-20">Tentang Otomotif</h1>
            <div class="flex items-center gap-12">
                <div class="w-1/3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Otomotif" class="w-[200px]">
                </div>
                <div class="w-2/3 text-left">
                    <p class="text-gray-600 mb-4">
                        Kami adalah penyedia kursus mengemudi profesional yang berkomitmen untuk membantu dan mengajari
                        pengemudi yang handal, tentunya dari segi teori maupun praktek. Dengan instruktur berpengalaman dan
                        bersertifikat, setiap instruktur kami memahami kebutuhan setiap peserta, memberikan pelatihan yang
                        disesuaikan dan efektif. Kami mengedepankan pendekatan teori dan praktik secara mendetail,
                        memastikan setiap peserta tidak hanya mahir mengemudi tetapi juga memahami aturan dan etika berlalu
                        lintas dengan baik.
                    </p>
                    <p class="text-gray-600">
                        Fasilitas modern kami, termasuk kendaraan terbaru dan instruktur berpengalaman, mendukung yang
                        terbaik dalam lingkungan belajar yang aman dan nyaman. Kami berkomitmen untuk menjadi mitra terbaik
                        bagi setiap calon pengemudi, dan berkomitmen penuh untuk memberikan pengalaman belajar terbaik bagi
                        setiap siswa. Mari bergabung dengan kami dan wujudkan impian Anda untuk menjadi pengemudi yang
                        unggul!
                    </p>
                </div>
            </div>
        </div> --}}

        <!-- Bagian Header Kontak -->
        <div class="flex flex-col lg:flex-row justify-between py-8 px-4 lg:px-32">
            <div class="w-full lg:w-3/5 text-center mt-4 mb-4 lg:mb-0">
                <h1 class="text-3xl font-bold">Tentang Otomotif</h1>
            </div>
            <div class="w-full lg:w-4/5">
                <p class="mb-4 text-center lg:text-left">
                    Komitmen kami terhadap keunggulan telah membuat kami mencapai pencapaian yang signifikan di sepanjang
                    perjalanan kami. Berikut adalah beberapa pencapaian penting kami:
                </p>
            </div>
        </div>
        
        <!-- Section Kenapa Harus Kursus -->
        <div class="mb-12">
            <!-- Tempat Strategis -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-map-marker-alt text-biru"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Tempat Strategis</h3>
                <p class="text-gray-600">
                    Lokasi kursus kami mudah dijangkau dan berada di pusat kota Wlingi, memudahkan akses dari berbagai
                    area. Nyaman untuk semua peserta!
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Instruktur Ramah -->
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-friends text-biru"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Instruktur Ramah</h3>
                    <p class="text-gray-600">
                        Instruktur kami selalu siap membantu dengan sabar dan ramah, menciptakan suasana belajar yang nyaman
                        dan menyenangkan bagi setiap peserta.
                    </p>
                </div>

                <!-- Menggunakan Kendaraan Terbaru -->
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-car text-biru"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Menggunakan Kendaraan Terbaru</h3>
                    <p class="text-gray-600">
                        Kami menggunakan kendaraan terbaru dengan fitur keamanan lengkap, memberikan pengalaman belajar yang
                        aman dan nyaman.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
