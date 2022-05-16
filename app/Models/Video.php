<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ([
        'category_id',
        'video',
        'link',
        'short_des',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'og_title',
        'og_image',
        'og_image_alt',
        'og_description',
        'flag',
        'status'
    ]);

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
