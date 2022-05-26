@extends('admin.layouts.app')

@section('breadcrumb')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/onlineexam')}}">Online Exam</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Online Exam</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    <!-- Card stats -->
    <div class="row">
        <div class="col-xl-12 col-md-12" style="background-color:white; border-radius:5px;">
            <!-- form start -->
            <form action="{{ url('admin/onlineexam/update',$onlineexam->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">

                        <!-- Select addmission -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addmission">Admission/प्रवेश पाठ्यक्रम </label>
                                <select class="form-control custom-select" name="addmission" id="addmission" value="{{ old('addmission')}}" data-parsley-required-message="Please Select addmission" required="">
                                    <option value="" selected>Select Admission</option>
                                    <option value="Ph.D" {{ ( $onlineexam->addmission) ? 'selected' : ""}}>Ph.D</option>
                                    <option value="M.A." {{ ( $onlineexam->addmission) ? 'selected' : ""}}>M.A. </option>
                                    <option value="B.A." {{ ( $onlineexam->addmission) ? 'selected' : ""}}>B.A. </option>
                                    <option value="ACHARYA" {{ ($onlineexam->addmission) ? 'selected' : ""}}>ACHARYA </option>
                                    <option value="SHASTRI" {{ ($onlineexam->addmission) ? 'selected' : ""}}>SHASTRI </option>
                                    <option value="DIPLOMA" {{ ($onlineexam->addmission) ? 'selected' : ""}}>DIPLOMA </option>
                                    <option value="PG DIPLOMA" {{ ($onlineexam->addmission) ? 'selected' : ""}}>PG DIPLOMA </option>
                                </select>
                                @error('addmission')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- YEAR -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addmission_year">Year/वर्ष </label>
                                <select class="form-control custom-select" name="addmission_year" id="addmission_year" value="{{ old('addmission_year')}}" data-parsley-required-message="Please Select addmission_year" required="">
                                    <option value="" selected>Select Year</option>
                                    <option value="1st year" {{ ($onlineexam->addmission_year) ? 'selected' : ""}}>1st Year</option>
                                    <option value="2nd year" {{ ($onlineexam->addmission_year) ? 'selected' : ""}}>2nd Year </option>
                                    <option value="3rd year" {{ ($onlineexam->addmission_year) ? 'selected' : ""}}>3rd Year </option>
                                </select>
                                @error('addmission_year')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Select subject -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject">Subject/विषय </label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ $onlineexam->subject }}">
                                @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <!-- Student Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_name">Student Name/प्रवेशार्थी का पूरा नाम</label>
                                <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name" placeholder="Please Enter Name" value="{{ $onlineexam->student_name }}">
                                @error('student_name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Father Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stud_father_name">Father's Name/पिता का नाम</label>
                                <input type="text" class="form-control @error('stud_father_name') is-invalid @enderror" id="stud_father_name" name="stud_father_name" placeholder="Please Enter Father Name" value="{{ $onlineexam->stud_father_name }}">
                                @error('stud_father_name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Father Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stud_mother_name">Mother's Name/माता का नाम</label>
                                <input type="text" class="form-control @error('stud_mother_name') is-invalid @enderror" id="stud_mother_name" name="stud_mother_name" placeholder="Please Enter Mother Name" value="{{$onlineexam->stud_mother_name }}">
                                @error('stud_mother_name')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Mobile No -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_no">Mobile No/मोबाइल नंबर</label>
                                <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" placeholder="Please Enter Mobile No" value="{{ $onlineexam->mobile_no }}">
                                @error('mobile_no')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Mobile No -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adhaar_no">Aadhaar card No/आधार कार्ड सं.</label>
                                <input type="text" class="form-control @error('adhaar_no') is-invalid @enderror" id="adhaar_no" name="adhaar_no" placeholder="Please Enter Mobile No" value="{{ $onlineexam->adhaar_no }}">
                                @error('adhaar_no')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email/ई-मेल</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Please Enter Email" value="{{ $onlineexam->email }}">
                                @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Gender/लिंग</label>
                                <select class="form-control custom-select" name="gender" id="gender" value="{{ old('gender')}}">
                                    <option value="" selected>Select Gender</option>
                                    <option value="male" {{ ($onlineexam->gender == 'male') ? 'selected' : ''}}>Male/पुरुष</option>
                                    <option value="female" {{ ( $onlineexam->female == 'female') ? 'selected' : ''}}>Female/महिला </option>
                                </select>
                                @error('gender')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- DOB -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>DOB/जन्म दिनांक</label>
                                <div class="input-group">
                                    <input class="form-control datepicker @error('dob') is-invalid @enderror" name="dob" placeholder="Select date" type="date" value="{{ $onlineexam->dob }}">
                                    @error('dob')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- nationalilty -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nationalilty">Nationality/राष्ट्रीयता </label>
                                <input type="text" class="form-control @error('nationalilty') is-invalid @enderror" id="nationalilty" name="nationalilty" placeholder="Please Enter Nationality" value="{{ $onlineexam->nationalilty }}">
                                @error('nationalilty')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="" rows="2" placeholder="Please enter Address" class="form-control @error('address') is-invalid @enderror" value="{{ $onlineexam->address }}">{{ $onlineexam->address }}</textarea>
                                @error('short_des')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- location -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State</label>
                                <div class="input-group">
                                    <select class="form-control custom-select" name="state_id" id="state">
                                        <option value="" selected>Select State</option>
                                        @foreach( $locations as $location)
                                        @if(!empty($state->state_id))
                                        <option value="{{ $location->state_id }} " {{ $location->state_id == $state->state_id ? 'selected' : '' }}>{{ $location->state_name }}</option>
                                        @endif
                                        <option value="{{ $location->state_id }}">{{ $location->state_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if(!empty($state->city_id))
                        <input type="hidden" class="form-control" id="city_id" value="{{ $state->city_id }}" />
                        <input type="hidden" class="form-control" id="pincode_id" value="{{ $state->pincode }}" />
                        @endif

                        <!-- city -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <div class="input-group">
                                    <select class="form-control" name="city_id" id="city">
                                        <option value="" selected>Select City</option>
                                    </select>
                                    @error('city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pincode -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pincode</label>
                                <div class="input-group">
                                    <select class="form-control custom-select" name="pincode" id="pincode" value="{{ old('pincode')}}">
                                        <option selected disabled>--Select--</option>
                                    </select>
                                    @error('pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- end location -->
                        <!-- caste -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="caste">Caste </label>
                                <select class="form-control custom-select" name="caste" id="caste" value="{{ old('caste')}}" data-parsley-required-message="Please Select caste" required="">
                                    <option value="" selected>Select Caste</option>
                                    <option value="GEN" {{ ($onlineexam->caste) ? 'selected' : ""}}>GEN</option>
                                    <option value="EWS" {{ ($onlineexam->caste) ? 'selected' : ""}}>EWS </option>
                                    <option value="OBC" {{ ($onlineexam->caste) ? 'selected' : ""}}>OBC </option>
                                    <option value="SC" {{ ($onlineexam->caste) ? 'selected' : ""}}>SC </option>
                                    <option value="ST" {{ ($onlineexam->caste) ? 'selected' : ""}}>ST </option>
                                </select>
                                @error('caste')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Cast certificate -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cast_certificate">Cast Certificate</label>
                                <input type="file" class="form-control" accept="image/*" name="cast_certificate" id="cast_certificate" placeholder="Please Enter OG image" value="{{ $onlineexam->cast_certificate }}">
                                @error('cast_certificate')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Father Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disability_certificate">Disability Certificate/दिव्यांग श्रेणी</label>
                                <select class="form-control custom-select" name="disability_certificate" id="disability_certificate" value="{{ $onlineexam->disability_certificate}}">
                                    <option value="" selected>Select Disability Certificate</option>
                                    <option value="yes" {{ ($onlineexam->disability_certificate == 'yes') ? 'selected' : ''}}>Yes</option>
                                    <option value="no" {{ ($onlineexam->disability_certificate == 'no') ? 'selected' : ''}}>No</option>
                                </select>
                                @error('disability_certificate')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Father Name -->
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="annual_imacome">Annual Income/अभिभावक/ संरक्षक/की वार्षिक आय</label>
                                <input type="text" class="form-control @error('annual_imacome') is-invalid @enderror" id="annual_imacome" name="annual_imacome" placeholder="Please Enter Income" value="{{ $onlineexam->student_father_name }}">
                                @error('annual_imacome')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> -->
                        <!-- Father Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">Payment/राशि</label>
                                <input type="text" class="form-control @error('payment') is-invalid @enderror" id="payment" name="payment" placeholder="Please Enter Payment" value="{{ $onlineexam->payment }}" readonly>
                                @error('payment')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Payment -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">Payment type/राशि श्रेणी</label>
                                <select class="form-control custom-select" name="payment_type" id="payment_type" value="{{ old('payment_type')}}">
                                    <option value="" selected>Select Payment Type</option>
                                    <option value="online" {{ ($onlineexam->payment_type) ? 'selected' : ""}}>Online</option>
                                    <option value="account" {{ ($onlineexam->payment_type) ? 'selected' : ""}}>Account</option>
                                    <option value="offline" {{ ($onlineexam->payment_type) ? 'selected' : ""}}>Offline</option>
                                </select>
                                @error('payment_type')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- date -->
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">date/दिनांक</label>
                                <div class="input-group">
                                    <input class="form-control datepicker @error('date') is-invalid @enderror" name="date" placeholder="Select date" type="date" value="{{ date('Y-m-d') }}">
                                    @error('date')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> -->
                        <!-- photo -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stud_image">Photo</label>
                                <input type="file" class="form-control" accept="image/*" name="stud_image" id="stud_image" value="{{ old('stud_image') }}">
                                @error('stud_image')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- signature -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="signature">Signature/हस्ताक्षर</label>
                                <input type="file" class="form-control" accept="image/*" name="signature" id="signature" placeholder="Please Enter OG image" value="{{ old('signature') }}">
                                @error('signature')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12" style="overflow-x:auto;">
                            <input type="hidden" name="booking_id" id="price">
                            <table id="item_tableroom" class="table table-bordered table-striped">
                                <tr>
                                    <th rowspan="2">उत्तीर्ण परीक्षा </th>
                                    <th rowspan="2">बोर्ड / विश्वविद्यालय का
                                        नाम </th>
                                    <th rowspan="2">उत्तीर्ण करने का वर्ष </th>
                                    <th rowspan="2">विषय </th>
                                    <th colspan="4" style="text-align: center;">योग्यता मे प्राप्त अंकों का विवरण </th>
                                    <th rowspan="2"><button type="button" name="addroom" class="btn btn-success btn-sm addroom"><span class="fas fa-plus"></span></button></th>
                                </tr>
                                <tr>
                                    <th>पूर्णांक </th>
                                    <th>प्राप्तांक </th>
                                    <th>प्रतिशत</th>
                                    <th>श्रेणी </th>
                                </tr>
                                <tbody>
                                    @foreach( $qualoficationdetails as $qualoficationdetail)
                                    @if(!empty($qualoficationdetail))
                                    <tr>
                                        <td><input type="text" class="form-control" name="qualifications[]" id="qualifications" placeholder="" value="{{ $qualoficationdetail->qualifications}}"></td>
                                        <td><input type="text" class="form-control" name="name_of_board_university[]" id="name_of_board_university" placeholder="" value="{{ $qualoficationdetail->qualificationsname_of_board_university}}"></td>
                                        <td><input type="number" class="form-control" name="passing_year[]" id="passing_year" placeholder="" value="{{ $qualoficationdetail->passing_year}}"></td>
                                        <td><input type="text" class="form-control" name="quali_subject[]" id="quali_subject" placeholder="" value="{{ $qualoficationdetail->subject}}"></td>
                                        <td><input type="number" class="form-control" name="marks[]" id="marks" placeholder="" value="{{ $qualoficationdetail->marks}}"></td>
                                        <td><input type="number" class="form-control" name="total_marks[]" id="total_marks" placeholder="" value="{{ $qualoficationdetail->total_marks}}"></td>
                                        <td><input type="number" class="form-control" name="percentage[]" id="percentage" placeholder="" value="{{ $qualoficationdetail->percentage}}"></td>
                                        <td><input type="text" class="form-control" name="grade[]" id="grade" placeholder="" value="{{ $qualoficationdetail->grade}}"></td>
                                        <!-- <td></td> -->
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <h2 class="col-md-12">विद्यावारिधि प्रवेश समिति के उपयोगार्थ</h2>
                        <!-- Date -->
                        <h3 class="col-md-12">आवेदन पत्र में अधोलिखित कमियां पाई गई- </h3>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">1. </label>
                                <input type="text" class="form-control @error('mismatch_form_1') is-invalid @enderror" id="mismatch_form_1" name="mismatch_form_1" value="{{ old('mismatch_form_1') }}">
                                @error('mismatch_form_1')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">2. </label>
                                <input type="text" class="form-control @error('mismatch_form_2') is-invalid @enderror" id="mismatch_form_2" name="mismatch_form_2" value="{{ old('mismatch_form_2') }}">
                                @error('mismatch_form_2')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">3. </label>
                                <input type="text" class="form-control @error('mismatch_form_3') is-invalid @enderror" id="mismatch_form_3" name="mismatch_form_3" value="{{ old('mismatch_form_3') }}">
                                @error('mismatch_form_3')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">4. </label>
                                <input type="text" class="form-control @error('mismatch_form_4') is-invalid @enderror" id="mismatch_form_4" name="mismatch_form_4" value="{{ old('mismatch_form_4') }}">
                                @error('mismatch_form_4')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- signature -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checking_signature_1">1. ह. जाँचकर्ता. </label>
                                <input type="file" class="form-control" accept="image/*" name="checking_signature_1" id="checking_signature_1" placeholder="Please Enter OG image" value="{{ old('checking_signature_1') }}">
                                @error('checking_signature_1')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- signature -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checking_signature_2">2. ह. जाँचकर्ता. </label>
                                <input type="file" class="form-control" accept="image/*" name="checking_signature_2" id="checking_signature_2" placeholder="Please Enter OG image" value="{{ old('checking_signature_2') }}">
                                @error('checking_signature_2')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- signature -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="checking_signature_3">3. ह. जाँचकर्ता. </label>
                                <input type="file" class="form-control" accept="image/*" name="checking_signature_3" id="checking_signature_3" placeholder="Please Enter OG image" value="{{ old('checking_signature_3') }}">
                                @error('checking_signature_3')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @php
                    $date = date("mY");
                    if(!empty($reg->id)){
                    $regid = $reg->id + 1;
                    $reg_no = 'SKVV'.$date.$regid;
                    }else {
                    $reg_no = 'SKVV'.$date.'1';
                    }
                    @endphp
                    <hr>
                    <div class="row">
                        <h2 class="col-md-12">Fees Details</h2>
                        <!-- Recipt No -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">Recipt No./रसीद सं</label>
                                <input type="text" class="form-control @error('recipt_no') is-invalid @enderror" id="recipt_no" name="recipt_no" placeholder="Please Enter Recipt No." value="{{ $reg_no }}">
                                @error('recipt_no')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">Date/दिनांक </label>
                                <input type="date" class="form-control @error('recipt_date') is-invalid @enderror" id="recipt_date" name="recipt_date" placeholder="Please Enter Date" value="{{ date('Y-m-d') }}">
                                @error('recipt_date')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">Amount/ राशि</label>
                                <input type="text" class="form-control @error('recipt_amount') is-invalid @enderror" id="recipt_amount" name="recipt_amount" placeholder="Please Enter Recipt Amount" value="{{ $onlineexam->payment }}" readonly>
                                @error('recipt_amount')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control custom-select" name="status" id="status" value="{{ old('status')}}">
                                    <option value="" selected>Select Status</option>
                                    <option value="Approved" {{ ($onlineexam->status) ? 'selected' : ""}}>Approved</option>
                                    <option value="pending" {{ ($onlineexam->status) ? 'selected' : ""}}>pending</option>
                                </select>
                                @error('status')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('onlineexam') }}" class="btn btn-outline-primary">Cancel</a>
                </div>
            </form>
            <!-- Form end -->
        </div>
    </div>
    @endsection

    @section('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addroom', function() {
                var html = '';
                html += '<tr>';
                html += `<td><input type="text" name="qualifications[]" id="qualifications" class="form-control qualifications" placeholder="" /></td>`;
                html += '<td><input type="text" name="name_of_board_university[]" id="name_of_board_university" class="form-control name_of_board_university" placeholder="" /></td>';
                html += '<td><input type="text" name="passing_year[]" id="passing_year" class="form-control passing_year" placeholder="" /></td>';
                html += '<td><input type="text" name="quali_subject[]" id="quali_subject" class="form-control quali_subject" placeholder="" /></td>';
                html += '<td><input type="number" name="marks[]" id="amount" class="form-control marks" placeholder="" /></td>';
                html += '<td><input type="number" name="total_marks[]" id="amount" class="form-control total_marks" placeholder="" /></td>';
                html += '<td><input type="text" name="percentage[]" id="amount" class="form-control percentage" placeholder="" /></td>';
                html += '<td><input type="text" name="grade[]" id="amount" class="form-control grade" placeholder="" /></td>';
                html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fas fa-minus"></span></button></td></tr>';
                $('#item_tableroom').append(html);
            });

            $(document).on('click', '.remove', function() {
                $(this).closest('tr').remove();
            });

            $('#insert_form').on('submit', function(event) {
                event.preventDefault();
                var error = '';
                var form_data = $(this).serialize();
                if (error == '') {
                    $.ajax({
                        url: "",
                        method: "POST",
                        data: form_data,
                        success: function(data) {
                            if (data == 'ok') {
                                $('#item_tableroom').find("tr:gt(0)").remove();
                                $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
                            }
                        }
                    });
                } else {
                    $('#error').html('<div class="alert alert-danger">' + error + '</div>');
                }
            });
        });
    </script>

    <script type=text/javascript>
        $(document).ready(function() {
            if ($("#state > option:selected").val() != "") {
                var state = $("#state > option:selected").val();
                getCity(state);
            }

            $("body").on("change", "#state", function() {
                var state = $(this).val();
                getCity(state);

            });

            $("body").on("change", "#city", function() {
                var city = $(this).val();
                getPincode(city);

            });
        });

        function getCity(state) {
            var state_id = state;
            $("#city").html('');
            $.ajax({
                url: "{{url('get-city-list')}}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#city").html("<option value=''>Select City</option>");
                    $.each(result.cities, function(key, value) {
                        if ($("#city_id").val() == value.city_id) {
                            $("#city").append('<option selected value="' + value.city_id + '">' + value.city_name + '</option>');
                            getPincode(value.city_id);
                        } else {
                            $("#city").append('<option value="' + value.city_id + '">' + value.city_name + '</option>');
                        }
                    });
                }
            });
        }

        function getPincode(city) {
            var city_id = city;
            $("#pincode").html('');
            $.ajax({
                url: "{{url('get-pincode-list')}}",
                type: "POST",
                data: {
                    city_id: city_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#pincode").html("<option value=''>Select Pincode</option>");
                    $.each(result.pincodes, function(key, value) {
                        if ($("#pincode_id").val() == value.id || $("#pincode_id").val() == value.pincode) {

                            $("#pincode").append('<option selected value="' + value.id + '">' + value.pincode + '</option>');
                        } else {
                            $("#pincode").append('<option value="' + value.id + '">' + value.pincode + '</option>');
                        }
                    });
                }
            });
        }
    </script>

    @endsection