<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSeos extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id', 'seo_title', 'og_title', 'twitter_title', 'seo_description', 'og_description', 'twitter_description', 'keywords'
    ];

    public function page_details(){
    	return $this->belongsTo(Pages::class,'page_id','id');
    }
}
