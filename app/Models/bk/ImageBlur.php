<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_blur extends Model
{
    use HasFactory;

    protected $table = 'image_blur';

    protected $fillable = [
        'path',
        'blur10',
        'blur20',
        'blur40',
        'blur60',
        'blur80',
    ];
}
