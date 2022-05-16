<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role as Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permission(Request $request){
    	
    	Permission::create(['name' => $request->name]);

    	return back();

    }
}
