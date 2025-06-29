<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the user's dashboard.
     */
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Load the bookings related to this user
        // We also want to load the mentor's name for each booking
        // Kode ini sekarang akan berfungsi karena relasi sudah kita buat
        $bookings = $user->bookings()->with('mentor')->latest()->get();

        // Pass the bookings to the dashboard view
        return view('dashboard', ['bookings' => $bookings]);
    }
}
