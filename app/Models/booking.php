<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'timeSlots'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function hall()
    {
        return $this->belongsTo('App\Models\Hall','hall_id','id');
    }
    public function theme()
    {
        return $this->belongsTo('App\Models\Theme','theme_id','id');
    }
    public function time()
    {
        return $this->belongsTo('App\Models\Time','time_id','id');
    }

}
