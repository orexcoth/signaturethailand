<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactsModel extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'contact_firstname',
        'contact_lastname',
        'contact_email',
        'contact_phone',
        'contact_heading',
        'contact_message',
    ];
}
