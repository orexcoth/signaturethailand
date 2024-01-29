<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class downloadsModel extends Model
{
    use HasFactory;

    protected $table = 'downloads';

    protected $fillable = [
        'signs_id',
        'customers_id',
        'commissions_id',
    ];
}
