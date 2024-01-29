<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordersModel extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customers_id',
        'names_id',
        'signs_id',
        'set',
        'input1',
        'input2',
        'input3',
        'input4',
        'work',
        'finance',
        'love',
        'health',
        'fortune',
        'remark',
        'status',
        'order_number',
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
