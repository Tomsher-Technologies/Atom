<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslations extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id', 'lang', 'title', 'sub_title', 'description', 'heading1', 'content1', 'heading2', 'content2', 'heading3', 'content3', 'heading4', 'content4', 'heading5', 'content5', 'heading6', 'content6', 'heading7', 'content7', 'button_text_1', 'button_text_2'
    ];

    public function page_details(){
    	return $this->belongsTo(Pages::class,'page_id','id');
    }
}
