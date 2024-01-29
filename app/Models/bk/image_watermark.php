<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_watermark extends Model
{
    use HasFactory;

    protected $table = 'image_watermark';

    protected $fillable = [
        'path',
        'watermark',
        'result',
    ];
}
