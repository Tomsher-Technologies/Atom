<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebinarBookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'webinar_id', 'name', 'email', 'phone'
    ];

    public function webinar(){
    	return $this->belongsTo(Webinars::class,'webinar_id','id');
    }
}
