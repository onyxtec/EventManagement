<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Hall;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class dashboardController extends Controller
{
   public function view(){
      if(Auth::guard('admin')->check()){
    $booking= booking::count();
    $confirmedBooking = booking::where('status' , 1)->count();
    $pendingBooking= booking::where('status', 0)->count();
    $totalHalls = Hall::where('status', 1)->count();
    $totalThemes = Theme::count();
       return view('dashboard', compact('booking', 'pendingBooking', 'totalHalls', 'totalThemes' ,'confirmedBooking'));
   }
   if(Auth::guard('owner')->check()){
      $id = Auth::guard('owner')->id();
      $hallId = Hall::where('owner_id', $id)->pluck('id');
      if($hallId->count() > 0){
         $booking= booking::where('hall_id', $hallId)->count();
         $confirmedBooking = booking::Where('status', 1)->Where('hall_id', $hallId)->count();
         $pendingBooking= booking::where('status', 0)->Where('hall_id', $hallId)->count();
         $totalHalls = Hall::where('owner_id', $id)->count();
         $totalThemes = Theme::count();
            return view('dashboard', compact('booking', 'pendingBooking', 'totalHalls', 'totalThemes' ,'confirmedBooking'));
      }
      else{
         $booking= '0';
         $confirmedBooking = '0';
         $pendingBooking= '0';
         $totalHalls = '0';
         $totalThemes = '0';
         return view('dashboard', compact('booking', 'pendingBooking', 'totalHalls', 'totalThemes' ,'confirmedBooking'));
      }
  
     }
 }
}
