<?php
namespace App\Http\Controllers;

// TAMBAHKAN DUA BARIS PENTING INI:
use App\Http\Controllers\Controller; // Untuk kelas Controller dasar
use App\Models\Mentor;               // Untuk model Mentor kita

// Baris ini sudah ada sebelumnya:
use Illuminate\Http\Request;

class MentorController extends Controller
{
    // UBAH FUNGSI INDEX ANDA MENJADI SEPERTI INI
    public function index(Request $request) // Tambahkan Request $request di sini
    {
        // Ambil kata kunci pencarian dari URL (?search=...)
        $search = $request->input('search');

        // Mulai query ke database, tapi jangan eksekusi dulu
        $query = \App\Models\Mentor::query();

        // Jika ada kata kunci pencarian yang diketik oleh pengguna
        if ($search) {
            // Tambahkan kondisi WHERE ke dalam query
            // Cari di kolom 'nama' ATAU di kolom 'bidang_keahlian'
            // 'ILIKE' adalah versi 'LIKE' yang tidak case-sensitive (huruf besar/kecil tidak masalah)
            $query->where('nama', 'ILIKE', "%{$search}%")
                  ->orWhere('bidang_keahlian', 'ILIKE', "%{$search}%");
        }

        // Sekarang, eksekusi query yang sudah difilter (atau belum jika tidak ada pencarian)
        $mentors = $query->get();

        // Kirim data mentor yang sudah difilter ke view
        return view('mentors.index', ['mentors' => $mentors]);
    }

    // ... (fungsi show() tetap sama)
}