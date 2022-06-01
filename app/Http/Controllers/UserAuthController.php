<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
  public function login(){
      return view('auth.login');
  }
  public function register(){
      return view('auth.register');
  }
  public function registerUser(Request $request){
      $request->validate([
        'name'=> 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        'confirm_password' => 'required_with:password|same:password',
      ]);
      $user = new user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make(($request->password));
      $user->confirm_password = Hash::make(($request->confirm->password));
      $req = $user->save();
      if($req){
          return back()->with('success', 'You have Registered Successfully!');
      }else{
        return back()->with('fail', 'Something went Wrong!');
      }   
  }
}
