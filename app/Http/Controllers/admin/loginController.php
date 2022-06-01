<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard')->withSuccess('You have Successfully LoggedIn');
        }
        return redirect("admin/login")->with('Ops!','You have entered invalid credentials');
    }
    

    /**
     * Write code on Method
     *
     * @return response()
    //  */
    public function logout(Request $request) {

        if(Auth::guard('admin')->check()){
            Session::flush();
            Auth::guard('admin')->user()->logout;
            return redirect()->route('admin/login');        }
        else if(Auth::guard('owner')->check()){
            Session::flush();
            Auth::guard('owner')->user()->logout;
            return redirect()->route('ownerLogin'); 
         }else if(Auth::guard()->check())
         {
            Session::flush();
            Auth::guard()->user()->logout;
            return redirect()->route('index');
         }
       
    }
}

