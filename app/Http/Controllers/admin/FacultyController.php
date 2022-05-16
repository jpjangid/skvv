<?php

namespace App\Http\Controllers\admin;

use App\Models\Faculty;
use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\User;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index()
    {
        $facultys = Faculty::where('flag',0)->with('college','department','teacher','course')->get();

        return view('admin.faculty.index',compact('facultys'));
    }

    public function create()
    {
        $colleges = College::where(['flag' => 0])->get();
        $teachers = User::whereIn('role', ['staff','admin'])->get();

        return view('admin.faculty.create',compact('colleges','teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'college_id'        =>  'required',
            'department_id'     =>  'required',
            'course_id'         =>  'required',
            'teacher'           =>  'required',
            'teacher_role'      =>  'required'
        ],[
            'college_id.required'          =>  'College is required',
            'department_id.required'    =>  'Department is required',
            'course_id.required'        =>  'Course is required',
            'teacher.required'          =>  'Teacher is required',
            'teacher_role.required'     =>  'Teacher role is required'  
        ]);

        $faculty = Faculty::where(['college_id' => $request->college,'department_id' => $request->department_id,'course_id' => $request->course_id,'teacher_id' => $request->teacher,'teacher_role' => $request->teacher_role])->first();
        if(!empty($faculty) && $faculty != null) {
            Faculty::where(['college_id' => $request->college,'department_id' => $request->department_id,'course_id' => $request->course_id,'teacher_id' => $request->teacher,'teacher_role' => $request->teacher_role])->update(['flag' => 0]);
            return redirect()->route('faculty.index')->with('success','Faculty updated successfully');
        }

        Faculty::create([
            'college_id'    => $request->college_id,
            'department_id' => $request->department_id,
            'course_id'     => $request->course_id,
            'teacher_id'    => $request->teacher,
            'teacher_role'  => $request->teacher_role    
        ]);
        return redirect()->route('faculty.index')->with('success','Faculty created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
        $colleges = College::where(['flag' => 0])->get();
        $teachers = User::whereIn('role', ['staff','admin'])->get();

        return view('admin.faculty.edit',compact('faculty','colleges','teachers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'college_id'        =>  'required',
            'department_id'     =>  'required',
            'course_id'         =>  'required',
            'teacher'           =>  'required',
            'teacher_role'      =>  'required'
        ],[
            'college_id.required'          =>  'College is required',
            'department_id.required'    =>  'Department is required',
            'course_id.required'        =>  'Course is required',
            'teacher.required'          =>  'Teacher is required',
            'teacher_role.required'     =>  'Teacher role is required'  
        ]);

        $faculty = Faculty::where(['college_id' => $request->college,'department_id' => $request->department_id,'course_id' => $request->course_id,'teacher_id' => $request->teacher,'teacher_role' => $request->teacher_role])->first();
        if(!empty($faculty) && $faculty != null) {
            Faculty::where(['college_id' => $request->college,'department_id' => $request->department_id,'course_id' => $request->course_id,'teacher_id' => $request->teacher,'teacher_role' => $request->teacher_role])->update(['flag' => 0]);
            return redirect()->route('faculty.index')->with('success','Faculty updated successfully');
        }

        Faculty::where('id',$id)->update([
            'college_id'    => $request->college_id,
            'department_id' => $request->department_id,
            'course_id'     => $request->course_id,
            'teacher_id'    => $request->teacher,
            'teacher_role'  => $request->teacher_role    
        ]);

        return redirect()->route('faculty.index')->with('success','Faculty updated successfully');
    }

    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->flag = 1;
        $faculty->update();
        return redirect()->route('faculty.index')->with('danger','Faculty deleted successfully');
    }
}
