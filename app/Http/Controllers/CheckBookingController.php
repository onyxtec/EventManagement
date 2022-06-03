<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Mail\BookingConfirmation;
use App\Models\Hall;
use App\Models\Owner;
use App\Models\Theme;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('owner')->check()){
            $id =  Auth::guard('owner')->id();
            $hallId = Hall::where('owner_id', $id)->pluck('id');
            if($hallId->count() > 0){
                $themesData = Theme::where('hall_id', $hallId)->get('id');
            if($themesData->count()> 0){
                $bookings = booking::where('theme_id', $themesData)->get();
                return view('checkBooking.index',compact('bookings'));
            }
        }
        else{
            $bookings = [];
            return view('checkBooking.index', compact('bookings'));
        }           
        }
        elseif($id = auth::guard('admin')){
            $bookings = booking::all();
            
            return view('checkBooking.index',compact('bookings')); 
        
        }
    }
    public function BookingConfirmation($id,$status)
    { 
        $booking =booking::find($id);
        $userEmail = User::where('id',$booking->user_id)->first()->email;

           if($status =='approve')
           { 
                $booking->status = 1;
                $details = [
                    'title' => 'Mail For booking Status',
                    'body' => 'Your Booking has been Confirmed'
                ];
                $msg = "Your Request has been Submitted";
            }
            elseif($status =='cancel')
            {
                $booking->status= 2;
                $details = [
                    'title' => 'Mail For Booking Status',
                    'body' => 'Your Request has been Declined'
                ];
                $msg = "Your Request has been Cancelled";
            } 
        Mail::to($userEmail)->send(new BookingConfirmation($details)); 
        $booking->save();
        return redirect()->back()->with('msg' , $msg);     
    }
}
