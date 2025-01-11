@extends('user/components.app')
@section('content')
    <div class="container-fluid mx-auto py-12 md:py-14 px-4 md:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="hidden md:block">
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
            </div>
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-md md:col-span-1 col-span-1 max-w-md mx-auto w-full">
                <h2 class="text-2xl md:text-3xl font-bold text-center mb-3">Masuk</h2>
                <div class="text-center text-sm text-[#4C4C4D] mb-6">Masukkan akun yang sudah di daftarkan</div>
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block mb-1.5 text-sm font-semibold">Email</label>
                            <input type="email" name="email" id="email" required
                                value="{{ old('email') }}"
                                class="w-full p-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                                placeholder="Masukkan Email">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block mb-1.5 text-sm font-semibold">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" required
                                    class="w-full p-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                                    placeholder="Password">
                                <button type="button" id="togglePassword"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <i id="eyeIcon" class="fas fa-eye text-gray-400"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-[#445FB5] hover:bg-[#354a8f] text-white font-semibold py-3 px-4 rounded-lg transition duration-200">
                            Masuk
                        </button>
                    </div>
                </form>

                <div class="flex items-center my-6">
                    <hr class="flex-1 border-t border-gray-300">
                    <span class="px-4 text-sm text-gray-500">atau</span>
                    <hr class="flex-1 border-t border-gray-300">
                </div>

                <button
                    class="w-full flex items-center justify-center px-6 py-3 rounded-lg bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 transition duration-200">
                    <i class="fa-brands fa-google mr-2"></i>
                    Sign Up with Google
                </button>

                <p class="text-gray-600 text-sm text-center mt-6">
                    Belum mempunyai akun? 
                    <a href="/register" class="text-[#445FB5] hover:text-[#354a8f] font-medium">Daftar</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('svg').classList.toggle('hidden');
        });
    </script>
@endsection
