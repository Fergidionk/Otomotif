@extends('components.app')
@section('content')
    <div class="container bg-[#F7F7F8] mx-auto px-24 py-12">
        <!-- Bagian Header Kontak -->
        <div class="flex flex-col lg:flex-row justify-between py-8 px-4 lg:px-32">
            <div class="w-full lg:w-3/5 text-center mt-4 mb-4 lg:mb-0">
                <h1 class="text-3xl font-bold">Kontak Kami</h1>
            </div>
            <div class="w-full lg:w-4/5">
                <p class="mb-4 text-center lg:text-left">
                    Butuh informasi lebih lanjut atau punya pertanyaan? Jangan ragu untuk menghubungi kami! Tim
                    kami siap membantu. Anda dengan senang hati akan mendapatkan informasi terkait kursus manajemen. Kami
                    selalu terbuka untuk konsultasi, pendaftaran, atau pertanyaan lainnya.
                </p>
            </div>
        </div>

        <!-- Bagian Kontak dan Peta -->
        <div class="flex flex-col lg:flex-row bg-white p-6 lg:p-12 rounded-xl gap-8">
            <!-- Informasi Kontak -->
            <div class="flex-1">
                <!-- Email Section -->
                <div class="border p-4 rounded-lg mb-4 flex items-center">
                    <div class="p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href="mailto:support@otomotif.com" class="ml-2 text-sm sm:text-base">support@otomotif.com</a>
                </div>
            
                <!-- Phone Section -->
                <div class="border p-4 rounded-lg mb-4 flex items-center">
                    <div class="p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fa fa-phone"></i>
                    </div>
                    <span class="ml-2 text-sm sm:text-base">+62 852 - 3328 - 7187</span>
                </div>
            
                <!-- Address Section -->
                <div class="border p-4 rounded-lg mb-4 flex items-center">
                    <div class="p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <span class="ml-2 text-sm sm:text-base">Jl. Utip Sumoharjo No.1, Baru, Kec. Wlingi, Kabupaten Blitar, Jawa Timur 61694</span>
                </div>
            
                <!-- Social Media Section -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#" target="_blank" class="flex-1 border p-4 bg-[#F7F7F8] rounded-lg text-center mb-4 sm:mb-0">
                        <i class="fab fa-facebook"></i>
                        <span class="ml-2 text-sm sm:text-base">Otomotif</span>
                    </a>
                    <a href="#" target="_blank" class="flex-1 border p-4 bg-[#F7F7F8] rounded-lg text-center mb-4 sm:mb-0">
                        <i class="fab fa-instagram"></i>
                        <span class="ml-2 text-sm sm:text-base">Otomotif</span>
                    </a>
                    <a href="#" target="_blank" class="flex-1 border p-4 bg-[#F7F7F8] rounded-lg text-center">
                        <i class="fab fa-whatsapp"></i>
                        <span class="ml-2 text-sm sm:text-base">087652168</span>
                    </a>
                </div>
            </div>
                        

            <!-- Google Maps -->
            <div class="flex-1">
                <div class="flex justify-center mb-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3427.9583195845225!2d112.31790195954278!3d-8.087956511426478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7893ebe399b43b%3A0xa470c0550743e770!2sOTOMOTIF%20Kursus%20Mengemudi!5e0!3m2!1sid!2sid!4v1731912070448!5m2!1sid!2sid"
                        width="720" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
