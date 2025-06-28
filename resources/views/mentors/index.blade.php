{{-- KODE UNTUK DAFTAR MENTOR - mentors/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Semua Mentor - Tutoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    @include('partials.navbar')
    <main class="container mx-auto px-4 py-12">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Daftar Semua Mentor</h1>
            <p class="text-gray-600 mb-4">Gunakan pencarian untuk menemukan mentor yang paling sesuai untuk Anda.</p>
            <a href="/mentors/create" class="bg-green-500 text-white font-semibold px-6 py-3 rounded-lg hover:bg-green-600 transition-colors shadow-md">
                + Tambah Mentor Baru
            </a>
        </div>

        <div class="mb-10 max-w-2xl mx-auto">
            <form action="/mentors" method="GET" class="flex shadow-lg rounded-lg">
                <input type="text" name="search" placeholder="Cari nama atau keahlian mentor..." class="w-full px-5 py-3 border-t border-l border-b border-gray-200 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                <button type="submit" class="bg-blue-500 text-white px-8 py-3 rounded-r-lg hover:bg-blue-600 font-semibold transition-colors">Cari</button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($mentors as $mentor)
                <a href="/mentors/{{ $mentor->id }}" class="block bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <h2 class="text-xl font-bold mb-2 text-gray-900">{{ $mentor->nama }}</h2>
                    <p class="text-indigo-600 font-semibold mb-4">{{ $mentor->bidang_keahlian }}</p>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($mentor->deskripsi, 100) }}</p>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10 bg-white rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Hasil Tidak Ditemukan</h3>
                    @if (request('search'))
                        <p class="mt-2">Pencarian untuk "{{ request('search') }}" tidak cocok dengan mentor manapun.</p>
                    @else
                        <p class="mt-2">Saat ini belum ada mentor yang terdaftar.</p>
                    @endif
                </div>
            @endforelse
        </div>

    </main>

    <footer class="bg-gray-800 text-white py-6 mt-16">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2025 Tutoringit</p>
        </div>
    </footer>

</body>
</html>