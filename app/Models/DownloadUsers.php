<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'download_id', 'name', 'email', 'phone'
    ];

    public function download(){
    	return $this->belongsTo(Downloads::class,'download_id','id');
    }
}
