<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\worksModel;
use App\Models\User;

class work_ordersModel extends Model
{
    use HasFactory;

    protected $table = 'work_orders';

    protected $fillable = [
        'number', 
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function works()
    {
        return $this->hasMany(worksModel::class, 'work_orders_id');
    }


}
