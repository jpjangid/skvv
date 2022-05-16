<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = 'role_permissions';
    protected $fillable = ['permission_id','role_id'];

    public function permission(){
        return $this->belongsTo('App\Models\Permission','permission_id');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role','role_id');
    }
    
}
