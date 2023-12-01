<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'company',
        'subject',
        'message',
    ];

    public function getImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }
}
