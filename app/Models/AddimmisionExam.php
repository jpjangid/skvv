<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddimmisionExam extends Model
{
    use HasFactory;
    protected $fillable = [
        'college_id',
        'department_id',
        'course_id',
        'slug',
        'type',
        'start_date',
        'end_date',
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
    public function college()
    {
        return $this->belongsTo('App\Models\College','college_id','id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course','course_id','id');
    }
}
