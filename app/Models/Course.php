<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'slug',
        'type_of_year',
        'number_of_year',
        'pdf',
        'short_description',
        'description',
        'eligibility',
        'seats',
        'course_type',
        'top_course',
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

    public function department()
    {
        return $this->belongsTo('App\Models\Department','department_id','id');
    }

}
