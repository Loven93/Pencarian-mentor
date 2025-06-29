<x-app-layout>
    {{-- Bagian Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Mentor: {{ $mentor->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">

                    {{-- Konten Detail Mentor --}}
                    <div class="text-center">
                        <h1 class="text-4xl font-bold mb-2">{{ $mentor->nama }}</h1>
                        <p class="text-blue-600 dark:text-blue-400 text-xl font-medium mb-8">{{ $mentor->bidang_keahlian }}</p>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</dt>
                                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $mentor->deskripsi }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $mentor->email }}</dd>
                            </div>
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tarif</dt>
                                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">Rp {{ number_format($mentor->tarif_per_jam, 0, ',', '.') }} / jam</dd>
                            </div>
                        </dl>
                    </div>

                    {{-- ================================================ --}}
                    {{--               TOMBOL PESAN SESI DI SINI          --}}
                    {{-- ================================================ --}}
                    <div class="mt-8">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
                            <input type="hidden" name="total_harga" value="{{ $mentor->tarif_per_jam }}">
                            <button type="submit" class="w-full bg-green-600 text-white font-bold text-lg px-8 py-4 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors shadow-lg">
                                Pesan Sesi (Rp {{ number_format($mentor->tarif_per_jam, 0, ',', '.') }})
                            </button>
                        </form>
                    </div>
                    
                    {{-- Tombol Aksi Bawaan --}}
                    <div class="mt-6 flex items-center justify-between border-t border-gray-200 dark:border-gray-700 pt-6">
                        <a href="{{ route('mentors.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">&larr; Kembali ke Daftar</a>
                        
                        <a href="{{ route('mentors.edit', $mentor) }}" class="bg-yellow-500 text-white font-semibold px-5 py-2 rounded-lg hover:bg-yellow-600 transition-colors text-sm">
                            Edit Mentor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
