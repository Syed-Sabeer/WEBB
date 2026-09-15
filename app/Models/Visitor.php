<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'country',
        'state',
        'city',
        'postal_code',
        'area',
        'visit_date',
    ];
}
