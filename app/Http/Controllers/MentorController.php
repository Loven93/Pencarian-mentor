<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Menampilkan daftar semua mentor, dengan fitur pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Mentor::query();

        if ($search) {
            $query->where('nama', 'ILIKE', "%{$search}%")
                  ->orWhere('bidang_keahlian', 'ILIKE', "%{$search}%");
        }

        $mentors = $query->get();
        return view('mentors.index', ['mentors' => $mentors]);
    }

    /**
     * Menampilkan form untuk membuat mentor baru.
     */
    public function create()
    {
        return view('mentors.create');
    }

    /**
     * Menyimpan mentor baru ke database.
     * INI ADALAH SATU-SATUNYA FUNGSI store YANG SEHARUSNYA ADA
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mentors,email',
            'bidang_keahlian' => 'nullable|string|max:255',
            'tarif_per_jam' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        // 2. Jika validasi berhasil, buat record baru di database
        Mentor::create($validatedData);

        // 3. Redirect pengguna kembali ke halaman daftar mentor dengan pesan sukses
        return redirect('/mentors')->with('success', 'Mentor baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail dari satu mentor.
     */
    public function show(Mentor $mentor)
    {
        return view('mentors.show', ['mentor' => $mentor]);
    }
}