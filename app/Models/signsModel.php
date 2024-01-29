<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class signsModel extends Model
{
    use HasFactory;

    protected $table = 'signs';

    protected $fillable = [
        'names_id',
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
}
