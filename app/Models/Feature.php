<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'feature_img',
        'title',
        'details'
    ];

    public function couse()
    {
        return $this->belongsTo(Course::class);
    }
}
