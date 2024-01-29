<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sells_combosModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'sells_names_id',
        'text',
        'status',
        'signs_id',
        'description',
        'sign',
        'video',
    ];
}
