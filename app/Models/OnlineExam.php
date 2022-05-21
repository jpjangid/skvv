<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineExam extends Model
{
    use HasFactory;
    protected $fillable = [
        'addmission',
        'subject',
        'student_name',
        'adhaar_no',
        'stud_father_name',
        'stud_mother_name',
        'email',
        'mobile_no',
        'dob',
        'nationalilty',
        'gender',
        'address',
        'cast_certificate',
        'disability_certificate',
        'annual_imacome',
        'payment',
        'payment_type',
        'payment_status',
        'date',
        'signature',

        'recipt_no',
        'mismatch_form_1',
        'mismatch_form_2',
        'mismatch_form_3',
        'mismatch_form_4',
        'location_id',
        'flag'
    ];

    public function locations(){
        return $this->belongsTo('App\Models\Location','location_id');
    }
}
