<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggestsModel extends Model
{
    use HasFactory;

    protected $table = 'suggests';

    protected $fillable = [
        'name_th',
        'name_en',
        'email',
        'phone',
        'users_id',
        'status',
        'names_id',
    ];

    public function name()
    {
        return $this->belongsTo(namesModel::class, 'names_id');
    }
}
