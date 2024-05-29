<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sellsModel;
use App\Models\preordersModel;

class customersModel extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'role',
        'username',
        'firstname',
        'lastname',
        'email',
        'phone',
        'line',
        'status',
    ];

    public function sells()
    {
        return $this->hasMany(sellsModel::class, 'customers_id', 'id');
    }
    public function preorders()
    {
        return $this->hasMany(preordersModel::class, 'customers_id', 'id');
    }
}
