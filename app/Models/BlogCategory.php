<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];


    public function posts()
    {
        return $this->belongsToMany(BlogPost::class)->latest();
    }
}
