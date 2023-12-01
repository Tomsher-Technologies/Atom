<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Address extends Model
{
    use HasFactory;

    protected $table="address";

    protected $fillable = [
        'place_name', 'ar_place_name', 'company_name', 'ar_company_name', 'address', 'ar_address', 'email', 'phone'
    ];

    public function getTranslation($field = '', $lang = false)
    {
        $lang = $lang == false ? getActiveLanguage() : $lang;

        if ($lang !== 'en') {
            $field = 'ar_' . $field;
        }

        return $this->$field;
    }

    public function getImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }
}
