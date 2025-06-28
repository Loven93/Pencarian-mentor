<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mentor Baru - Tutoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4">
            <a href="/" class="text-2xl font-bold text-green-600">Tutoringit</a>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Tambah Mentor Baru</h1>

            <form action="/mentors" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Alamat Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="bidang_keahlian" class="block text-gray-700 font-semibold mb-2">Bidang Keahlian</label>
                    <input type="text" id="bidang_keahlian" name="bidang_keahlian" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Pemrograman Web">
                </div>

                <div class="mb-4">
                    <label for="tarif_per_jam" class="block text-gray-700 font-semibold mb-2">Tarif per Jam (Rp)</label>
                    <input type="number" id="tarif_per_jam" name="tarif_per_jam" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: 150000">
                </div>

                <div class="mb-6">
                    <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi Singkat</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div class="text-right">
                    <a href="/mentors" class="text-gray-600 mr-4">Batal</a>
                    <button type="submit" class="bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors">Simpan Mentor</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>