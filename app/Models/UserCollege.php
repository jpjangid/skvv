<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCollege extends Model
{
    use HasFactory;
    protected $fillable = [
        'college_id',
        'user_id',
        'status',
        'flag'
    ];

    public function college(){
        return $this->belongsTo('App\Models\College','college_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

}
