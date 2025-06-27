<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mentor - Tutoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-12">

        <h1 class="text-4xl font-bold text-center mb-2 text-green-600">
            Tutoring
        </h1>
        <p class="text-center text-gray-600 mb-8">Temukan mentor terbaik untuk membantu Anda belajar.</p>


        <div class="mb-10 max-w-2xl mx-auto">
            <form action="/mentors" method="GET" class="flex shadow-lg rounded-lg">
                <input type="text" name="search" placeholder="Cari nama atau keahlian mentor..." class="w-full px-5 py-3 border-t border-l border-b border-gray-200 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                <button type="submit" class="bg-blue-500 text-white px-8 py-3 rounded-r-lg hover:bg-blue-600 font-semibold transition-colors">Cari</button>
            </form>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($mentors as $mentor)
                {{-- Kita bungkus kartu dengan tag <a> agar bisa di-klik --}}
                <a href="/mentors/{{ $mentor->id }}" class="block bg-white p-6 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <h2 class="text-xl font-bold mb-2 text-gray-900">{{ $mentor->nama }}</h2>
                    <p class="text-indigo-600 font-semibold mb-4">{{ $mentor->bidang_keahlian }}</p>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $mentor->deskripsi }}</p>
                </a>
            @empty
                {{-- Pesan ini muncul jika pencarian tidak menemukan hasil --}}
                <div class="col-span-full text-center text-gray-500 py-10">
                    <h3 class="text-xl font-semibold">Hasil Tidak Ditemukan</h3>
                    <p>Pencarian untuk "{{ request('search') }}" tidak cocok dengan mentor manapun.</p>
                </div>
            @endforelse
        </div>

    </div> </body>
</html>