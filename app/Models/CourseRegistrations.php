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
   
}
