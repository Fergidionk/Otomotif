@extends('user/components.app')
@section('content')
    <div class="container-fluid mx-auto py-28 px-4 md:px-20">
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
                <h2 class="text-3xl font-bold text-center mb-4">Daftar</h2>
                <div class="text-center text-sm text-[#4C4C4D]">Masukkan akun yang sudah di daftarkan</div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name Input -->
                    <label for="name" class="block mb-2 text-sm font-bold">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full mb-4 p-2 text-sm text-gray-700 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nama Lengkap">

                    <!-- Email Input -->
                    <label for="email" class="block mb-2 text-sm font-bold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full mb-4 p-2 text-sm text-gray-700 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="contoh@gmail.com">

                    <!-- Password Input -->
                    <label for="password" class="block mb-2 text-sm font-bold">Password</label>
                    <div class="relative flex items-center">
                        <input type="password" name="password" id="password" required
                            class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Password">
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i id="eyeIcon" class="fas fa-eye"></i>
                        </button>
                    </div>

                    <!-- Password Confirmation Input -->
                    <label for="password_confirmation" class="block mt-4 mb-2 text-sm font-bold">Konfirmasi Password</label>
                    <div class="relative flex items-center">
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Konfirmasi Password">
                        <button type="button" id="togglePasswordConfirmation"
                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i id="eyeIconConfirmation" class="fas fa-eye"></i>
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="bg-[#445FB5] hover:bg-[#354a8f] text-white font-bold py-2 px-4 rounded w-full mt-6">
                        Daftar
                    </button>
                </form>

                <div class="flex items-center justify-center">
                    <hr class="border-t border-gray-300 w-full">
                    <span class="mx-2 text-gray-500">or</span>
                    <hr class="border-t border-gray-300 w-full">
                </div>

                <!-- Alternative Login Option -->
                <button
                    class="flex items-center justify-center px-6 py-2 rounded-md w-full bg-gray-100 text-gray-700 font-medium hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50">
                    <i class="fa-brands fa-google"></i>
                    <span class="ml-2">Sign Up with Google</span>
                </button>
                <p class="text-gray-600 text-sm mt-4">
                    Sudah mempunyai akun?
                    <a href="/login" class="text-[#445FB5] hover:text-[#354a8f]">Masuk</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });

        document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
