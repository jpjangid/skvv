<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::where(['flag' => 0])->with('department.college')->get();
        return view('admin.course.index',compact('courses'));
    }

    public function create()
    {
        $colleges =  College::where(['flag' => 0,'status' => 0])->get();
        return view('admin.course.create',compact('colleges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id'     => 'required',
            'name'              => 'required|unique:courses,name',
            'slug'              => 'required|unique:courses,slug',
            'type_of_year'      => 'required',
            'number_of_year'    => 'required',
            'eligibility'       => 'required',
            'seats'             => 'nullable|numeric',    
            'short_des'         => 'required',
            'description'       => 'required',
            'top_course'        => 'required',    
            'pdf'               => 'nullable|max:10000',
            'og_image'          => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'    
        ],[
            'department_id.required'     =>  'department_id.required',
            'name.required'              =>  'Course name is required',
            'type_of_year.required'      =>  'Course Year / Semester is required',
            'number_of_year.required'    =>  'Section Year / Semester is required',
            'eligibility.required'       =>  'Eligibility is required',
            'pdf.max'                    =>  'Document must not be greater than 10mb',
            'short_des.required'         =>  'Short Description is required',
            'description'                =>  'Description is required',      
        ]);

        $course = new Course;
        $course->name = $request->name;
        $course->department_id  = $request->department_id;
        $course->type_of_year = $request->type_of_year;
        $course->number_of_year = $request->number_of_year;
        $course->eligibility = $request->eligibility;
        $course->seats = $request->seats;
        $course->course_type = $request->course_type;
        $course->short_description = $request->short_des;
        $course->description = $request->description;
        $course->top_course = $request->top_course;
        $course->slug = $request->slug;
        $course->meta_title = $request->meta_title;
        $course->meta_keyword = $request->meta_keyword;
        $course->meta_description = $request->meta_description;
        $course->og_title = $request->og_title;
        $course->og_image_alt = $request->og_image_alt;
        $course->og_description = $request->og_description;
    
        if($request->hasFile('pdf')){
            $extension = $request->file('pdf')->extension();
            $file = $request->file('pdf');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/course_images/',$file, $document);
            $course->pdf = $document; 
        }

        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $course->og_image = $document; 
        }

        $course->save();

        return redirect()->route('course.index')->with('success','Course created successfully');
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        $colleges =  College::where(['flag' => 0,'status' => 0])->get();
        $selectedCollege = "";
        if(!empty($course->department_id)) {
            $department = Department::where('id',$course->department_id)->with('college')->first();
            $selectedCollege = $department->college->id;
        } 

        return view('admin.course.edit',compact('course','colleges','selectedCollege'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'department_id'     => 'required',
            'name'              => 'required|unique:courses,name,'.$course->id,
            'slug'              => 'required|unique:courses,slug,'.$course->id,
            'type_of_year'      => 'required',
            'number_of_year'    => 'required',
            'eligibility'       => 'required',
            'seats'             => 'nullable|numeric',
            'short_des'         => 'required',
            'description'       => 'required',
            'top_course'        => 'required',    
            'pdf'               => 'nullable|max:10000'    
        ],[
            'department_id.required'     =>  'department_id.required',
            'name.required'              =>  'Course name is required',
            'type_of_year.required'      =>  'Course Year / Semester is required',
            'number_of_year.required'    =>  'Section Year / Semester is required',
            'eligibility.required'       =>  'Eligibility is required',
            'pdf.max'                    =>  'Document must not be greater than 10mb',
            'short_des.required'         =>  'Short Description is required',
            'description'                =>  'Description is required'      
        ]);

        $course->name = $request->name;
        $course->department_id  = $request->department_id;
        $course->type_of_year = $request->type_of_year;
        $course->number_of_year = $request->number_of_year;
        $course->eligibility = $request->eligibility;
        $course->seats = $request->seats;
        $course->course_type = $request->course_type;
        $course->short_description = $request->short_des;
        $course->description = $request->description;
        $course->top_course = $request->top_course;
        $course->slug = $request->slug;
        $course->meta_title = $request->meta_title;
        $course->meta_keyword = $request->meta_keyword;
        $course->meta_description = $request->meta_description;
        $course->og_title = $request->og_title;
        $course->og_image_alt = $request->og_image_alt;
        $course->og_description = $request->og_description;
    
        if($request->hasFile('pdf')){
            $extension = $request->file('pdf')->extension();
            $file = $request->file('pdf');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/course_images/',$file, $document);
            $course->pdf = $document; 
        }

        if($request->hasFile('og_image')){
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $document = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/og_image/',$file, $document);
            $course->og_image = $document; 
        }

        $course->save();

        return redirect()->route('course.index')->with('success','Course updated successfully');
    }

    public function destroy($id)
    {
        Course::where('id',$id)->update(['flag' => 1]);
        return redirect()->route('course.index')->with('success','Course removed successfully');
    }
}
