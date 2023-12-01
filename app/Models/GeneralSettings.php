<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'email',
        'phone',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'footer_content','footer_content_ar',
        'header_image', 'image_title', 'image_title_ar', 'image_title_sub', 'image_title_sub_ar', 'heading', 'heading_ar', 'heading_sub', 'heading_sub_ar'
    ];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? getActiveLanguage() : $lang;

        if ($lang !== 'en') {
            $field = $field.'_ar';
        }

        return $this->$field;
    }

}
