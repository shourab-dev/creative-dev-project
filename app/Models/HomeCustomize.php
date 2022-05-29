<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCustomize extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_stle',
        'facebook_review',
        'seminar_stle',
        'course_stle',
    ];
}
