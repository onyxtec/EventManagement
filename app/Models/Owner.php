<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;  
use Illuminate\Contracts\Auth\MustVerifyEmail;  
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Owner extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $guard_name = 'owner';
    protected $fillable = [
        'fullName',
        'email',
        'password',
        'confirm_password',
        'contact_no',
        'gender',
        'dob',  
    ];
    public function halls()
    {
        return $this->hasMany(halls::class);
    }
}
