<?php

namespace App\Http\Controllers\admin;

use App\Models\OnlineExam;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Location;
use App\Models\QualificationDetails;

class OnlineExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onlinexams = OnlineExam::where('flag',0)->get();
        return view('admin.onlineexam.index',compact('onlinexams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::select('state_name','state_id')->distinct()->orderby('state_name')->get()->flatten();
        return view('admin.onlineexam.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     ''
        // ],[

        // ]);
        $cast_certificate = "";
        if($request->hasFile('cast_certificate')){
            $extension = $request->file('cast_certificate')->extension();
            $file = $request->file('cast_certificate');
            $fileNameString = (string) Str::uuid();
            $cast_certificate = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/onlineexam/',$file, $cast_certificate);
        }
        $signature = "";
        if($request->hasFile('signature')){
            $extension = $request->file('signature')->extension();
            $file = $request->file('signature');
            $fileNameString = (string) Str::uuid();
            $signature = $fileNameString.time().".".$extension;
            $path = Storage::putFileAs('public/onlineexam/',$file, $signature);
        }

        $onlineexam = OnlineExam::create([
            'addmission'                => $request->addmission,
            'subject'                   => $request->subject,
            'student_name'              => $request->student_name,
            'adhaar_no'                 => $request->adhaar_no,
            'stud_father_name'          => $request->stud_father_name,
            'stud_mother_name'          => $request->stud_mother_name,
            'email'                     => $request->email,
            'mobile_no'                 => $request->mobile_no,
            'dob'                       => $request->dob,
            'nationalilty'              => $request->nationalilty,
            'gender'                    => $request->gender,
            'address'                   => $request->address,
            'cast_certificate'          => $cast_certificate,
            'disability_certificate'    => $request->disability_certificate,
            'annual_imacome'            => $request->annual_imacome,
            'payment'                   => $request->payment,
            'payment_type'              => $request->payment_type,
            'payment_status'            => $request->payment_status,
            'date'                      => $request->date,
            'signature'                 => $signature,
            'location_id'           =>  $request->pincode,
        ]);

        if($request->qualifications[0] != null && count($request->qualifications) > 0){
            foreach($request->qualifications as $key=>$value){
                QualificationDetails::create([
                    'onlineexam_id'                             => $onlineexam->id,
                    'qualifications'                            => $request->qualifications[$key],
                    'qualificationsname_of_board_university'    => $request->name_of_board_university[$key],
                    'passing_year'                              => $request->passing_year[$key],
                    'subject'                                   => $request->quali_subject[$key],
                    'marks'                                     => $request->marks[$key],
                    'total_marks'                               => $request->total_marks[$key],
                    'percentage'                                => $request->percentage[$key],
                    'grade'                                     => $request->grade[$key],
                ]);
            }
        }
        return redirect()->back()->with('success','exam form submit successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnlineExam  $onlineExam
     * @return \Illuminate\Http\Response
     */
    public function show(OnlineExam $onlineExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnlineExam  $onlineExam
     * @return \Illuminate\Http\Response
     */
    public function edit(OnlineExam $onlineExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnlineExam  $onlineExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnlineExam $onlineExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnlineExam  $onlineExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlineExam $onlineExam)
    {
        //
    }
}
