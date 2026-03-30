<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'company',
        'country',
        'message',
        'is_active',
        'sort_order',
    ];
}
