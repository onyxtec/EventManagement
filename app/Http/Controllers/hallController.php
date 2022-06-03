<?php

namespace App\Http\Controllers;
use App\Mail\HallConfirmation;
use App\Mail\Subscribe;
use App\Models\Admin;
use Illuminate\Mail\Mailable;
use App\Models\Hall;
use App\Notifications\HallAddedNotification;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;


class hallController extends Controller
{
    public function index()
    {
        if(Auth::guard('owner')->check()){
            $id =  Auth::guard('owner')->id();
            $halls = Hall::where('owner_id', $id)->with('owners')->get();
            return view('halls.index', [
                'halls' =>$halls,
            ]); 
        }
        elseif($id = auth::guard('admin')->id()){
            $halls = Hall::all();
            return view('halls.index', compact('halls'));

        }
    }
    public function create()
    {
        return view('halls.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
            'hall_name' => ' required',
            'description' => ' required',
            'contact_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'city' => ' required',
            'profile_image' => 'required|mimes:jpeg,jpg,png | max:1000',
            ]);
        $halls = new Hall();
       $admins = Admin::all();
        $halls->owner_id = Auth::guard('owner')->id();
        $halls->hall_name = $request->input('hall_name');
        $halls->description = $request->input('description');
        $halls->contact_no = $request->input('contact_no');
        $halls->email = $request->input('email');
        $halls->city = $request->input('city');
        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = time().'.'.$imageExtension;
            $image->move(storage_path().'/app/public/images/', $imageName);
            $halls->profile_image = $imageName;
        }
           $halls->save();
           Notification::send($admins, new HallAddedNotification($request->hall_name));
            $msg = "Hall Added, Please Add your Hall Theme";
            return redirect('themes/create')->with('msg', $msg);

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $hall = Hall::find($id);
        return view('halls.edit', compact('hall'));
    }
    public function update(Request $request, $id)
    {
        $hall = Hall::find($id);
        if($request->hasFile('profile_image'))
             {
               $oldImage = $hall->profile_image;
               $oldImageWithPath = '/public/images/'.$oldImage;
               if(Storage::exists($oldImageWithPath))
               {
                 Storage::delete($oldImageWithPath);
               }
               $image = $request->file('profile_image');
               $imageExtension = $image->getClientOriginalExtension();
               $imageName = time().'.'.$imageExtension;
               $image->move(storage_path().'/app/public/images/', $imageName);
               $hall->profile_image = $imageName;
             }
         $hallData = [
             "hall_name"=>$request->hall_name,
             "description"=>$request->description,
             "email"=>$request->email,
             "contact_no"=>$request->contact_no,
             "city"=>$request->city,
             "profile_image" => $imageName
         ];
         $hall->update($hallData);
         $msg = "Hall Updated successful! ";
         return redirect()->route('halls.index')->with('msg', $msg);
     }
    public function destroy($id)
    {
        Hall::destroy($id);
        $msg = "Hall Deleted successful! ";
        return redirect('halls')->with('msg', $msg);
    }
    public function HallConfirmation($id,$status)
    { 
        $hall=Hall::find($id);
        $ownerEmail = Owner::where('id',$hall->owner_id)->first()->email;

           if($status =='approve')
           { 
                $hall->status = 1;
                $details = [
                    'title' => 'Mail For HallApproval',
                    'body' => 'Hall Registered Successfully'
                ];
                $msg = "Your Request has been Confirmed";
            }
            elseif($status =='cancel')
            {
                $hall->status= 2;
                $details = [
                    'title' => 'Mail For Confirmation',
                    'body' => 'Your Request has been Declined'
                ];
                $msg = "Your Request has been Cancelled";
            }
        Mail::to($ownerEmail)->send(new HallConfirmation($details));  
        $hall->save();
        return redirect()->back()->with('msg' , $msg);     
    }
    public function markRead(){
        Auth::guard('admin')->user()->notifications->markAsRead();
        return redirect()->back();
    }
 }

