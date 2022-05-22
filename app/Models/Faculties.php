<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;
    protected $fillable = [
        'auth_id',
        'img',
        'name',
        'designation',
        'speciality',
        'education',
        'marketplace',
        'status'
    ];
    public function department()
    {
        return $this->belongsToMany(Department::class);
    }
}
