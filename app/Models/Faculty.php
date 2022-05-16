<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'department_id',
        'course_id',
        'teacher_id',
        'teacher_role',
        'top_faculty',
        'status',
        'flag'
    ];

    public function teacher()
    {
        return $this->belongsTo('App\Models\User','teacher_id','id');
    }
    public function college()
    {
        return $this->belongsTo('App\Models\College','college_id','id');
    }
    public function department()
    {
        return $this->belongsTo('App\Models\Department','department_id','id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course','course_id','id');
    }
}
