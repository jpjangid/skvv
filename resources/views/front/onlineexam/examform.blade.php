@extends('front.layouts.app')

@section('title','Admission Form')

@section('css')
<style>
    li.parsley-required {
        color: red;
    }

    li.parsley-minlength {
        color: red;
    }

    li.parsley-maxlength {
        color: red;
    }

    ul.parsley-errors-list li.parsley-required {
        color: red !important;
    }

    html {
        overflow-x: hidden;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection

@section('content')
<section class="contact-us-section">
    <div class="container-fluid my-4">
        <div class="row no gutters">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="contact-us-heading">Admission Form</div>
                <div class="container">
                    <div class="contact-us-content mt-3">
                        <div class="enquiry-form">
                            <!-- <div class="font-weight-bold text-uppercase mb-3">Enquiry Form</div> -->
                            <div class="clearfix">
                            </div>
                            <div class="form py-3 px-4 mr-">
                                <form action="{{ url('apply/store') }}" method="post" id="demo-form" data-parsley-validate="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Select addmission -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addmission">Admission/प्रवेश पाठ्यक्रम </label>
                                                <select class="form-control custom-select" name="addmission" id="addmission" value="{{ old('addmission')}}" data-parsley-required-message="Please Select addmission" required="">
                                                    <option value="" selected>Select Admission</option>
                                                    <option value="Ph.D" {{ old('addmission') ? 'Ph.D' : ""}}>Ph.D</option>
                                                    <option value="M.A." {{ old('addmission') ? 'M.A.' : ""}}>M.A. </option>
                                                    <option value="B.A." {{ old('addmission') ? 'B.A.' : ""}}>B.A. </option>
                                                    <option value="ACHARYA" {{ old('addmission') ? 'ACHARYA' : ""}}>ACHARYA </option>
                                                    <option value="SHASTRI" {{ old('addmission') ? 'SHASTRI' : ""}}>SHASTRI </option>
                                                    <option value="DIPLOMA" {{ old('addmission') ? 'DIPLOMA' : ""}}>DIPLOMA </option>
                                                    <option value="PG DIPLOMA" {{ old('addmission') ? 'PG DIPLOMA' : ""}}>PG DIPLOMA </option>
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
                                                    <option value="1st year" {{ old('addmission_year') ? '1st year' : ""}}>1st Year</option>
                                                    <option value="2nd year" {{ old('addmission_year') ? '2nd year' : ""}}>2nd Year </option>
                                                    <option value="3rd year" {{ old('addmission_year') ? '3rd year' : ""}}>3rd Year </option>
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
                                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject')}}" data-parsley-required-message="Please Enter Subject" required="">
                                                @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Student Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="student_name">Student Name/प्रवेशार्थी का पूरा नाम</label>
                                                <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name" data-parsley-required-message="Please Enter Name" required="" placeholder="Please Enter Name" value="{{ old('student_name') }}">
                                                @error('student_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="stud_father_name">Father Name/पिता का नाम</label>
                                                <input type="text" class="form-control @error('stud_father_name') is-invalid @enderror" id="stud_father_name" name="stud_father_name" placeholder="Please Enter Father Name" value="{{ old('stud_father_name') }}" data-parsley-required-message="Please Enter Father Name" required="">
                                                @error('stud_father_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="stud_mother_name">Mother Name/माता का नाम</label>
                                                <input type="text" class="form-control @error('stud_mother_name') is-invalid @enderror" id="stud_mother_name" name="stud_mother_name" placeholder="Please Enter Mother Name" value="{{ old('student_father_name') }}" data-parsley-required-message="Please Enter Mother Name" required="">
                                                @error('stud_mother_name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Mobile No -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile_no">Mobile No/मोबाइल नंबर</label>
                                                <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" placeholder="Please Enter Mobile No" value="{{ old('student_father_name') }}" data-parsley-required-message="Please Enter Mobile No" required="">
                                                @error('mobile_no')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Mobile No -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="adhaar_no">Adhaar card No/आधार कार्ड सं.</label>
                                                <input type="text" class="form-control @error('adhaar_no') is-invalid @enderror" id="adhaar_no" name="adhaar_no" placeholder="Please Enter Adhaar No" value="{{ old('student_father_name') }}">
                                                @error('adhaar_no')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email/ई-मेल</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Please Enter Email" value="{{ old('student_father_name') }}" data-parsley-required-message="Please Enter Email" required="">
                                                @error('email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Gender -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender/लिंग</label>
                                                <select class="form-control custom-select" name="gender" id="gender" value="{{ old('gender')}}" data-parsley-required-message="Please Select Gender" required="">
                                                    <option value="" selected>Select Gender</option>
                                                    <option value="male" {{ old('gender') ? 'male' : ""}}>Male/पुरुष</option>
                                                    <option value="female" {{ old('gender') ? 'female' : ""}}>Female/महिला </option>
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
                                                    <input class="form-control datepicker @error('dob') is-invalid @enderror" name="dob" placeholder="Select date" type="date" value="{{ old('dob') }}" data-parsley-required-message="Please Enter Date Of Birth" required="">
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
                                                <input type="text" class="form-control @error('nationalilty') is-invalid @enderror" id="nationalilty" name="nationalilty" placeholder="Please Enter Nationality" value="{{ old('nationalilty') }}" data-parsley-required-message="Please Enter Nationalilty" required="">
                                                @error('nationalilty')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Address -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea name="address" id="address" cols="" rows="2" placeholder="Please enter Address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" data-parsley-required-message="Please Enter Address" required="">{{ old('address') }}</textarea>
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
                                                    <select class="form-control custom-select" name="state_id" id="state" data-parsley-required-message="Please Select State" required="">
                                                        <option value="" selected>Select State</option>
                                                        @foreach( $locations as $location)
                                                        @php
                                                        $selected = '';
                                                        $selected = old('state_id') == $location->state_id ? 'selected' : '';
                                                        @endphp
                                                        <option value="{{ $location->state_id }}" @php echo $selected; @endphp>{{ $location->state_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                @error('state_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" class="form-control" id="city_id" value="{{ old('city_id') }}" />
                                        <input type="hidden" class="form-control" id="pincode_id" value="{{ old('pincode') }}" />

                                        <!-- city -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="city_id" id="city" data-parsley-required-message="Please Select City" required="">
                                                        <option value="" selected>Select City</option>
                                                    </select>
                                                </div>
                                                @error('city_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="hidden" id="city_id" value="{{ old('city_id') }}">
                                            </div>
                                        </div>

                                        <!-- pincode -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pincode</label>
                                                <div class="input-group">
                                                    <select class="form-control custom-select" name="pincode" id="pincode" value="{{ old('pincode')}}" data-parsley-required-message="Please Select Pincode" required="">
                                                        <option value="" selected>Select Pincode</option>
                                                    </select>
                                                </div>
                                                @error('pincode')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="hidden" id="pincode_id" value="{{ old('pincode') }}">
                                            </div>
                                        </div>
                                        <!-- end location -->
                                        <!-- YEAR -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="caste">Caste </label>
                                                <select class="form-control custom-select" name="caste" id="caste" value="{{ old('caste')}}" data-parsley-required-message="Please Select caste" required="">
                                                    <option value="" selected>Select Caste</option>
                                                    <option value="GEN" {{ old('caste') ? 'GEN' : ""}}>GEN</option>
                                                    <option value="EWS" {{ old('caste') ? 'EWS' : ""}}>EWS </option>
                                                    <option value="OBC" {{ old('caste') ? 'OBC' : ""}}>OBC </option>
                                                    <option value="SC" {{ old('caste') ? 'SC' : ""}}>SC </option>
                                                    <option value="ST" {{ old('caste') ? 'ST' : ""}}>ST </option>
                                                </select>
                                                @error('caste')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Cast certificate -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cast_certificate">Caste Certificate</label>
                                                <input type="file" class="form-control" accept="image/*" name="cast_certificate" id="cast_certificate" value="{{ old('cast_certificate') }}">
                                                @error('cast_certificate')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="disability_certificate">Disability Certificate/दिव्यांग श्रेणी</label>
                                                <select class="form-control custom-select" name="disability_certificate" id="disability_certificate" value="{{ old('disability_certificate')}}" data-parsley-required-message="Please Select Disability Certificate" required="">
                                                    <option value="" selected>Select Disability Certificate</option>
                                                    <option value="yes" {{ old('disability_certificate') ? 'yes' : ""}}>Yes</option>
                                                    <option value="no" {{ old('disability_certificate') ? 'no' : ""}}>No</option>
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
                                                <input type="text" class="form-control @error('annual_imacome') is-invalid @enderror" id="annual_imacome" name="annual_imacome" placeholder="Please Enter Income" value="{{ old('student_father_name') }}" ata-parsley-required-message="Please Enter Anual Income" required="">
                                                @error('annual_imacome')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> -->
                                        <!-- Father Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="payment">Payment/राशि</label>
                                                <input type="text" class="form-control @error('payment') is-invalid @enderror" id="payment" name="payment" placeholder="Please Enter Payment" value="{{ 100 }}" ata-parsley-required-message="Please Enter payment" required="" readonly>
                                                @error('payment')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Payment -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="payment">Payment type/राशि श्रेणी</label>
                                                <select class="form-control custom-select" name="payment_type" id="payment_type" value="{{ old('payment_type')}}" ata-parsley-required-message="Please Select Payment Mode" required="">
                                                    <option value="" selected>Select Payment Type</option>
                                                    <option value="online" {{ old('payment_type') ? 'online' : ""}}>Online</option>
                                                    <option value="account" {{ old('payment_type') ? 'account' : ""}}>Account</option>
                                                    <option value="offline" {{ old('payment_type') ? 'offline' : ""}}>Offline</option>
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
                                        <!-- signature -->
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
                                                <input type="file" class="form-control" accept="image/*" name="signature" id="signature" value="{{ old('signature') }}">
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
                                                    <tr>
                                                        <td rowspan="2"><input type="text" class="form-control" name="qualifications[]" id="qualifications"></td>
                                                        <td rowspan="2"><input type="text" class="form-control" name="name_of_board_university[]" id="name_of_board_university"></td>
                                                        <td rowspan="2"><input type="text" class="form-control" name="passing_year[]" id="passing_year"></td>
                                                        <td rowspan="2"><input type="text" class="form-control" name="quali_subject[]" id="quali_subject"></td>
                                                        <td><input type="number" class="form-control" name="marks[]" id="marks"></td>
                                                        <td><input type="number" class="form-control" name="total_marks[]" id="total_marks"></td>
                                                        <td><input type="text" class="form-control" name="percentage[]" id="percentage"></td>
                                                        <td><input type="text" class="form-control" name="grade[]" id="grade"></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <input class="btn btn-primary" type="submit" value="Submit" id="contactButton">
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <div class="col md-12 mt-4">
                                        <div class="address"><strong>
                                                <p>(1)आवेदन पत्र में दी गयी समस्त सूचनाएं जहां तक मेरी जानकारी है, सही है तथा कुछ भी तथ्य छिपाया नहीं गया है। यदि मैं प्रवेश अर्हता को पूरा नहीं करता/करती हूँ तथा मेरे द्वारा कोई सूचना गलत पाई जाती है तो मेरा प्रवेश रद्द किया जा सकता है।</p>
                                                <P> (2)राजस्थान संपत्ति विरूपण निवारण अधिनियम 2006 के अंतर्गत यदि मै विश्वविद्यालय की संपत्ति को विरूपित/नुकसान करता हूँ/करती हूँ तो मेरे विरुद्ध नियमानुसार कार्यवाही की जा सकेगी तथा मै अथवा मेरे अभिभावक क्षतिपूर्ति के लिए बाध्य होंगे। </P>
                                                <P>(3)माननीय सर्वोच्च न्यायालय के आदेशानुसार मैं विश्वविद्यालय में किसी प्रकार की रैगिंग एवं अवांछित गतिविधियो में सम्मिलित नहीं होऊंगा/होउंगी ।
                                                </P>
                                            </strong></div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col md-4 mt-4">
                                        <div class="address"><strong>ACCOUNT Details </strong></div><br>
                                        <div class="address"><strong>ACCOUNT NO: 668601702083</strong></div>
                                        <div class="address"><strong>AIFSC: ICIC0006686</strong></div>
                                        <div class="address"><strong>Shri Kallaji Vedic Vishvavidyalaya</strong></div>
                                    </div>
                                    <div class="col md-4">
                                        <img src="{{ asset('rv/WhatsApp Image 2022-05-21 at 3.16.08 PM.jpeg')}}" alt="" width="250px" ; height="250px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(function() {
        $('#demo-form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        }).on('form:submit', function() {
            $('.submit-button').attr('disabled', true);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.addroom', function() {
            var html = '';
            html += '<tr>';
            html += `<td><input type="text" name="qualifications[]" id="qualifications" class="form-control qualifications" /></td>`;
            html += '<td><input type="text" name="name_of_board_university[]" id="name_of_board_university" class="form-control name_of_board_university" /></td>';
            html += '<td><input type="text" name="passing_year[]" id="passing_year" class="form-control passing_year" /></td>';
            html += '<td><input type="text" name="quali_subject[]" id="quali_subject" class="form-control quali_subject" /></td>';
            html += '<td><input type="number" name="marks[]" id="amount" class="form-control marks" /></td>';
            html += '<td><input type="number" name="total_marks[]" id="amount" class="form-control total_marks" /></td>';
            html += '<td><input type="text" name="percentage[]" id="amount" class="form-control percentage" /></td>';
            html += '<td><input type="text" name="grade[]" id="amount" class="form-control grade" /></td>';
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