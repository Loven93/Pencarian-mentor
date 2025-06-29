{{-- File ini akan menggunakan layout induk dari Breeze --}}
<x-app-layout>
    {{-- Mendefinisikan judul yang akan muncul di tab browser --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mentor Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 class="text-2xl font-bold mb-6">Informasi Mentor Baru</h1>

                    {{-- Form akan mengirim data ke route 'mentors.store' dengan metode POST --}}
                    <form action="{{ route('mentors.store') }}" method="POST">
                        {{-- @csrf adalah token keamanan WAJIB dari Laravel --}}
                        @csrf

                        <!-- Input Nama -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Input Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Input Bidang Keahlian -->
                        <div class="mb-4">
                            <label for="bidang_keahlian" class="block text-sm font-medium text-gray-700">Bidang Keahlian</label>
                            <input type="text" id="bidang_keahlian" name="bidang_keahlian" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: Pemrograman Web">
                        </div>

                        <!-- Input Tarif per Jam -->
                        <div class="mb-4">
                            <label for="tarif_per_jam" class="block text-sm font-medium text-gray-700">Tarif per Jam (Rp)</label>
                            <input type="number" id="tarif_per_jam" name="tarif_per_jam" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: 150000">
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('mentors.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Batal
                            </a>

                            <x-primary-button>
                                {{ __('Simpan Mentor') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
