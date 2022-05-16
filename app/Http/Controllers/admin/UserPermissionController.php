<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoleHasPermission;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class UserPermissionController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.userpermissions.index', compact('users'));
    }

    public function store(Request $request)
    {
        if($request->permission_id == 'all'){
            $userhaspermission = RoleHasPermission::where(['role_id'=>$request->role_id,'user_id'=>$request->user_id])->get();
            if(!$userhaspermission->isEmpty()){
                $delete = RoleHasPermission::where(['role_id'=>$request->role_id,'user_id'=>$request->user_id])->delete();
            }
            $permissions = Permission::all();
            foreach($permissions as $permission){
                RoleHasPermission::create([
                    'role_id'   =>  $request->role_id,
                    'permission_id' => $permission->id,
                    'user_id'   =>  $request->user_id,
                ]);
            }
            $data['msg'] = 'success';
            return response($data);
        }elseif($request->permission_id == 'unselectall'){
            $rolehaspermissions = RoleHasPermission::where(['role_id'=>$request->role_id,'user_id'=>$request->user_id])->delete();
            $data['msg'] = 'danger';
            return response($data);
        }else{
            $role_permission = RoleHasPermission::where(['user_id'=>$request->user_id,'permission_id'=>$request->permission_id,'role_id'=>$request->role_id])->first();
            if(!empty($role_permission)){
                RoleHasPermission::where(['user_id'=>$request->user_id,'permission_id'=>$request->permission_id,'role_id'=>$request->role_id])->delete();
                $data['msg'] = 'danger';
                return response($data);
            }else{
                RoleHasPermission::create([
                    'role_id'   =>  $request->role_id,
                    'permission_id' => $request->permission_id,
                    'user_id'   =>  $request->user_id,
                ]);
                $data['msg'] = 'success';
                return response($data);
            }
        }
    }

    public function edit($id)
    {
        $userpermissions = RoleHasPermission::where('user_id',$id)->get('permission_id');
        $user = User::find($id);
        $role = Role::where('name',$user->role)->first();
        $role_id = $role->id;
        $data = array();
        foreach($userpermissions as $userpermission){
            array_push($data,$userpermission->permission_id);
        }
        // $id = in_array('65',$userpermissions);
        $permissions = Permission::orderby('id','asc')->get();
        $names = Permission::select('title')->distinct('title')->get()->sort();
        
        return view('admin.userpermissions.edit', compact('userpermissions','permissions','id','data','role_id','names'));
    }
    
}
