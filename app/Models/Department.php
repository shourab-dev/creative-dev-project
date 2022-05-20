<?php

namespace App\Models;

use App\Models\Seminar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name'
    ];


    public function Courses()
    {
        return $this->hasMany(Course::class);
    }
   
}
