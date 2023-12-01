<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug', 'description1', 'image1', 'description2', 'image2', 'blog_date', 'status', 'seo_title', 'og_title', 'twitter_title', 'seo_description', 'og_description', 'twitter_description', 'keywords', 'created_by', 'updated_by'
    ];
    
    public function getImage1()
    {
        return $this->image1 ? URL::to($this->image1) : asset('adminassets/img/placeholder.png');
    }

    public function getImage2()
    {
        return $this->image2 ? URL::to($this->image2) : asset('adminassets/img/placeholder.png');
    }
}
