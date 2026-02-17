<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'class_id');
    }
}
