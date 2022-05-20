<?php

namespace App\Models;

use App\Models\SeminarLeed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seminar extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'time'
    ];

    public function leeds()
    {

        return $this->hasMany(SeminarLeed::class);
    }
}
