<x-app-layout>
    {{-- Mendefinisikan judul yang akan muncul di header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Informasi Mentor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- Header Kartu Form dengan Tombol Tambah Baru --}}
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Edit Informasi Mentor</h1>
                        {{-- TOMBOL BARU DITAMBAHKAN DI SINI --}}
                        <a href="{{ route('mentors.create') }}" class="bg-green-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-green-600 transition-colors text-sm shadow-sm">
                            + Tambah Baru
                        </a>
                    </div>

                    <!-- Form untuk update data -->
                    <form action="{{ route('mentors.update', $mentor) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Metode khusus untuk update --}}

                        <!-- Input Nama -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" value="{{ old('nama', $mentor->nama) }}" required>
                        </div>

                        <!-- Input Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" value="{{ old('email', $mentor->email) }}" required>
                        </div>

                        <!-- Input Bidang Keahlian -->
                        <div class="mb-4">
                            <label for="bidang_keahlian" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bidang Keahlian</label>
                            <input type="text" id="bidang_keahlian" name="bidang_keahlian" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" value="{{ old('bidang_keahlian', $mentor->bidang_keahlian) }}">
                        </div>

                        <!-- Input Tarif per Jam -->
                        <div class="mb-4">
                            <label for="tarif_per_jam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tarif per Jam (Rp)</label>
                            <input type="number" id="tarif_per_jam" name="tarif_per_jam" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" value="{{ old('tarif_per_jam', $mentor->tarif_per_jam) }}">
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Singkat</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('deskripsi', $mentor->deskripsi) }}</textarea>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('mentors.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mr-4">
                                Batal
                            </a>
                            <x-primary-button>
                                {{ __('Update Mentor') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
