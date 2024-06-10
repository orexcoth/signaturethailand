<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\work_ordersModel;
use App\Models\User;
use App\Models\namesModel;

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

    public function workOrder()
    {
        return $this->belongsTo(work_ordersModel::class, 'work_orders_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function name()
    {
        return $this->belongsTo(namesModel::class, 'names_id');
    }
}
