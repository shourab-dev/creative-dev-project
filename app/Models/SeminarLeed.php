<?php

namespace App\Models;

use App\Models\Seminar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeminarLeed extends Model
{
    use HasFactory;
    protected $fillable = [
        'seminar_id',
        'name',
        'phone',
        'email',
        'address',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}
