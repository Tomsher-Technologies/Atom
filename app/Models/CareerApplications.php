<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class CareerApplications extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','phone_number','description','resume'
    ];

    public function getResume()
    {
        return $this->resume ? URL::to($this->resume) : '';
    }
}
