<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class namesModel extends Model
{
    use HasFactory;

    protected $table = 'names';

    protected $fillable = [
        'name_th',
        'name_en',
        'price_th',
        'price_en',
    ];

    public function signs()
    {
        return $this->hasMany(SignsModel::class, 'names_id');
        // return $this->hasMany(SignsModel::class, 'names_id')->whereHas('signs', function ($query) {
        //     $query->where('lang', $this->lang);
        // });
    }
    
}
