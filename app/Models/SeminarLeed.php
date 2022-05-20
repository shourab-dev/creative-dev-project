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
    protected $hidden = [
        'seminar_id',
        'created_at',
        'updated_at',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}
