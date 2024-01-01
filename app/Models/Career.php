<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'position',
        'last_date',
        'description',
        'status',
    ];

    
}
