@extends('user/components.app')
@section('content')
    <div class="container p-8 px-20 h-screen">
        <div class="grid grid-cols-2 gap-4 mt-8">
            <div class="text-gray-800 mb-12">
                <span class="text-5xl font-bold">Nama Siswa</span>
                <small> Pertemuan ke-$</small>
            </div>
            <div class="text-center">
                <p class="text-gray-900 font-medium mt-4 mb-2 text-lg">Paket Y</p>
            </div>
        </div>
        <hr class="border-b border-[#E4E4E7] w-full">

        <div class="mt-8">
            <table class="min-w-full">
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b">Tempat Tanggal Lahir</td>
                        <td class="py-2 px-4 border-b">Bitar, 11/11/1991</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">Jenis Kelamin</td>
                        <td class="py-2 px-4 border-b">Laki-laki</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">Pendidikan Terakhir</td>
                        <td class="py-2 px-4 border-b">SMA Sederajat</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border-b">Alamat</td>
                        <td class="py-2 px-4 border-b">Babadan, Wilangi</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
