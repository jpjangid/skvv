<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\RolePermission;
use App\Models\RoleHasPermission;
use App\Models\UserCollege;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $locations = Location::select('state_name','state_id')->distinct()->orderby('state_name')->get()->flatten();
        return view('admin.users.index',compact('locations','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::select('state_name','state_id')->distinct()->orderby('state_name')->get()->flatten();
        $roles = Role::where('name','!=','superadmin')->get();
        return view('admin.users.create',compact('locations','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name'                  =>  'required|max:255',
            'password'              =>  'required|min:8',
            'email'                 =>  'required|email|max:255|unique:users',
            'image'                 =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mobile'                =>  'nullable|digits:10|unique:users,mobile',
            'role'                  =>  'required|numeric',
            'state_id'              =>  'required',     
            'city_id'               =>  'required',
            'pincode'               =>  'required'
        ],[
            'name.required'         => 'Please enter username',
            'password.required'     => 'Please enter password',
            'email.required'        => 'Please enter email',
            'role.required'         => 'Role is required',
            'state_id.required'     => 'Please select State',
            'city_id.required'      => 'Please select City'
        ]);

        
        $role = Role::find($request->role);
        if(strtolower($role->name) == 'college') {
            if(empty($request->college) || $request->college[0] == null) {
                return redirect()->back()->with('danger','Please select college')->withInput();
            }
        }

        $image = "";
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/user/',$file, $image);
        }

        $user = User::create([
            'name'                  =>  $request->name,
            'email'                 =>  $request->email,
            'location_id'           =>  $request->pincode,
            'password'              =>  Hash::make($request->password),
            'image'                 =>  $image,
            'mobile'                =>  $request->mobile,
            'line1'                 =>  $request->line1,
            'line2'                 =>  $request->line2,
            'dob'                   =>  $request->dob,
            'gender'                =>  $request->gender,
            'role'                  =>  $role->name     
        ]);
        
        if(!empty($request->college)){
            foreach($request->college as $college) {
                UserCollege::create([
                    'user_id'    => $user->id,
                    'college_id' => $college
                ]);
            }  
        }
        
        $this->assingPermission($role->name,$user->id);
        $user->assignRole($role->name);
        
        return redirect()->route('users.index')->with('success', 'User has been created Successfully');
    }

    public function assingPermission($role,$user_id){
        $role = Role::where('name',$role)->first();    
        $role_permission = RolePermission::where('role_id',$role->id)->with('permission')->get();
        if(!empty($role_permission)){   
            foreach($role_permission as $permission){
                $permission_id = $permission->permission->id;
                RoleHasPermission::create([
                    'role_id'   =>  $role->id,
                    'permission_id' => $permission_id,
                    'user_id'   =>  $user_id,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $state = Location::find($user->location_id);
        $locations = Location::select('state_name','state_id')->distinct()->orderby('state_name')->get()->flatten();

        return view('admin.users.edit',compact('user','locations','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required|max:255',
            'password'              =>  'nullable|min:8',
            'email'                 =>  'required|email|max:255|unique:users,name,'.$id,
            'image'                 =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mobile'                =>  'nullable|digits:10',
            
        ],[
            'name.required'         => 'Please enter username',
            'email.required'        => 'Please enter email',
            'pincode.required'      => 'Please Select Pincode',
        ]);

        $image = "";
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/user/',$file, $image);
        }

        $user = User::find($id);
        $user->name                 = $request->name;
        $user->email                = $request->email;
        $user->mobile               = $request->mobile;
        $request->password         != "" ? $user->password = Hash::make($request->password) : ""; 
        $user->line1                =  $request->line1;
        $user->line2                =  $request->line2;
        $user->dob                  =  $request->dob;
        $user->gender               =  $request->gender;
        $user->location_id          = $request->pincode;
        $user->save();

        if(!empty($image)) {
            $user->update([
                'image' =>  $image
            ]);
        }

        return redirect()->route('users.index')->with('success','User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getState() {
        $data['states']= Location::select('state_name','state_id')->distinct()->orderby('state_name')->get();
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $data['cities'] = Location::where("state_id",$request->state_id)->distinct()->orderby('city_name')->get(["city_name","city_id"]);
        return response()->json($data);
    }

    public function getPincode(Request $request)
    {
        $data['pincodes'] = Location::where("city_id",$request->city_id)->get(["pincode","id"]);
        return response()->json($data);
    }

    public function edit_admin_profile($id)
    {
        if(auth()->user()->id != $id) {
            return redirect()->back()->with('success','Your are not authorized to access others profile');
        }
        $user = User::find($id);
        $state = Location::find($user->location_id);
        $locations = Location::select('state_name','state_id')->distinct()->orderby('state_name')->get()->flatten();

        return view('admin.profile.edit',compact('user','locations','state'));
    }

    public function update_admin_profile(Request $request,$id)
    {
        $request->validate([
            'name'                  =>  'required|max:255',
            'password'              =>  'nullable|min:8',
            'email'                 =>  'required|email|max:255|unique:users,name,'.$id,
            'image'                 =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mobile'                =>  'nullable|digits:10',
        ],[
            'name.required'         => 'Please enter username',
            'email.required'        => 'Please enter email',
            'pincode.required'      => 'Please Select Pincode',
        ]);

        $image = "";
        if($request->hasFile('image')){
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/user/',$file, $image);
        }

        $user = User::find($id);
        $user->name                 = $request->name;
        $user->email                = $request->email;
        $user->mobile               = $request->mobile;
        $request->password         != "" ? $user->password = Hash::make($request->password) : ""; 
        if(!empty($image)) {
            $user->image = $image;
        }
        $user->save();

        return redirect()->route('profile.admin',['id' => auth()->user()->id])->with('success','Profile Updated Successfully');
    }
}
