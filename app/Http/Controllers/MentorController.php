<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Pastikan ini ada

class MentorController extends Controller
{
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

    public function create()
    {
        return view('mentors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:mentors,email',
            'bidang_keahlian' => 'nullable|string|max:255',
            'tarif_per_jam' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);
        Mentor::create($validatedData);
        return redirect()->route('mentors.index')->with('success', 'Mentor baru berhasil ditambahkan!');
    }

    public function show(Mentor $mentor)
    {
        return view('mentors.show', ['mentor' => $mentor]);
    }

    public function edit(Mentor $mentor)
    {
        return view('mentors.edit', ['mentor' => $mentor]);
    }

    public function update(Request $request, Mentor $mentor)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('mentors')->ignore($mentor->id)],
            'bidang_keahlian' => 'nullable|string|max:255',
            'tarif_per_jam' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);
        $mentor->update($validatedData);
        return redirect()->route('mentors.show', $mentor)->with('success', 'Data mentor berhasil diperbarui!');
    }
}
