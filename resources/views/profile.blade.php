@extends('components.app')
@section('content')
    <div class="container p-8">
        <div class="grid grid-cols-2 gap-4">
            <div class=" text-gray-800 mb-4"><span class="text-2xl font-bold">Nama Siswa</span><small> Pertemuan
                    ke-$</small></div>
            <div class="text-right">
                <p class="text-gray-900 text-center font-medium mb-2 text-medium">Paket Y</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <p class="text-gray-900 font-medium mb-2 text-medium">Tempat Tanggal Lahir</p>
            </div>
            <div class="text-right">
                <p class="text-gray-700">Blitar, 11/11/1991</p>
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <p class="text-gray-900 font-medium mb-2 text-medium">Jenis Kelamin</p>
            </div>
            <div class="text-right">
                <p class="text-gray-700">Laki-laki</p>
            </div>

        </div>
        <hr>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <p class="text-gray-900 font-medium mb-2 text-medium">Pendidikan Terakhir</p>
            </div>
            <div class="text-right">
                <p class="text-gray-700">SMA Sederajat</p>
            </div>

        </div>
        <hr>
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <p class="text-gray-900 font-medium mb-2 text-medium">Alamat</p>
            </div>
            <div class="text-right">
                <p class="text-gray-700">Jl. Merdeka No. 10, Blitar</p>
            </div>

        </div>
        <hr>
        <div class="mt-6">
            <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Simpan</button>
        </div>
    </div>
@endsection
