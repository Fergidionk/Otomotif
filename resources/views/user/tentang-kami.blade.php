@extends('user/components.app')
@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-36 px-4 md:px-20">
            <h1 class="text-3xl font-bold mt-8 mb-20">Tentang Otomotif</h1>
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/3">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Otomotif" class="w-[200px] mx-auto">
                </div>
                <div class="w-full md:w-2/3 text-left">
                    <p class="text-gray-600 mb-4">Kami adalah penyedia kursus mengemudi profesional dengan pengalaman bertahun-tahun...</p>
                    <p class="text-gray-600">Fasilitas modern kami, termasuk kendaraan terbaru dan instruktur berpengalaman, siap membantu Anda mencapai tujuan mengemudi Anda.</p>
                </div>
            </div>
        </div>
        <div class="mb-12 md:px-20">
            <h2 class="text-2xl font-bold mb-6">Kenapa Harus Kursus di Otomotif Wlingi</h2>
            <p class="text-gray-600 mb-8">Komitmen kami terhadap keunggulan dan kepuasan siswa adalah prioritas utama kami. Berikut adalah beberapa keunggulan kami:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-map-marker-alt text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Tempat Strategis</h3>
                    <p class="text-gray-600">Lokasi kursus kami mudah dijangkau dan nyaman untuk belajar.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-friends text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Instruktur Ramah</h3>
                    <p class="text-gray-600">Instruktur kami selalu siap membantu dan memberikan bimbingan yang diperlukan.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-car text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Kendaraan Modern</h3>
                    <p class="text-gray-600">Kami menggunakan kendaraan terbaru untuk memberikan pengalaman belajar yang optimal.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-clock text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Jadwal Fleksibel</h3>
                    <p class="text-gray-600">Kami menawarkan jadwal yang fleksibel untuk menyesuaikan dengan kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
