{{-- File: resources/views/partials/navbar.blade.php --}}
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        {{-- Bagian Kiri: Logo/Judul Aplikasi --}}
        <a href="/" class="text-2xl font-bold text-green-600">Tutoringit</a>

        {{-- Bagian Kanan: Tombol Navigasi --}}
        <div class="space-x-4">

            {{-- Tombol Home: Selalu Tampil --}}
            <a href="/" class="text-gray-700 hover:text-green-600 font-medium px-3 py-2 rounded-md @if(request()->is('/')) text-green-600 border-b-2 border-green-600 @endif">
                Home
            </a>

            {{-- Tombol Daftar Mentor: Tampil dengan kondisi --}}
            {{-- Jika kita sedang di halaman mentor, tombol ini akan terlihat berbeda --}}
            <a href="/mentors" class="font-semibold px-4 py-2 rounded-lg transition-colors 
                @if(request()->is('mentors*')) 
                    bg-blue-600 text-white
                @else 
                    bg-blue-500 text-white hover:bg-blue-600 
                @endif">
                Daftar Mentor
            </a>

        </div>
    </div>
</nav>