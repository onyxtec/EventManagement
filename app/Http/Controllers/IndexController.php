<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $halls = Hall::where('status', '1')->get();
        return view('layouts.index', compact('halls'));
    }
}

