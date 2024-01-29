<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commissionsModel extends Model
{
    use HasFactory;

    protected $table = 'commissions';

    protected $fillable = [
        'users_id',
        'remark',
        'status',
        'total',
    ];
}
