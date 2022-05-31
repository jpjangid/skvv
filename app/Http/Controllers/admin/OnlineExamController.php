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
        $onlinexams = OnlineExam::where('flag', 0)->get();
        return view('admin.onlineexam.index', compact('onlinexams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::select('state_name', 'state_id')->distinct()->orderby('state_name')->get()->flatten();
        return view('admin.onlineexam.create', compact('locations'));
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
            'addmission'                => 'required',
            'subject'                   => 'required',
            'addmission_year'           => 'required',
            'student_name'              => 'required',
            'adhaar_no'                 => 'required',
            'stud_father_name'          => 'required',
            'stud_mother_name'          => 'required',
            'email'                     => 'required',
            'mobile_no'                 => 'required',
            'dob'                       => 'required',
            'nationalilty'              => 'required',
            'gender'                    => 'required',
            'address'                   => 'required',
            'cast_certificate'          => 'required',
            'caste'                     => 'required',
            'disability_certificate'    => 'required',
            'annual_imacome'            => 'required',
            'payment'                   => 'required',
            'payment_type'              => 'required',
            'payment_status'            => 'required',
            'date'                      => 'required',
            'signature'                 => 'required',
            'stud_image'                => 'required',
        ], [
            'addmission.required'                => 'This Field is Required',
            'subject.required'                   => 'This Field is Required',
            'addmission_year.required'           => 'This Field is Required',
            'student_name.required'              => 'This Field is Required',
            'adhaar_no.required'                 => 'This Field is Required',
            'stud_father_name.required'          => 'This Field is Required',
            'stud_mother_name.required'          => 'This Field is Required',
            'email.required'                     => 'This Field is Required',
            'mobile_no.required'                 => 'This Field is Required',
            'dob.required'                       => 'This Field is Required',
            'nationalilty.required'              => 'This Field is Required',
            'gender.required'                    => 'This Field is Required',
            'address.required'                   => 'This Field is Required',
            'cast_certificate.required'          => 'This Field is Required',
            'caste.required'                     => 'This Field is Required',
            'disability_certificate.required'    => 'This Field is Required',
            'payment.required'                   => 'This Field is Required',
            'payment_type.required'              => 'This Field is Required',
            'payment_status.required'            => 'This Field is Required',
            'signature.required'                 => 'This Field is Required',
            'stud_image.required'                => 'This Field is Required',
        ]);
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
        return redirect()->back()->with('success', 'exam form submit successfully');
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
    public function edit($id)
    {
        $onlineexam = OnlineExam::find($id);
        $state = Location::find($onlineexam->location_id);
        $locations = Location::select('state_name', 'state_id')->distinct()->orderby('state_name')->get()->flatten();
        $qualoficationdetails = QualificationDetails::where('onlineexam_id', $onlineexam->id)->get();

        return view('admin.onlineexam.edit', compact('onlineexam', 'state', 'locations', 'qualoficationdetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnlineExam  $onlineExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        $checking_signature_1 = "";
        if ($request->hasFile('checking_signature_1')) {
            $extension = $request->file('checking_signature_1')->extension();
            $file = $request->file('checking_signature_1');
            $fileNameString = (string) Str::uuid();
            $checking_signature_1 = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $checking_signature_1);
        }
        $checking_signature_2 = "";
        if ($request->hasFile('checking_signature_2')) {
            $extension = $request->file('checking_signature_2')->extension();
            $file = $request->file('checking_signature_2');
            $fileNameString = (string) Str::uuid();
            $checking_signature_2 = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $checking_signature_2);
        }
        $checking_signature_3 = "";
        if ($request->hasFile('checking_signature_3')) {
            $extension = $request->file('checking_signature_3')->extension();
            $file = $request->file('checking_signature_3');
            $fileNameString = (string) Str::uuid();
            $checking_signature_3 = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/onlineexam/', $file, $checking_signature_3);
        }

        $onlineexam = OnlineExam::find($id);
        $onlineexam->addmission                     = $request->addmission;
        $onlineexam->addmission_year                = $request->addmission_year;
        $onlineexam->subject                        = $request->subject;
        $onlineexam->student_name                   = $request->student_name;
        $onlineexam->adhaar_no                      = $request->adhaar_no;
        $onlineexam->stud_father_name               = $request->stud_father_name;
        $onlineexam->stud_mother_name               = $request->stud_mother_name;
        $onlineexam->email                          = $request->email;
        $onlineexam->mobile_no                      = $request->mobile_no;
        $onlineexam->dob                            = $request->dob;
        $onlineexam->nationalilty                   = $request->nationalilty;
        $onlineexam->gender                         = $request->gender;
        $onlineexam->address                        = $request->address;
        $onlineexam->caste                          = $request->caste;
        if (!empty($cast_certificate)) {
            $onlineexam->cast_certificate           = $cast_certificate;
        }
        $onlineexam->disability_certificate         = $request->disability_certificate;
        $onlineexam->annual_imacome                 = $request->annual_imacome;
        $onlineexam->payment                        = $request->payment;
        $onlineexam->payment_type                   = $request->payment_type;
        $onlineexam->payment_status                 = $request->payment_status;
        $onlineexam->date                           = $request->date;
        if (!empty($signature)) {
            $onlineexam->signature                  = $signature;
        }
        if (!empty($stud_image)) {
            $onlineexam->stud_image                 = $stud_image;
        }
        $onlineexam->location_id                    =  $request->pincode;

        //office releted
        $onlineexam->mismatch_form_1                = $request->mismatch_form_1;
        $onlineexam->mismatch_form_2                = $request->mismatch_form_2;
        $onlineexam->mismatch_form_3                = $request->mismatch_form_3;
        $onlineexam->mismatch_form_4                = $request->mismatch_form_4;

        if (!empty($checking_signature_1)) {
            $onlineexam->checking_signature_1       = $checking_signature_1;
        }
        if (!empty($checking_signature_2)) {
            $onlineexam->checking_signature_2       = $checking_signature_2;
        }
        if (!empty($checking_signature_3)) {
            $onlineexam->checking_signature_3       = $checking_signature_3;
        }

        $onlineexam->recipt_no                         = $request->recipt_no;
        $onlineexam->date                         = $request->recipt_date;
        $onlineexam->status                         = $request->status;
        $onlineexam->save();

        //Qualification details
        $qualificationdelete = QualificationDetails::where('onlineexam_id', $onlineexam->id)->get();
        foreach ($qualificationdelete as $qualificationdel) {
            $qualificationdel->delete();
        }
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
        return redirect()->back()->with('success', 'exam form submit successfully');
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
