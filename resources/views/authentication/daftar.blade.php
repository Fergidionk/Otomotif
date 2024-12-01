@extends('components.app')
@section('content')
    <div class="container-fluid mx-auto py-28 px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-2xl font-bold mb-4">Testimoni Siswa</h2>
                <p class="mb-4 text-sm text-gray-600">Pengalaman nyata dari siswa-siswi kami yang telah berhasil menguasai
                    ketrampilan IT
                    yang mereka inginkan. Mulai dari yang awalnya ragu hingga akhirnya percaya diri di jalan yang mereka
                    pilih, testimoni ini adalah bukti nyata dedikasi kami dalam memberikan layanan karir yang
                    menjanjikan untuk lebih baik.</p>
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-gray-600">"Saya tadinya takut karena nggak pernah tau model sama sekali. Tapi,
                        alhamdulillah, berkat Kursus Online ini saya bisa belajar dengan tenang.
                        Instruktur-instrukturnya ramah dan ngasih arahan yang jelas."</p>
                    <div class="flex items-center mt-4">
                        <img src="https://via.placeholder.com/40" alt="Profile Picture" class="w-10 h-10 rounded-full mr-2">
                        <p class="font-medium">Reedy Prasetio</p>
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="bg-[#445FB5] hover:bg-[#445FB5] text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-center mb-4">Mendaftar</h2>
                <div class="text-center text-sm text-[#4C4C4D]">Buat akun sebelum mendaftar kursus</div>
                <form>
                    <label for="email" class="block mb-2 text-sm font-bold">Nama</label>
                    <input type="email" id="email"
                        class="w-full mb-1 p-2 pl-10 text-sm text-gray-700 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan Nama Panjang">

                    <label for="email" class="block mb-2 text-sm font-bold">Email</label>
                    <input type="email" id="email"
                        class="w-full mb-1 p-2 pl-10 text-sm text-gray-700 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="contoh@gmail.com">

                    <label for="password" class="block mb-2 text-sm font-bold">Password</label>
                    <input type="password" id="password"
                        class="w-full p-2 pl-10 text-sm mb-4 text-gray-700 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Password">
                    <button class="bg-[#445FB5] hover:bg-[#354a8f] text-white font-bold py-2 px-4 rounded w-full">Daftar</button>
                </form>
                <div class="flex items-center justify-center">
                    <hr class="border-t border-gray-300 w-full">
                    <span class="mx-2 text-gray-500">atau</span>
                    <hr class="border-t border-gray-300 w-full">
                </div>

                {{-- google --}}
                <button
                    class="flex items-center justify-center px-6 py-2 rounded-md w-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50">
                    <i class="fa-brands fa-google"></i>
                    <span class="ml-2">Daftar Menggunakan Google</span>
                </button>
                <p class="text-gray-600 text-sm mt-4">Sudah mempunyai akun? <a
                    href="/masuk"class="text-[#445FB5] hover:text-[#354a8f]">Masuk</a></p>
            </div>
        </div>
    </div>
@endsection
