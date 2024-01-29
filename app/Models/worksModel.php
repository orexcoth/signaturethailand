<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class worksModel extends Model
{
    use HasFactory;

    protected $table = 'works';

    protected $fillable = [
        'users_id',
        'make',
        'status',
        'type',
        'description',
        'names_id',
        'sells_id',
        'suggests_id',
        'orders_id',
        'commissions_id',
    ];
}
