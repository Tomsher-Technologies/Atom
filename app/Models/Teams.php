<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Teams extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'designation',
        'description',
        'sort_order',
        'status',
    ];

    public function getImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }
}
