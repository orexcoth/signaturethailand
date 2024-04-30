<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sellsModel;
use App\Models\preordersModel;
use App\Models\signsModel;

class downloadsModel extends Model
{
    use HasFactory;

    protected $table = 'downloads';

    protected $fillable = [
        'signs_id',
        'sells_id',
        'preorders_id',
        'post_id',
        'tablename',
        'type',
        'customers_id',
        'commissions_id',
    ];

    public function sell()
    {
        return $this->belongsTo(sellsModel::class, 'sells_id');
    }

    public function preorder()
    {
        return $this->belongsTo(preordersModel::class, 'preorders_id', 'id');
    }
    public function sign()
    {
        return $this->belongsTo(signsModel::class, 'signs_id');
    }
}
