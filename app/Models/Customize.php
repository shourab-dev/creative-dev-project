<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customize extends Model
{
    use HasFactory;
    protected $fillable = [
        'modal_img',
        'promo_modal',
        'preloader'
    ];
}
