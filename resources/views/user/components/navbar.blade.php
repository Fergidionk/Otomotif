<nav class="shadow-md">
    <div class="container mx-auto flex justify-between items-center px-4 py-4">
        <!-- Logo Section -->
        <div class="flex items-center">
            <a href="/"><img src="images/logo.png" alt="Your Logo" class="h-12 w-auto mr-6"></a>
            <ul class="hidden md:flex space-x-4">
                <li>
                    <a href="/"
                        class="px-3 py-2 rounded-md hover:bg-[#F1F1F3] {{ request()->is('/') ? 'bg-[#F1F1F3]' : '' }}">Beranda</a>
                </li>
                <li>
                    <a href="/tentang-kami"
                        class="px-3 py-2 rounded-md hover:bg-[#F1F1F3] {{ request()->is('tentang-kami') ? 'bg-[#F1F1F3]' : '' }}">Tentang
                        Kami</a>
                </li>
                <li>
                    <a href="/kontak"
                        class="px-3 py-2 rounded-md hover:bg-[#F1F1F3] {{ request()->is('kontak') ? 'bg-[#F1F1F3]' : '' }}">Kontak</a>
                </li>
                <li>
                    <a href="/daftar-kursus"
                        class="px-3 py-2 rounded-md hover:bg-[#F1F1F3] {{ request()->is('daftar-kursus') ? 'bg-[#F1F1F3]' : '' }}">Daftar
                        Kursus</a>
                </li>
            </ul>
        </div>
        <!-- Right Section -->
        <div class="flex items-center space-x-4">
            <!-- Desktop Buttons -->
            <div class="hidden md:flex space-x-4">
                @if (Auth::check())
                    <a href="/profil-siswa" class="bg-[#F1F1F3] hover:bg-[#E1E1E3] text-black py-2 px-4 rounded-full w-10 h-10 flex items-center justify-center">
                        <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:bg-[#F1F1F3] text-gray-800 py-2 px-4 rounded-md">Logout</button>
                    </form>
                @else
                    <a href="{{ route('register') }}" class="hover:bg-[#F1F1F3] text-gray-800 py-2 px-4 rounded-md">Register</a>
                    <a href="{{ route('login') }}" class="bg-[#445FB5] hover:bg-[#364b8f] text-white py-2 px-4 rounded-md">Login</a>
                @endif
            </div>
            <!-- Mobile Hamburger -->
            <button id="menu-toggle" class="block md:hidden text-gray-800">
                <i class="fa fa-bars text-xl"></i>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white">
        <ul class="space-y-2 p-4">
            <li><a href="/" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Beranda</a></li>
            <li><a href="/tentang-kami" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Tentang Kami</a></li>
            <li><a href="/kontak" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Kontak</a></li>
            <li><a href="/daftar-kursus" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Daftar Kursus</a></li>
            @if (Auth::check())
                <li>
                    <a href="/profil-siswa" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Profil</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="/register" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Register</a></li>
                <li><a href="/login" class="block px-3 py-2 rounded-md hover:bg-[#F1F1F3]">Login</a></li>
            @endif
        </ul>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
