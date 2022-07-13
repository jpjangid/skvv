<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;
use App\Models\AddimmisionExam;
use App\Models\Faculty;
use App\Models\User;

class DepartmentController extends Controller
{
    public function index($slug = null)
    {
        $department = Department::where('slug', $slug)->first();
        // dd($department);
        if ($department == null) {
            return redirect()->back();
        }
        $courses = Course::where(['flag' => 0, 'department_id' => $department->id])->get();
        $faculties = Faculty::where(['department_id' => $department->id])->with('teacher')->get();
        // dd($faculties);
        $notifications = AddimmisionExam::where(['flag' => 0, 'status' => 0, 'type' => 'exam'])->where('start_date', '>=', date('Y-m-d'))->where('end_date', '<=', date('Y-m-d'))->with('college', 'department', 'course')->orderBy('created_at', 'ASC')->get();

        return view('front.department.index', compact('courses', 'department', 'notifications', 'faculties'));
    }

    public function teacher_details($name)
    {
        $users = User::where(['name' => $name])->first();
        $faculty = Faculty::where('teacher_id', $users->id)->with('department')->first();
        // dd($faculty);
        return view('front.pages.teacher_profile', compact('users', 'faculty'));
    }
}
