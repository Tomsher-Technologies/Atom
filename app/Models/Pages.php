<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class Pages extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name', 'page_title', 'title', 'sub_title', 'description', 'courses', 'heading1', 'content1', 'heading2', 'content2', 'heading3', 'content3', 'heading4', 'content4', 'heading5', 'content5', 'heading6', 'content6', 'heading7', 'content7', 'heading8', 'content8', 'heading9', 'content9', 'heading10', 'content10', 'heading11', 'content11', 'video_link', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10', 'btn_text1', 'btn_text2', 'button_link_1', 'button_link_2'
    ];


    public function seo()
    {
        return $this->hasMany(PageSeos::class,'page_id','id');
    }

    public function getImage1()
    {
        return $this->image1 ? URL::to($this->image1) : asset('adminassets/img/placeholder.png');
    }

    public function getImage2()
    {
        return $this->image2 ? URL::to($this->image2) : asset('adminassets/img/placeholder.png');
    }

    public function getImage3()
    {
        return $this->image3 ? URL::to($this->image3) : asset('adminassets/img/placeholder.png');
    }

    public function getImage4()
    {
        return $this->image4 ? URL::to($this->image4) : asset('adminassets/img/placeholder.png');
    }

    public function getImage5()
    {
        return $this->image5 ? URL::to($this->image5) : asset('adminassets/img/placeholder.png');
    }

    public function getImage6()
    {
        return $this->image6 ? URL::to($this->image6) : asset('adminassets/img/placeholder.png');
    }
    public function getImage7()
    {
        return $this->image7 ? URL::to($this->image7) : asset('adminassets/img/placeholder.png');
    }
    public function getImage8()
    {
        return $this->image8 ? URL::to($this->image8) : asset('adminassets/img/placeholder.png');
    }
    public function getImage9()
    {
        return $this->image9 ? URL::to($this->image9) : asset('adminassets/img/placeholder.png');
    }
    public function getImage10()
    {
        return $this->image10 ? URL::to($this->image10) : asset('adminassets/img/placeholder.png');
    }

}
