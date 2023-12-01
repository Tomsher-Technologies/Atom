<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class TrainingCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug', 'description', 'image', 'home_icon', 'sort_order', 'status', 'seo_title', 'og_title', 'twitter_title', 'seo_description', 'og_description', 'twitter_description', 'keywords', 'created_by', 'updated_by','listing_image','header_display','footer_display'
    ];

    public function getImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }

    public function getHomeIcon()
    {
        return $this->home_icon ? URL::to($this->home_icon) : asset('adminassets/img/placeholder.png');
    }

    public function courses(){
        return $this->hasMany(TrainingCourses::class,'category_id','id');
    }

    public function getListingImage()
    {
        return $this->listing_image ? URL::to($this->listing_image) : asset('adminassets/img/placeholder.png');
    }
}
