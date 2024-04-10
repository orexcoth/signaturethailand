<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sellsModel;
use App\Models\User;

class signsModel extends Model
{
    use HasFactory;

    protected $table = 'signs';

    protected $fillable = [
        'status',
        'names_id',
        'users_id',
        'work',
        'finance',
        'love',
        'health',
        'fortune',
        'description',
        'sign',
        'video',
        'feature',
        'lang',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function sell()
    {
        return $this->belongsTo(sellsModel::class, 'sells_id');
    }


}
