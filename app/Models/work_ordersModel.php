<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\worksModel;
use App\Models\User;
use App\Models\preordersModel;
use App\Models\namesModel;

class work_ordersModel extends Model
{
    use HasFactory;

    protected $table = 'work_orders';

    protected $fillable = [
        'number', 
        'users_id',
        'type',
        'preorders_id',
        'names_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function preorder()
    {
        return $this->belongsTo(preordersModel::class, 'preorders_id');
    }

    public function name()
    {
        return $this->belongsTo(namesModel::class, 'names_id');
    }



    public function works()
    {
        return $this->hasMany(worksModel::class, 'work_orders_id');
    }


}
