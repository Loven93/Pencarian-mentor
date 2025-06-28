<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mentor; // Impor model Mentor
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage).
     */
    public function index()
    {
        // Ambil 3 mentor secara acak dari database
        $featuredMentors = Mentor::inRandomOrder()->limit(3)->get();

        // Kirim data 3 mentor tersebut ke view 'welcome'
        return view('welcome', ['featuredMentors' => $featuredMentors]);
    }
}
