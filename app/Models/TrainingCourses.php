<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class TrainingCourses extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name','slug', 'lang_id', 'course_type_id', 'location_id', 'banner_title', 'banner_content', 'banner_image', 'description', 'image', 'duration', 'price', 'status','sort_order'
    ];

    public function training_category(){
    	return $this->belongsTo(TrainingCategories::class,'category_id','id');
    }

    public function language(){
    	return $this->belongsTo(Languages::class,'lang_id','id');
    }

    public function course_type(){
    	return $this->belongsTo(CourseTypes::class,'course_type_id','id');
    }

    public function location(){
    	return $this->belongsTo(States::class,'location_id','id');
    }

    public function course_details(){
        return $this->hasMany(TrainingCourseDetails::class,'course_id','id');
    }

    public function getBannerImage()
    {
        return $this->banner_image ? URL::to($this->banner_image) : asset('adminassets/img/placeholder.png');
    }

    public function getCourseImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }
}
