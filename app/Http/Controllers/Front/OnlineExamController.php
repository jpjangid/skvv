<?php

namespace App\Http\Controllers\Front;

use App\Models\OnlineExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\QualificationDetails;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
//use PDF;
use Barryvdh\DomPDF\Facade as PDF;

class OnlineExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function onlineexamform()
    {
        // dd("hello");
        $locations = Location::select('state_name', 'state_id')->distinct()->orderby('state_name')->get()->flatten();
        return view('front.onlineexam.examform', compact('locations'));
    }

    public function onlineexamstore(Request $request)
    {
        $cast_certificate = "";
        if ($request->hasFile('cast_certificate')) {
            $extension = $request->file('cast_certificate')->extension();
            $file = $request->file('cast_certificate');
            $fileNameString = (string) Str::uuid();
            $cast_certificate = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $cast_certificate);
        }
        $signature = "";
        if ($request->hasFile('signature')) {
            $extension = $request->file('signature')->extension();
            $file = $request->file('signature');
            $fileNameString = (string) Str::uuid();
            $signature = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $signature);
        }
        $stud_image = "";
        if ($request->hasFile('stud_image')) {
            $extension = $request->file('stud_image')->extension();
            $file = $request->file('stud_image');
            $fileNameString = (string) Str::uuid();
            $stud_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $stud_image);
        }

        $onlineexam = OnlineExam::create([
            'addmission'                => $request->addmission,
            'subject'                   => $request->subject,
            'addmission_year'           => $request->addmission_year,
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
            'caste'                     => $request->caste,
            'cast_certificate'          => $cast_certificate,
            'disability_certificate'    => $request->disability_certificate,
            'annual_imacome'            => $request->annual_imacome,
            'payment'                   => $request->payment,
            'payment_type'              => $request->payment_type,
            'payment_status'            => $request->payment_status,
            'date'                      => $request->date,
            'signature'                 => $signature,
            'stud_image'                => $stud_image,
            'location_id'               =>  $request->pincode,
        ]);

        if ($request->qualifications[0] != null && count($request->qualifications) > 0) {
            foreach ($request->qualifications as $key => $value) {
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
        return redirect('apply/confirm/' . $onlineexam->id)->with('success', 'exam form submit successfully');
    }

    public function confirmform($id)
    {
        $formconform = OnlineExam::find($id);
        $state = Location::find($formconform->location_id);
        $locations = Location::select('state_name', 'state_id')->distinct()->orderby('state_name')->get()->flatten();
        $qualoficationdetails = QualificationDetails::where('onlineexam_id', $formconform->id)->get();
        return view('front.onlineexam.formconform', compact('formconform', 'state', 'locations', 'qualoficationdetails'));
    }

    public function success(Request $request, $id)
    {
        // dd($request->all());
        $cast_certificate = "";
        if ($request->hasFile('cast_certificate')) {
            $extension = $request->file('cast_certificate')->extension();
            $file = $request->file('cast_certificate');
            $fileNameString = (string) Str::uuid();
            $cast_certificate = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $cast_certificate);
        }
        $signature = "";
        if ($request->hasFile('signature')) {
            $extension = $request->file('signature')->extension();
            $file = $request->file('signature');
            $fileNameString = (string) Str::uuid();
            $signature = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $signature);
        }

        $stud_image = "";
        if ($request->hasFile('stud_image')) {
            $extension = $request->file('stud_image')->extension();
            $file = $request->file('stud_image');
            $fileNameString = (string) Str::uuid();
            $stud_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $stud_image);
        }
        $onlineexam = OnlineExam::find($id);
        $onlineexam->addmission                = $request->addmission;
        $onlineexam->addmission_year           = $request->addmission_year;
        $onlineexam->subject                   = $request->subject;
        $onlineexam->student_name              = $request->student_name;
        $onlineexam->adhaar_no                 = $request->adhaar_no;
        $onlineexam->stud_father_name          = $request->stud_father_name;
        $onlineexam->stud_mother_name          = $request->stud_mother_name;
        $onlineexam->email                     = $request->email;
        $onlineexam->mobile_no                 = $request->mobile_no;
        $onlineexam->dob                       = $request->dob;
        $onlineexam->nationalilty              = $request->nationalilty;
        $onlineexam->gender                    = $request->gender;
        $onlineexam->address                   = $request->address;
        $onlineexam->caste                     = $request->caste;
        if (!empty($cast_certificate)) {
            $onlineexam->cast_certificate      = $cast_certificate;
        }
        $onlineexam->disability_certificate    = $request->disability_certificate;
        $onlineexam->annual_imacome            = $request->annual_imacome;
        $onlineexam->payment                   = $request->payment;
        $onlineexam->payment_type              = $request->payment_type;
        $onlineexam->payment_status            = $request->payment_status;
        $onlineexam->date                      = $request->date;
        if (!empty($signature)) {
            $onlineexam->signature             = $signature;
        }
        if (!empty($stud_image)) {
            $onlineexam->stud_image             = $stud_image;
        }
        $onlineexam->location_id               =  $request->pincode;
        $onlineexam->save();

        $qualificationdelete = QualificationDetails::where('onlineexam_id', $onlineexam->id)->get();
        foreach ($qualificationdelete as $qualificationdel) {
            $qualificationdel->delete();
        }
        // dd($onlineexam->id);

        if ($request->qualifications[0] != null && count($request->qualifications) > 0) {
            foreach ($request->qualifications as $key => $value) {
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
        return redirect('apply/downloadpdf/' . $onlineexam->id)->with('success', 'exam form submit successfully');
    }
    public function pdfdownload($id)
    {
        // $data['OnlineExam'] = OnlineExam::find($id);
        // $pdf = PDF::loadView('front.onlineexam.formpdf', $data);
        request()->session()->put('download.in.the.next.request', $id);
        return redirect('/');
        // return $pdf->download($data['OnlineExam']->student_name . 'addmission.pdf');
    }

    public function test()
    {
        $id = request()->session()->get('download.in.the.next.request') ?? 15;
        $data['OnlineExam'] = OnlineExam::find($id);
        $data['QualificationDetails'] = QualificationDetails::where('onlineexam_id', $data['OnlineExam']->id)->get();
        $data['Location'] = Location::find($data['OnlineExam']->location_id);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'hind-normal']);
        $pdf = PDF::loadView('front.onlineexam.formpdf', $data);
        request()->session()->forget('download.in.the.next.request');
        return $pdf->stream($data['OnlineExam']->student_name . 'addmission.pdf');
    }
}