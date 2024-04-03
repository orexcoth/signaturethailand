<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preordersModel extends Model
{
    use HasFactory;

    protected $table = 'preorders';

    protected $fillable = [
        'customers_id',
        'status',
        'number',
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
        'preorder_type',
        'preorder_price',
        'firstname_th',
        'lastname_th',
        'firstname_en',
        'lastname_en',
        'work',
        'finance',
        'love',
        'health',
        'fortune',
        'TargetPreorder',
        'name',
        'dob',
        'SelectStatus',
        'occupation',
        'EverSignature',
        'mysignature',
        'ProblemPreorder',
        'DeliverSignature',
        'names_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
