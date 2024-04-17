<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\signsModel;
use App\Models\customersModel;

class sellsModel extends Model
{
    use HasFactory;

    protected $table = 'sells';

    protected $fillable = [
        'customers_id',
        'status',
        'number',
        'names_id',
        'name_th',
        'name_en',
        'signs',
        'type',
        'package',
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


    public function signs()
    {
        return $this->hasMany(signsModel::class, 'sells_id');
    }
    public function customers()
    {
        return $this->belongsTo(customersModel::class, 'customers_id', 'id');
    }


}
