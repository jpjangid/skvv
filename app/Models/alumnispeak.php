<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnispeak extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'designation',
        'description',
        'alumni_image',
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
}
