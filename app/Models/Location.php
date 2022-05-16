<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'pincode',
        'city_id',
        'city_name',
        'state_id',
        'state_name',
        'country_id',
        'country_name'
    ];
}
