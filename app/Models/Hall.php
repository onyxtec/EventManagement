<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'hall_name',
        'description',
        'contact_no',
        'email',
        'city',
        'profile_image'
    ];
    public function themes()
    {
        return $this->hasMany(themes::class);
    }
    public function owners()
    {
        return $this->belongsTo('App\Models\Owner','owner_id','id');
    }
    public function bookings()
    {
        return $this->hasMany(booking::class);
    }
}
