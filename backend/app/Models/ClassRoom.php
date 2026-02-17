<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'class_rooms';

    protected $fillable = [
        'class_name',
        'description',
        'month',
        'teacher_name',
        'time'
    ];
}
