<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\preordersModel;
use App\Models\User;

class preordersTurnInModel extends Model
{
    use HasFactory;

    protected $table = 'preorders_turn_in';

    protected $fillable = [
        'preorders_id',
        'users_id',
        'sign',
        'video',
        'description',
        'status',
    ];

    public function preorder()
    {
        return $this->belongsTo(preordersModel::class, 'preorders_id', 'id');
    }
    

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
