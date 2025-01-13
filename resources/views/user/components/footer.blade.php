<footer class="px-6 md:px-12 py-8 bg-gray-50">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-12 gap-y-8 items-start">
        <!-- Kolom Logo dan Kontak -->
        <div class="md:col-span-5 space-y-4 px-4">
            <div>
                <img src="images/logo.png" alt="Your Logo" class="h-14 w-auto">
            </div>
            <ul class="space-y-3 text-sm md:text-lg">
                <li><i class="fa-solid fa-envelope text-xl mr-2"></i> <a href="mailto:email@company.com"
                        class="hover:underline">email@company.com</a></li>
                <li><i class="fa-solid fa-phone text-xl mr-2"></i> <a href="tel:+1234567890"
                        class="hover:underline">+123 456 7890</a></li>
                <li><i class="fa-solid fa-location-dot text-xl mr-2"></i> Jl. Contoh No. 1, Kota</li>
            </ul>
        </div>

        <!-- Kolom Beranda -->
        <div class="md:col-span-2 px-4">
            <h3 class="text-base md:text-lg font-bold">Beranda</h3>
            <ul class="mt-4 space-y-2 text-sm md:text-base">
                <li>
                    <a href="{{ url('/#fasilitas') }}" 
                       class="text-[#59595A] hover:underline">
                        Fasilitas
                    </a>
                </li>
                <li>
                    <a href="{{ url('/#testimoni') }}" 
                       class="text-[#59595A] hover:underline">
                        Testimoni
                    </a>
                </li>
                <li>
                    <a href="{{ url('/#paket-kursus') }}" 
                       class="text-[#59595A] hover:underline">
                        Harga Paket
                    </a>
                </li>
                <li>
                    <a href="{{ url('/kontak') }}" 
                       class="text-[#59595A] hover:underline">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>

        <!-- Kolom Tentang Kami -->
        <div class="md:col-span-2 px-4 hidden">
            <h3 class="text-base md:text-lg font-bold">Tentang Kami</h3>
            <ul class="mt-4 space-y-2 text-sm md:text-base">
                <li><a href="#" class="text-[#59595A] hover:underline">Company</a></li>
                <li><a href="#" class="text-[#59595A] hover:underline">Achievements</a></li>
                <li><a href="#" class="text-[#59595A] hover:underline">Our Goals</a></li>
            </ul>
        </div>

        <!-- Kolom Sosial -->
        <div class="md:col-span-3 px-4 ">
            <h3 class="text-base md:text-lg font-bold text-center">Sosial</h3>
            <ul class="mt-4 flex justify-start md:justify-center space-x-4">
                <li>
                    <a href="#"
                        class="flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-[#F7F7F8] border border-[#F1F1F3] rounded-md hover:bg-gray-200">
                        <i class="fa-brands fa-facebook text-xl"></i>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-[#F7F7F8] border border-[#F1F1F3] rounded-md hover:bg-gray-200">
                        <i class="fa-brands fa-instagram text-xl"></i>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center justify-center w-10 h-10 md:w-12 md:h-12 bg-[#F7F7F8] border border-[#F1F1F3] rounded-md hover:bg-gray-200">
                        <i class="fa-brands fa-twitter text-xl"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <hr class="my-8 border-t border-gray-200">
    <div class="text-center text-sm text-gray-500">
        &copy; 2024 Otomotif Kursus Mengemudi Wlingi. All rights reserved.
    </div>
</footer>
