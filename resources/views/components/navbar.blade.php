<nav class="shadow-md">
    <div class="container mx-auto flex justify-between items-center px-4 sm:px-[60px] py-4">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/"><img src="images/logo.png" alt="Your Logo" class="h-12 w-15 mr-4 sm:mr-[30px]"></a>
            <!-- Navigasi Utama -->
            <ul id="menu" class="hidden sm:flex space-x-2 sm:space-x-4">
                <li><a href="/" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('/') ? 'bg-putih' : '' }}">Beranda</a></li>
                <li><a href="/tentang-kami" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('tentang-kami') ? 'bg-putih' : '' }}">Tentang Kami</a></li>
                <li><a href="/kontak" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('kontak') ? 'bg-putih' : '' }}">Kontak</a></li>
                <li><a href="/daftar-kursus" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('daftar-kursus') ? 'bg-putih' : '' }}">Daftar Kursus</a></li>
            </ul>
        </div>
        <!-- Tombol Aksi dan Hamburger -->
        <div class="flex items-center space-x-4">
            <a href="/daftar" class="hidden sm:block hover:bg-putih text-gray-800 py-2 px-4 rounded-[8px]">Daftar</a>
            <a href="/masuk" class="hidden sm:block bg-biru hover:bg-blue-600 text-white py-2 px-4 rounded-[8px]">Masuk</a>
            <a href="/profil-siswa"
                class="hidden sm:block bg-putih hover:bg-[#E1E1E3] text-white py-2 px-4 rounded-full w-10 h-10 flex items-center justify-center"><i
                    class="fa fa-user text-black"></i></a>
            <!-- Hamburger Menu untuk layar kecil -->
            <button id="menu-toggle" class="sm:hidden text-gray-800">
                <i class="fa fa-bars text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Navigasi untuk layar kecil -->
    <div id="mobile-menu" class="hidden sm:hidden bg-white shadow-md">
        <ul class="flex flex-col space-y-2 px-4 py-4">
            <li><a href="/" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('/') ? 'bg-putih' : '' }}">Beranda</a></li>
            <li><a href="/tentang-kami" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('tentang-kami') ? 'bg-putih' : '' }}">Tentang Kami</a></li>
            <li><a href="/kontak" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('kontak') ? 'bg-putih' : '' }}">Kontak</a></li>
            <li><a href="/daftar-kursus" class="px-3 py-2 rounded-md hover:bg-putih {{ request()->is('daftar-kursus') ? 'bg-putih' : '' }}">Daftar Kursus</a></li>
            <li class="flex flex-col space-y-2">
                <a href="/daftar" class="hover:bg-putih text-gray-800 py-2 px-4 rounded-[8px]">Daftar</a>
                <a href="/masuk" class="bg-biru hover:bg-blue-600 text-white py-2 px-4 rounded-[8px]">Masuk</a>
            </li>
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
