<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckBookingController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\hallController;
use App\Http\Controllers\hallLoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\themesController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\UserLoginController;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin/login', [loginController::class, 'index'])->name('admin/login');
Route::post('post-login', [loginController::class, 'adminLogin'])->name('login.post');
Route::get('Owner/login', [hallLoginController::class, 'index'])->name('ownerLogin');
Route::post('Owner/post-login', [hallLoginController::class, 'OwnerLogin'])->name('OwnerLogin.post');
Route::get('Owner/register', [hallLoginController::class, 'register'])->name('register');
Route::post('Owner/post-register', [hallLoginController::class, 'OwnerRegister'])->name('OwnerRegister.post');

// Route::group(['middleware'=>'auth'],function(){ 
Route::get('logout', [loginController::class, 'logout'])->name('user.logout');
Route::resource('halls' , hallController::class,['names' => 'halls']);  
Route::resource('time' , TimeController::class,['names' => 'time']);  
Route::get('read', [hallController::class, 'markRead'])->name('markAsRead');
Route::get('/dashboard', [dashboardController::class,'view'])->name('dashboard');
Route::get('/',[IndexController::class,'index'])->name('index');
Route::get('approved/{id}/{status}', [hallController::class, 'HallConfirmation'])->name('approved');
Route::resource('themes' , themesController::class,['names' => 'themes']);

//Frontend
// Route::get('User/login', [UserLoginController::class, 'index'])->name('UserLogin');
// Route::post('User/post-login', [UserLoginController::class, 'UserLogin'])->name('UserLogin.post');

// Route::get('/booking/{id}', [BookingController::class,'show'])->name('booking');
// Route::post('save', [BookingController::class, 'store'])->name('store');
Route::get('user/dashboard', [UserDashboard::class, 'view'])->name('userDashboard');
Route::resource('bookings' , CheckBookingController::class,['names' => 'bookings']);  
Route::get('approval/{id}/{status}', [CheckBookingController::class, 'BookingConfirmation'])->name('approval');
Route::post('cancel', [UserDashboard::class, 'cancelBooking'])->name('cancel');


// Auth::routes();
// Route::get('/', function(){
//     return view('layouts.index');
// })->name('profile');
Route::get('/booking/{id}', [BookingController::class, 'show'], function(){
    return view('layouts.booking');
})->name('save');
Route::get('/booking/available/{check_date}/{hall_id}', [BookingController::class, 'select']);
Route::post('/save', [BookingController::class, 'store']);
Route::get('User/login', [UserLoginController::class, 'index'])->name('UserLogin');
Route::post('User/post-login', [UserLoginController::class, 'UserLogin'])->name('UserLogin.post');
Route::get('User/register', [UserLoginController::class, 'register'])->name('UserRegister');
Route::post('User/post-register', [UserLoginController::class, 'UserRegister'])->name('UserRegister.post');
