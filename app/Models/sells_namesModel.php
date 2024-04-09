<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sells_namesModel extends Model
{
    use HasFactory;

    protected $table = 'sells_names';

    protected $fillable = [
        'names_id',
        'sells_id',
        'price',
        'signs',
        'remark',
    ];
}
