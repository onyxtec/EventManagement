<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Hall;
use App\Models\Theme;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
   public function view(){
    $booking= booking::count();
    $confirmedBooking = booking::where('status' , 1)->count();
    $pendingBooking= booking::where('status', 0)->count();
    $totalHalls = Hall::where('status', 1)->count();
    $totalThemes = Theme::count();
       return view('dashboard', compact('booking', 'pendingBooking', 'totalHalls', 'totalThemes' ,'confirmedBooking'));
   }
}
