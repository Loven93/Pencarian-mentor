<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
            'total_harga' => 'required|integer|min:0',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'mentor_id' => $validated['mentor_id'],
            'total_harga' => $validated['total_harga'],
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Pemesanan sesi berhasil dibuat! Silakan lanjutkan pembayaran.');
    }

    /**
     * Memproses "pembayaran" untuk sebuah booking.
     * FUNGSI BARU DITAMBAHKAN DI SINI
     */
    public function processPayment(Booking $booking)
    {
        // Keamanan: Pastikan user yang login adalah pemilik booking ini
        if (Auth::id() !== $booking->user_id) {
            abort(403); // Tampilkan error "Forbidden" jika bukan pemiliknya
        }

        // Ubah status booking menjadi 'paid'
        $booking->status = 'paid';
        $booking->save(); // Simpan perubahan ke database

        // Arahkan kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Pembayaran berhasil! Sesi Anda dengan mentor telah dikonfirmasi.');
    }
}
