<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvents extends Model
{
    use HasFactory;

    protected $fillable = ([ 
        "heading",
        "desc",
        "deptid",
        "img_url", 
        "pic_url",
        "cat",
        "display_date",
        "last_date",
        "link_url",
        "icon_url",
        "user_id",
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'og_title',
        'og_image',
        'og_image_alt',
        'og_description',
        "flag"
    ]);

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department','deptid','id');    
    }
    
}
