@extends('components.app')
@section('content')
    <div class="bg-[#F7F7F8] p-8">
        <section id="hero" class=" p-8 text-center">
            <h1 class="text-4xl font-bold bg-white inline-block"> <span class="icon-[ri--steering-fill]"></span> Latih Kemampuan Menyetirmu</h1>
            <h2 class="text-3xl ">Dengan OTOMOTIF Kursus Mengemudi Wlingi</h2>
            <p class="mt-4">Belajar dari para ahli untuk meningkatkan keterampilan mengemudi Anda.</p>
            <div class="mt-8 flex justify-center space-x-4">
                <button class="bg-[#445FB5] hover:bg-[#364b8f] text-white py-2 px-4 rounded-[8px]">Daftar Sekarang</button>
                <button class="bg-white hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-[8px]">Selengkapnya</button>
            </div>
        </section>

        <section id="fasilitas" class="p-8">
            <h2 class="text-2xl font-semibold mb-4">Fasilitas</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg">Fasilitas 1</div>
                <div class="bg-gray-200 p-4 rounded-lg">Fasilitas 2</div>
                <div class="bg-gray-200 p-4 rounded-lg">Fasilitas 3</div>
            </div>
        </section>

        <section id="kursus-kami" class="p-8">
            <h2 class="text-2xl font-semibold mb-4">Kursus Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg">Teori 1</div>
                <div class="bg-gray-200 p-4 rounded-lg">Teori 2</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div class="bg-gray-200 p-4 rounded-lg">Praktek 1</div>
                <div class="bg-gray-200 p-4 rounded-lg">Praktek 2</div>
            </div>
        </section>

        <section id="testimoni" class="p-8">
            <h2 class="text-2xl font-semibold mb-4">Testimoni</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg">Testimoni 1</div>
                <div class="bg-gray-200 p-4 rounded-lg">Testimoni 2</div>
            </div>
        </section>

        <section id="paket-kursus" class="p-8">
            <h2 class="text-2xl font-semibold mb-4">Paket Kursus</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg">Paket 1</div>
                <div class="bg-gray-200 p-4 rounded-lg">Paket 2</div>
                <div class="bg-gray-200 p-4 rounded-lg">Paket 3</div>
            </div>
        </section>
    </div>
@endsection