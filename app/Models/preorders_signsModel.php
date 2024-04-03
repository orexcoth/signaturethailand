<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preorders_signsModel extends Model
{
    use HasFactory;

    protected $table = 'preorders_signs';

    protected $fillable = [
        'users_id',
        'work',
        'finance',
        'love',
        'health',
        'fortune',
        'description',
        'sign',
        'video',
        'feature',
        'lang',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'users_id');
    // }
}
