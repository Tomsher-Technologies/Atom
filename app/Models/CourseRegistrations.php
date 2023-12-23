<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistrations extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'parent_id', 'name', 'email', 'phone', 'type', 'price', 'status'
    ];

    public function course(){
    	return $this->belongsTo(TrainingCourses::class,'course_id','id');
    }

    public function parent() {
        return $this->belongsToOne(static::class, 'parent_id');
    }
    
      //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('id', 'asc');
    }
   
}
