<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'businesses'; 

    protected $fillable = [
        'location',
        'latitude',
        'longitude',
        'term',
        'radius',
        'categories',
        'locale',
        'price',
        'open_now',
        'open_at',
        'attributes',
        'sort_by',
        'device_platform',
        'reservation_date',
        'reservation_time',
        'reservation_covers',
        'matches_party_size_param',
        'limit',
        'offset',
    ];

    
}
