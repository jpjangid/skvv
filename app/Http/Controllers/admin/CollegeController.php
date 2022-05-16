<?php

namespace App\Http\Controllers\admin;

use App\Models\College;
use App\Models\Location;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Role;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::where('flag','0')->get();
        return view('admin.college.index')->withcolleges($colleges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::select('state_name','state_id')->distinct()->orderby('state_name')->get()->flatten();
        return view('admin.college.create',compact('locations'));
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
            'name'                  =>  'required|max:255|unique:colleges',
            'profile'               =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'mobile'                =>  'nullable|digits:10',
        ],[
            'name.required'         => 'Please enter college name',
        ]);

        $profile = "";
        if($request->hasFile('profile')){
            $extension = $request->file('profile')->extension();
            $file = $request->file('profile');
            $fileNameString = (string) Str::uuid();
            $profile = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/college/',$file, $profile);
        }
        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }

        $college = College::create([
            'name'                  =>  $request->name,
            'email'                 =>  $request->email,
            'college_code'          =>  $request->college_code,
            'mobile'                =>  $request->mobile,
            'phone'                 =>  $request->phone,
            'profile'               =>  $profile,
            'type'                  =>  $request->type,
            'location_id'           =>  $request->pincode,
            'slug'                  =>  $request->slug,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
            'og_image'              =>  $document,
        ]);
        
        return redirect()->route('college.index')->with('success', 'College has been created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $college = College::find($id);
        $state = Location::find($college->location_id);
        $locations = Location::select('state_name','state_id')->distinct()->orderby('state_name')->get()->flatten();

        return view('admin.college.edit',compact('college','locations','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required|max:255|unique:colleges,name,'.$id,
            'profile'               =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'mobile'                =>  'nullable|digits:10',
        ],[
            'name.required'         => 'Please enter College name',
        ]);

        $profile = "";
        if($request->hasFile('profile')){
            $extension = $request->file('profile')->extension();
            $file = $request->file('profile');
            $fileNameString = (string) Str::uuid();
            $profile = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/college/',$file, $profile);
        }

        $college = College::find($id);
        $college->name                  = $request->name;
        $college->email                 = $request->email;
        $college->mobile                = $request->mobile;
        $college->college_code          =  $request->college_code;
        $college->phone                 =  $request->phone;
        $college->type                  =  $request->type;
        $college->location_id           = $request->pincode;
        $college->slug                  = $request->slug;
        $college->meta_title            = $request->meta_title;
        $college->meta_keyword          = $request->meta_keyword;
        $college->meta_description      = $request->meta_description;
        $college->og_title              = $request->og_title;
        $college->og_image_alt          = $request->og_image_alt;
        $college->og_description        = $request->og_description;
        $college->save();

        if(!empty($profile)) {
            $college->update([
                'profile' =>  $profile
            ]);
        }
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $college->update([
                'og_image' =>  $document,
            ]);
        }
        
        return redirect()->route('college.index')->with('success', 'College has been created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\College  $college
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::find($id);
        $college->flag = '1';
        $college->update();
        return redirect()->back()->with('danger','College Deleted Successfully');
    }

    public function getCollegesList(Request $request) {
        $role = Role::find($request->role_id);
        if(strtolower($role->name) == "college") {
            $data['colleges'] = College::where('flag',0)->get();
            $data['status'] = 200;
            return response()->json($data);
        }
        $data['status'] = 401;
        return response()->json($data);
    }

}
