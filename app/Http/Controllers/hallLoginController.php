<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class hallLoginController extends Controller
{
    public function index()
    {

        return view('Owner.login');
    }
    public function OwnerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('owner')->attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('You have Successfully LoggedIn');
        }
        return redirect("Owner/login")->with('Ops!', 'You have entered invalid credentials');
    }
    public function register()
    {
        return view('Owner.register');
    }
    public function OwnerRegister(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'gender' => 'required',
            'dob' => 'required|date_format:Y-m-d|after_or_equal:1920-01-01',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
        ]);
        $Owner = new Owner();
        $Owner->fullName = $request->input('fullName');
        $Owner->email = $request->input('email');
        $Owner->contact_no = $request->input('contact_no');
        $Owner->gender = $request->input('gender');
        $Owner->dob = $request->input('dob');
        $Owner->password = Hash::make($request->input('password'));
        $Owner->confirm_password = Hash::make($request->input('confirm_password'));
        $Owner->save();
        $Owner->assignRole('owner');
        $msg = "Successfully Registered";
        return redirect('Owner/login')->with('msg', $msg);
    }
    public function logout()
    {
        Auth::guard('owner')->logout();
        return redirect()->route('owner.login');
    }
}
