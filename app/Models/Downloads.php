<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Downloads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image', 'file', 'sort_order', 'status'
    ];

    public function getFile()
    {
        return $this->file ? URL::to($this->file) : '';
    }
}
