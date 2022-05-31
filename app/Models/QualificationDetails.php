<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'onlineexam_id',                            
        'qualifications',                       
        'qualificationsname_of_board_university', 
        'passing_year',                             
        'subject',                               
        'marks',                                  
        'total_marks',                              
        'percentage',                              
        'grade',   
        'flag',                                
    ];
    public function onlineexam(){
        return $this->belongsTo('App\Models\OnlineExam','onlineexam_id');
    }
}
