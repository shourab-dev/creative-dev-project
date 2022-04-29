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
        'detail',
        'thumbnail',
        'image',
        'iframe',
        'marketplace',
        'softwares',
        'basic',
        'carrer',
    ];
}
