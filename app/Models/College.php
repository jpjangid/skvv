<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'college_code',
        'mobile',
        'phone',
        'profile',
        'type',
        'location_id',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'og_title',
        'og_image',
        'og_image_alt',
        'og_description',
        'status',
        'flag'
    ];

    public function locations(){
        return $this->belongsTo('App\Models\Location','location_id');
    }

    public function departments(){
        return $this->hasMany('App\Models\Department','college_id','id');
    }
    
}
