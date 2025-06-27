<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Mentor: {{ $mentor->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        
        <h1 class="text-4xl font-bold mb-2">{{ $mentor->nama }}</h1>
        <p class="text-blue-600 text-xl font-medium mb-6">{{ $mentor->bidang_keahlian }}</p>
        
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-2">Deskripsi</h3>
            <p class="text-gray-700">{{ $mentor->deskripsi }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-2">Tarif</h3>
            <p class="text-gray-700">Rp {{ number_format($mentor->tarif_per_jam, 0, ',', '.') }} / jam</p>
        </div>
        
        <div class="mt-8">
            <a href="/mentors" class="text-blue-500 hover:text-blue-700">&larr; Kembali ke Daftar Mentor</a>
        </div>

    </div>
</body>
</html>
