<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'address',
        'packages',
        'total',
        'slip',
        'remark',
        'status'
    ];

    protected $casts = [
        'packages' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
