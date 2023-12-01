<?php

namespace App\Models;

use App\Models\Common\Seo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Wildside\Userstamps\Userstamps;


class Services extends Model
{
    use HasFactory, Userstamps;

    protected $fillable = [
        'name', 'slug', 'banner_content', 'banner_image', 'title', 'description', 'image1', 'heading1', 'content1', 'image2', 'heading2', 'content2', 'status', 'sort_order', 'seo_title', 'og_title', 'twitter_title', 'seo_description', 'og_description', 'twitter_description', 'keywords','listing_image','header_display','footer_display'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function getBannerImage()
    {
        return $this->banner_image ? URL::to($this->banner_image) : asset('adminassets/img/placeholder.png');
    }

    public function getListingImage()
    {
        return $this->listing_image ? URL::to($this->listing_image) : asset('adminassets/img/placeholder.png');
    }

    public function getImage1()
    {
        return $this->image1 ? URL::to($this->image1) : asset('adminassets/img/placeholder.png');
    }

    public function getImage2()
    {
        return $this->image2 ? URL::to($this->image2) : asset('adminassets/img/placeholder.png');
    }

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? getActiveLanguage() : $lang;

        if ($lang !== 'en') {
            $field = 'ar_' . $field;
        }

        return $this->$field;
    }

    public function getDate()
    {
        $date = Carbon::parse($this->created_at)->locale(getActiveLanguage());
        return $date->translatedFormat('d M y');
    }

}
