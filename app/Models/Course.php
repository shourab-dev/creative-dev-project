<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'department_id',
        'title',
        'slug',
        'detail',
        'thumbnail',
        'image',
        'iframe',
        'marketplace',
        'softwares',
        'basic',
        'carrer',
    ];


    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
