<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Hall;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
   public function show($id){
   if((Auth::check())){
    $themes = Theme::where('hall_id',$id)->with('halls')->get();
       return view('layouts.booking', compact('themes'));
    // 
   }
   else{
    return redirect()->route('UserLogin');
   }   
   }
   public function select($check_date, $hall_id){
    $atime= DB::Select("SELECT * FROM times WHERE id NOT IN (SELECT time_id FROM bookings WHERE date = '$check_date' AND hall_id = '$hall_id')");
        $bookings = ['bookings' => $atime];
       return response()->json($bookings);  
   }
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'theme_name' => 'required',
        ]);
           
            $booking = new booking();
            $booking->user_id =  Auth::user()->id;
            $booking->hall_id = $request->hall_id;
            $booking->theme_id = $request->theme_name;
            $booking->time_id = $request->time_id;
            $booking->name = $request->name;
            $booking->date = $request->date;
           
            $booking->save();
            // return redirect('/profile');
    }
}
