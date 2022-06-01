<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Hall;
use App\Models\Owner;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingCancel;


class UserDashboard extends Controller
{
    public function view(){
        if(Auth::guard()->check()){
        $id =  Auth::guard()->id();
        $bookings = booking::with('time','theme','hall','user')->where('user_id',$id)->get();
        // return $bookings;
        return view('layouts.dashboard',compact('bookings'));
    }  
}
    public function cancelBooking(Request $request){
        $id = $request->id;
        $status = $request->status;
        $booking =booking::find($id);
        $themeData = Theme::where('id', $booking->theme_id)->first();
        $hallData = Hall::where('id',$themeData->hall_id)->first();
        $OwnerEmail = Owner::where('id',$hallData->owner_id)->first()->email;
        $adminEmail = "admin@gmail.com";
        if($status =='cancel')
           { 
                $booking->status = 2;
                $details = [
                    'title' => 'Mail For Booking',
                    'body' => 'I cancelled my Booking'
                ];
                $msg = "Your Request has been Submitted";
            }
            Mail::to([$OwnerEmail, $adminEmail])->send(new BookingCancel($details)); 
            $booking->save();
            return response()->json([
                'data'=>$booking,
            ]);
    }

}
