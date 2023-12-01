<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Webinars extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'image', 'video_link', 'webinar_date', 'presented_title', 'presented_description', 'presented_image', 'status', 'seo_title', 'og_title', 'twitter_title', 'seo_description', 'og_description', 'twitter_description', 'keywords', 'created_by', 'updated_by','location'
    ];

    public function getImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }

    public function getPresentedImage()
    {
        return $this->presented_image ? URL::to($this->presented_image) : asset('adminassets/img/placeholder.png');
    }

    public function bookings(){
        return $this->hasMany(WebinarBookings::class,'webinar_id','id');
    }
}
