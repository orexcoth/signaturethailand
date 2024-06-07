<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersModel extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'status',
        'percent',
    ];

    public function signs()
    {
        return $this->hasMany(SignsModel::class, 'users_id');
    }
    public function preordersTurnIns()
    {
        return $this->hasMany(PreordersTurnInModel::class, 'users_id');
    }
}
