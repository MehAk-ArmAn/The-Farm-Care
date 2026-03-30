<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'country',
        'subject',
        'message',
        'product_name',
        'is_read',
    ];
}
