<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'class_id',
        'link',
        'tute',
        'notice',
        'lesson_type'
    ];

  public function classRoom()
{
    return $this->belongsTo(ClassRoom::class, 'class_id');
}

}
