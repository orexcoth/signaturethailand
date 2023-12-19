<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_mosaic extends Model
{
    use HasFactory;

    protected $table = 'image_mosaic';

    protected $fillable = [
        'path',
        'result',
    ];
}
