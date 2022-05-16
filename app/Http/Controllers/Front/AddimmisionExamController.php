<?php

namespace App\Http\Controllers\front;

use App\Models\AddimmisionExam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Department;
use App\Models\Course;

class AddimmisionExamController extends Controller
{
   public function addmission()
   {
       $colleges = College::where('flag',0)->with('departments')->get();
       $departments = "";
       if(!empty($colleges)) {
           $departments = Department::where(['id' => $colleges[0]->id,'flag'=>0])->get(); 
       }

       return view('front.pages.addmission',compact('colleges','departments'));
   }

   public function addmissionlist($id)
   {   
        $colleges = College::where('flag',0)->with('departments')->get();
        $college = College::where('id',$id)->first();
        if(empty($college)) {
            return redirect()->back();
        }
        $departments = "";
        if(!empty($colleges)) {
            $departments = Department::where(['id' => $college->id,'flag'=>0])->get(); 
        }
        return view('front.pages.addmission',compact('colleges','departments'));
   }
   
   public function exams()
   { 
        $colleges = College::where('flag',0)->with('departments')->get();
        $exams = AddimmisionExam::where(['flag' => 0,'status' => 0,'type' => 'exam'])->with('college','department','course')->get();
        return view('front.pages.exams',compact('colleges','exams'));
   }
   
   public function examsSlug($slug)
   { 
        $college = College::where('slug',$slug)->first();
        if(empty($college)) {
            return redirect()->back();
        }
        $colleges = College::where('flag',0)->with('departments')->get();
        $exams = AddimmisionExam::where(['flag' => 0,'status' => 0,'type' => 'exam','college_id' => $college->id])->with('college','department','course')->get();
        return view('front.pages.exams_college',compact('colleges','exams'));
   }
}
