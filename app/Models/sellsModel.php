<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellsModel extends Model
{
    use HasFactory;

    protected $table = 'sells';

    protected $fillable = [
        'customers_id',
        'status',
        'sell_number',
        'total',
        'firstname',
        'lastname',
        'email',
        'phone',
        'line',
        'shipping_method',
        'shipping_detail',
        'payment_method',
        'payment_qr',
        'payment_status',
        'payment_date',
        'ref1',
        'ref2',
        'ref3',
    ];
}
