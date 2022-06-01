<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price'
    ];
    public function halls()
    {
        return $this->belongsTo('App\Models\Hall','hall_id','id');
    }
    public function bookings()
    {
        return $this->hasMany(booking::class);
    }
}
