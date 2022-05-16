<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;

class CourseController extends Controller
{
    public function index($department)
    {
        $departments = Department::where(['slug' => $department])->first(); 
        if(!$departments){
            return redirect('404');
        }
        $courses = Course::where(['flag' => 0,'status' => 0,'department_id' => $departments->id])->get();

        return view('front.course.index',compact('courses','departments'));
    }

    public function courses()
    {
        $departments = Department::where(['flag' => 0,'status' => 0])->get(); 
        $courses = array();
        if(!empty($departments)) {
            $courses = Course::where(['department_id' => $departments[0]->id])->get();
        }

        return view('front.pages.courses',compact('courses','departments'));
    }

    public function coursesOffered($slug)
    {
        $department = Department::where(['flag' => 0,'slug' => $slug])->first();
        if(empty($department)) {
            return redirect()->back();
        }
        $departments = Department::where(['flag' => 0,'status' => 0])->get(); 
        $courses = array();
        if(!empty($departments)) {
            $courses = Course::where(['department_id' => $department->id])->get();
        }

        return view('front.pages.courses_detail',compact('courses','departments'));
    }
}
