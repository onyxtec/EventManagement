<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
 use Illuminate\Contracts\Auth\MustVerifyEmail;   
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable 
{
    use HasFactory;
    use Notifiable;
    use HasRoles;
        protected $guard_name = 'admin';
    // Fillable Method
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_password',
        'status' 
    ];
}
