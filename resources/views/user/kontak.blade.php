@extends('user/components.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between py-8 px-4 md:px-32">
            <div class="w-full md:w-3/5 text-center">
                <h1 class="text-3xl font-bold">Kontak Kami</h1>
            </div>
            <div class="w-full md:w-4/5 text-center">
                <p class="mb-4">Butuh informasi lebih lanjut atau punya pertanyaan?...</p>
            </div>
        </div>
        <div class="mx-4 md:mx-12 flex flex-col md:flex-row bg-white flex-row justify-between p-6 md:p-12 rounded-xl mb-12">
            <div class="w-full md:w-1/2 p-4">     
                <div class="border p-4 rounded-lg mb-2 flex items-center justify-center">
                    <div class="p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <span class="ml-2">otomotif@gmail.com</span>
                </div>
                <div class="border p-4 rounded-lg mb-2 flex items-center justify-center">
                    <div class="p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fa fa-phone"></i>
                    </div>
                    <span class="ml-2">+62 852 - 3328 - 7187</span>
                </div>
                <div class="border p-4 rounded-lg mb-2 flex items-center justify-center">
                    <div class="p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <span class="ml-2">Jl. Utip Sumoharjo No.1, Baru, Kec. Wlingi...</span>
                </div>
                <div class="border p-4 rounded-lg mb-2 flex items-center justify-center">
                    <a href="#" target="_blank" class="mr-2 p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" target="_blank" class="mr-2 p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" target="_blank" class="p-4 bg-[#F7F7F8] border border-[#F1F1F3] rounded-lg flex items-center justify-center">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2 p-4">
                <div class="flex justify-center mb-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3015.418150567943!2d112.31958669199025!3d-8.08586940061316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7893ebe399b43b%3A0xa470c0550743e770!2sOTOMOTIF%20Kursus%20Mengemudi!5e0!3m2!1sid!2sid!4v1736093428507!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
