<?php

namespace App\Http\Controllers\admin;

use App\Models\RolePermission;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::where('name','!=','student')->get();
        return view('admin.role_permission.index', compact('roles'));
    }

    public function store(Request $request)
    {
        if($request->permission_id == 'all'){
            $rolePermission = RolePermission::where(['role_id'=>$request->role_id])->get();
            if(!$rolePermission->isEmpty()){
                $delete = RolePermission::where(['role_id'=>$request->role_id])->delete();
            }
            $permissions = Permission::all();
            foreach($permissions as $permission){
                RolePermission::create([
                    'permission_id' => $permission->id,
                    'role_id'   =>  $request->role_id,
                ]);
            }
            $data['msg'] = 'success';
            return response($data);
        }elseif($request->permission_id == 'unselectall'){
            $rolehaspermissions = RolePermission::where(['role_id'=>$request->role_id])->delete();
            $data['msg'] = 'danger';
            return response($data);
        }else{
            $role_permission = RolePermission::where(['permission_id'=>$request->permission_id,'role_id'=>$request->role_id])->first();
            if(!empty($role_permission)){
                RolePermission::where(['permission_id'=>$request->permission_id,'role_id'=>$request->role_id])->delete();
                $data['msg'] = 'danger';
                return response($data);
            }else{
                RolePermission::create([
                    'permission_id' => $request->permission_id,
                    'role_id'   =>  $request->role_id
                ]);
                $data['msg'] = 'success';
                return response($data);
            }
        }
    }

    public function edit($id)
    {
        $rolepermissions = RolePermission::where('role_id',$id)->get('permission_id');
        $role = Role::find($id);
        $role_id = $role->id;
        $data = array();
        foreach($rolepermissions as $rolepermission){
            array_push($data,$rolepermission->permission_id);
        }

        $permissions = Permission::orderby('id','asc')->get();
        $names = Permission::select('title')->distinct('title')->get()->sort();
        
        return view('admin.role_permission.edit', compact('rolepermissions','permissions','id','data','role_id','names'));
    }
}
