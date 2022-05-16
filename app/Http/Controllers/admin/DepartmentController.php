<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use App\Models\College;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\RolePermission;
use App\Models\RoleHasPermission;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::where('flag','0')->with('college')->get();
        return view('admin.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = College::where('flag',0)->select('name','id')->get();
        return view('admin.department.create',compact('colleges'));
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
            'name'                  =>  'required'
        ],[
            'name.required'         =>  'Please enter a name'
        ]);
        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }
        $department = Department::create([
            'college_id'            =>  $request->college_id,
            'name'                  =>  $request->name,
            'short_des'             =>  $request->short_des,
            'slug'                  =>  $request->slug,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
            'og_image'              =>  $document,
        ]);

        return redirect()->route('department.index')->with('success','Department Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colleges = College::select('id','name')->get();
        $department = Department::find($id);
        return view('admin.department.edit',compact('colleges','department'))->withcolleges($colleges);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required'
        ],[
            'name.required'         =>  'Please enter a name'
        ]);

        $department = Department::find($id);
        $department->update([
            'college_id'            =>  $request->college_id,
            'name'                  =>  $request->name,
            'short_des'             =>  $request->short_des,
            'slug'                  =>  $request->slug,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_image_alt'          =>  $request->og_image_alt,
            'og_description'        =>  $request->og_description,
        ]);
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $department->update([
                'og_image' =>  $document,
            ]);
        }
        return redirect()->route('department.index')->with('success','Department Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->flag = '1';
        $department->update();
        return redirect()->back()->with('danger','department Deleted Successfully');
    }
}
