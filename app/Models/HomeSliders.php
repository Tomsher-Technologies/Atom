<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class HomeSliders extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'image', 'sort_order', 'status', 'created_by', 'updated_by'];

    public function getImage()
    {
        return $this->image ? URL::to($this->image) : asset('adminassets/img/placeholder.png');
    }
}
