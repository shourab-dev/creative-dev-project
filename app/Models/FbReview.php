<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FbReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'iframe',
    ];
}
