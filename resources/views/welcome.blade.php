{{-- File: resources/views/welcome.blade.php --}}

{{-- Kode ini memberitahu Laravel untuk menggunakan template induk dari Breeze --}}
<x-app-layout>

    {{-- Mulai dari sini adalah konten unik halaman homepage --}}

    <header class="bg-gray-50">
        <div class="container mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Satu Platform Untuk Pengembangan Diri Kamu</h1>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Dapatkan koneksi inspirasional, tingkatkan keahlian, dan capai potensimu bersama mentor-mentor terbaik di bidangnya.</p>
            <a href="/mentors" class="bg-green-500 text-white font-bold text-lg px-8 py-4 rounded-lg hover:bg-green-600 transition-colors">
                Cari Mentor Impianmu
            </a>
        </div>
    </header>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Mentor Pilihan Untukmu</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if(!empty($featuredMentors))
                    @foreach ($featuredMentors as $mentor)
                        <a href="/mentors/{{ $mentor->id }}" class="block border border-gray-200 p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $mentor->nama }}</h3>
                            <p class="text-indigo-600 font-semibold mb-3">{{ $mentor->bidang_keahlian }}</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($mentor->deskripsi, 100) }}</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Apa Kata Mereka?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                    <p class="text-gray-600 mb-4">"Belajar jadi jauh lebih terarah setelah dibimbing oleh mentor dari sini. Materinya relevan dengan industri saat ini. Sangat direkomendasikan!"</p>
                    <p class="font-bold">- Citra Dewi</p>
                    <p class="text-sm text-gray-500">Mahasiswa Desain Komunikasi Visual</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                    <p class="text-gray-600 mb-4">"Fitur pencariannya sangat membantu saya menemukan mentor yang paling pas dengan kebutuhan saya di bidang Data Science. Platform yang luar biasa!"</p>
                    <p class="font-bold">- Budi Santoso</p>
                    <p class="text-sm text-gray-500">Fresh Graduate, Bidang IT</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Akhir dari konten unik halaman homepage --}}

</x-app-layout>