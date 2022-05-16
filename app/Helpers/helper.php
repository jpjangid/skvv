<?php
use Illuminate\Support\Facades\Auth;
use App\Models\RoleHasPermission;

function userPermissions(){
        $side_bar_color = "";
        $user = Auth::user(); 
        $userpermissions = array();
        if(!empty($user)){
            $rolehaspermissions = RoleHasPermission::where('user_id',$user->id)->with('permission')->get();
        
            foreach ($rolehaspermissions as $rolehaspermission) {
                $name = $rolehaspermission->permission->name;
                array_push($userpermissions,$name);
            }
        }
        
        return $userpermissions;
}