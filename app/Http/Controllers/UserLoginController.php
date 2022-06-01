<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('layouts.login');
    }
    public function UserLogin(Request $request)
    {   
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard()->attempt($credentials)) {
            return response()->json([
                'data'=>$credentials,
            ]);
        }
        return redirect("User/login")->with('Ops!', 'You have entered invalid credentials');
    }
    public function register()
    {
        return view('layouts.register');
    }
    public function UserRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required_with:password|same:password',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->confirm_password = Hash::make($request->input('confirm_password'));
        $user->save();
        return response()->json([
            'data'=>$user,
        ]);
        // return redirect('User/login')->withSuccess('You have Successfully Registered');
        // $msg = "Successfully Registered";
        // return redirect()->with('msg', $msg);
    }
}
