<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class user extends Authenticatable
{
    use HasFactory;
    // Fillable Method
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_password', 
    ];
    public function bookings()
    {
        return $this->hasMany(bookings::class);
    }
}
