@extends('user/components.app')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <div id="materi-content">
            <!-- Konten akan diisi dengan JavaScript berdasarkan parameter -->
        </div>
    </div>

    <script>
        // Ambil parameter dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const materi = urlParams.get('materi');

        // Konten materi berdasarkan judul
        const materiData = {
            'Dasar-Dasar-Mengemudi': `
                <h2 class="text-2xl font-semibold">Dasar-Dasar Mengemudi</h2>
                <p>Pelajari dasar-dasar mengemudi, termasuk peraturan lalu lintas dan keselamatan di jalan. Materi ini akan membahas tentang pentingnya mengikuti peraturan lalu lintas, cara mengemudi yang aman, serta tips untuk menghadapi situasi yang tidak terduga di jalan. Dasar-dasar mengemudi ini sangat penting untuk dipahami sebelum Anda mulai mengemudi. Dengan memahami dasar-dasar ini, Anda akan lebih percaya diri dan siap untuk menghadapi berbagai situasi di jalan. Dasar-dasar mengemudi ini juga akan membantu Anda untuk memahami cara mengemudi yang benar dan aman, sehingga Anda dapat mengurangi risiko kecelakaan dan menjaga keselamatan diri sendiri dan orang lain di jalan. Sebagai tambahan, materi ini juga akan membahas tentang pentingnya mematuhi peraturan lalu lintas, seperti batas kecepatan, rambu-rambu, dan tanda-tanda lalu lintas lainnya. Dengan demikian, Anda akan lebih siap untuk menghadapi berbagai situasi di jalan dan mengemudi dengan lebih aman.</p>
            `,
            'Teknik-Mengemudi-Lanjutan': `
                <h2 class="text-2xl font-semibold">Teknik Mengemudi Lanjutan</h2>
                <p>Pelajari teknik mengemudi lanjutan, termasuk mengemudi di berbagai kondisi jalan dan situasi. Materi ini akan membahas tentang cara mengemudi di jalan yang berliku, mengemudi di malam hari, serta mengemudi dalam kondisi cuaca yang tidak stabil. Setelah Anda memahami dasar-dasar mengemudi, materi ini akan membantu Anda untuk meningkatkan keterampilan mengemudi Anda dalam berbagai situasi yang lebih kompleks. Dengan demikian, Anda akan lebih siap untuk menghadapi berbagai tantangan di jalan. Materi ini juga akan membahas tentang cara mengemudi di jalan yang berliku, termasuk cara mengatur kecepatan, menggunakan rem, dan mengatur posisi kendaraan di jalan. Selain itu, materi ini juga akan membahas tentang cara mengemudi di malam hari, termasuk cara menggunakan lampu, mengatur kecepatan, dan menghadapi situasi yang tidak terduga. Di samping itu, materi ini juga akan membahas tentang cara mengemudi dalam kondisi cuaca yang tidak stabil, seperti hujan, kabut, atau salju. Dengan demikian, Anda akan lebih siap untuk menghadapi berbagai situasi yang tidak terduga di jalan.</p>
            `,
            'Praktek-Dasar-Mengemudi': `
                <h2 class="text-2xl font-semibold">Praktek Dasar Mengemudi</h2>
                <p>Latihan praktek dasar mengemudi, termasuk teknik memegang kemudi dan mengoperasikan pedal. Materi ini akan membantu Anda untuk lebih percaya diri dalam mengemudi dan meningkatkan keterampilan Anda dalam menghadapi berbagai situasi di jalan. Praktek dasar mengemudi ini sangat penting untuk meningkatkan keterampilan Anda dalam mengemudi. Dengan melakukan praktek secara teratur, Anda akan lebih percaya diri dan siap untuk menghadapi berbagai situasi di jalan. Praktek dasar mengemudi ini juga akan membantu Anda untuk memahami cara mengemudi yang benar dan aman, sehingga Anda dapat mengurangi risiko kecelakaan dan menjaga keselamatan diri sendiri dan orang lain di jalan. Sebagai tambahan, materi ini juga akan membahas tentang pentingnya mematuhi peraturan lalu lintas, seperti batas kecepatan, rambu-rambu, dan tanda-tanda lalu lintas lainnya. Dengan demikian, Anda akan lebih siap untuk menghadapi berbagai situasi di jalan dan mengemudi dengan lebih aman.</p>
            `,
            'Praktek-Teknik-Mengemudi-Lanjutan': `
                <h2 class="text-2xl font-semibold">Praktek Teknik Mengemudi Lanjutan</h2>
                <p>Latihan praktek teknik mengemudi lanjutan, termasuk manuver di jalan raya dan parkir. Materi ini akan membantu Anda untuk meningkatkan keterampilan mengemudi Anda dalam berbagai situasi yang lebih kompleks. Praktek teknik mengemudi lanjutan ini akan membantu Anda untuk meningkatkan keterampilan mengemudi Anda dalam berbagai situasi yang lebih kompleks. Dengan demikian, Anda akan lebih siap untuk menghadapi berbagai tantangan di jalan. Materi ini juga akan membahas tentang cara mengemudi di jalan yang berliku, termasuk cara mengatur kecepatan, menggunakan rem, dan mengatur posisi kendaraan di jalan. Selain itu, materi ini juga akan membahas tentang cara mengemudi di malam hari, termasuk cara menggunakan lampu, mengatur kecepatan, dan menghadapi situasi yang tidak terduga. Di samping itu, materi ini juga akan membahas tentang cara mengemudi dalam kondisi cuaca yang tidak stabil, seperti hujan, kabut, atau salju. Dengan demikian, Anda akan lebih siap untuk menghadapi berbagai situasi yang tidak terduga di jalan.</p>
            `,
        };

        // Tampilkan konten sesuai materi
        document.getElementById('materi-content').innerHTML = materiData[materi] || '<p>Materi tidak ditemukan.</p>';
    </script>
@endsection