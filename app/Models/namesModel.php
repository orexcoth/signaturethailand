<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\signsModel;
use App\Models\WorkOrder;

class namesModel extends Model
{
    use HasFactory;

    protected $table = 'names';

    protected $fillable = [
        'name_th',
        'name_en',
        'price_th',
        'price_en',
        'free',
    ];

    public function signs()
    {
        return $this->hasMany(signsModel::class, 'names_id');
    }
    public function suggests()
    {
        return $this->hasMany(suggestsModel::class, 'names_id');
    }

    public function workOrders()
    {
        return $this->hasMany(WorkOrder::class, 'names_id');
    }
    
}
