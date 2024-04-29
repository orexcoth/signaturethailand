<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\customersModel;
use App\Models\preordersTurnInModel;
use App\Models\downloadsModel;

class preordersModel extends Model
{
    use HasFactory;

    protected $table = 'preorders';

    protected $fillable = [
        'customers_id',
        'status',
        'number',
        'total',
        'preorder_price',
        'total_price',
        'shipping_price',
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
        'package',
        'preorder_type',
        'firstname_th',
        'lastname_th',
        'firstname_en',
        'lastname_en',
        'prominence_1',
        'prominence_2',
        'prominence_3',
        'prominence_4',
        'prominence_5',
        'TargetPreorder',
        'name',
        'dob',
        'telephone',
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
        return $this->belongsTo(customersModel::class, 'customers_id');
    }
    public function turnIns()
    {
        return $this->hasMany(PreordersTurnInModel::class, 'preorders_id', 'id');
    }
    public function downloads() {
        return $this->hasMany(downloadsModel::class);
    }
}
