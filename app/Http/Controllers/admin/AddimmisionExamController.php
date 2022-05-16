<?php

namespace App\Http\Controllers\admin;

use App\Models\AddimmisionExam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Department;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AddimmisionExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addmissionexams = AddimmisionExam::where('flag','0')->get();
        return view('admin.admissionexam.index',compact('addmissionexams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colleges = College::all();
        return view('admin.admissionexam.create',compact('colleges'));
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
            'college_id'        => 'required',
            'department_id'     => 'required',
            'course_id'         => 'required',
            'type'              => 'required',
            'start_date'        => 'required',
            'end_date'          => 'required',
        ],[
            'college_id.required'        => 'Please Select College',
            'department_id.required'     => 'Please Select Department',
            'course_id.required'         => 'Please Select course',
            'type.required'              => 'Please Select Type',
            'start_date.required'        => 'Please Select Start Date',
            'end_date.required'          => 'Please Select End Date',
        ]);
        $document = "";
        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
        }
        AddimmisionExam::create([
            'college_id'        => $request->college_id,
            'department_id'     => $request->department_id,
            'course_id'         => $request->course_id,
            'type'              => $request->type,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
            'slug'              => $request->slug,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'og_title'          => $request->og_title,
            'og_image_alt'      => $request->og_image_alt,
            'og_description'    => $request->og_description,
            'og_image'          => $document,


        ]);
        return redirect('admin/addmissionexam')->with('success','Addimmision Exam Addedd Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddimmisionExam  $addimmisionExam
     * @return \Illuminate\Http\Response
     */
    public function show(AddimmisionExam $addimmisionExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddimmisionExam  $addimmisionExam
     * @return \Illuminate\Http\Response
     */
    public function edit($addimmisionExam)
    {
        $addimmisionExam = AddimmisionExam::where('id',$addimmisionExam)->first();
        $colleges =  College::where(['flag' => 0,'status' => 0])->get();
        $selectedCollege = "";
        if(!empty($addimmisionExam->department_id)) {
            $department = Department::where('id',$addimmisionExam->department_id)->with('college')->first();
            $selectedCollege = $department->college->id;
        } 
        return view('admin.admissionexam.edit',compact('addimmisionExam','colleges','selectedCollege'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddimmisionExam  $addimmisionExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'college_id'        => 'required',
            'department_id'     => 'required',
            'course_id'         => 'required',
            'type'              => 'required',
            'start_date'        => 'required',
            'end_date'          => 'required',
        ],[
            'college_id.required'        => 'Please Select College',
            'department_id.required'     => 'Please Select Department',
            'course_id.required'         => 'Please Select course',
            'type.required'              => 'Please Select Type',
            'start_date.required'        => 'Please Select Start Date',
            'end_date.required'          => 'Please Select End Date',
        ]);
            $addimmisionExam = AddimmisionExam::find($id);
            $addimmisionExam->update([
               'college_id'        => $request->college_id,
               'department_id'     => $request->department_id,
               'course_id'         => $request->course_id,
               'type'              => $request->type,
               'start_date'        => $request->start_date,
               'end_date'          => $request->end_date,
               'slug'              => $request->slug,
               'meta_title'        => $request->meta_title,
               'meta_keyword'      => $request->meta_keyword,
               'meta_description'  => $request->meta_description,
               'og_title'          => $request->og_title,
               'og_image_alt'      => $request->og_image_alt,
               'og_description'    => $request->og_description,
            ]);
            if($request->hasFile('og_image')){
                $extension = $request->file('og_image')->extension();
                $file = $request->file('og_image');
                $fileNameString = (string) Str::uuid();
                $document = $fileNameString.time().".".$extension;
                $path = Storage::putFileAs('public/og_image/',$file, $document);
                $addimmisionExam->update([
                    'og_image' =>  $document,
                ]);
            }
       
        return redirect('admin/addmissionexam')->with('success','Addimmision Exam Updated Successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddimmisionExam  $addimmisionExam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addimmisionexam = AddimmisionExam::find($id);
        $addimmisionexam->flag = '1';
        $addimmisionexam->update();
        return redirect()->back()->with('danger','Addimmision Exam Deleted Successfully');
    }

    public function getdepartment($id)
    {
       $data = Department::where(['college_id'=> $id])->get();
       if(!empty($data)){
           return response()->json(['status'=>'success','data'=> $data]);
       }else{
           return response()->json(['status'=> 'Data Not Found']);
       }
    }
    public function getcourse($id)
    {
       $data = Course::where(['department_id'=> $id])->get();
       if(!empty($data)){
           return response()->json(['status'=>'success','data'=> $data]);
       }else{
           return response()->json(['status'=> 'Data Not Found']);
       }
    }
}
