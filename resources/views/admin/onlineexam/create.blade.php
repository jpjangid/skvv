@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('news.index')}}">News</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add News & Events</li>
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
                <form action="{{ url('admin/onlineexam/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <!-- Select addmission -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="addmission">Addmission/प्रवेश पाठ्यक्रम </label>
                                    <input type="text" class="form-control @error('addmission') is-invalid @enderror" name="addmission" id="addmission" value="PHD">
                                    @error('addmission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Select subject -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="subject">Subject/विषय </label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject')}}">
                                    @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Student Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student_name">Student Name/प्रवेशार्थी का पूरा नाम</label>
                                    <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name" placeholder="Please Enter Name" value="{{ old('student_name') }}">
                                    @error('student_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Father Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stud_father_name">Father Name/पिता का नाम</label>
                                    <input type="text" class="form-control @error('stud_father_name') is-invalid @enderror" id="stud_father_name" name="stud_father_name" placeholder="Please Enter Father Name" value="{{ old('stud_father_name') }}">
                                    @error('stud_father_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Father Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stud_mother_name">Mother Name/माता का नाम</label>
                                    <input type="text" class="form-control @error('stud_mother_name') is-invalid @enderror" id="stud_mother_name" name="stud_mother_name" placeholder="Please Enter Mother Name" value="{{ old('student_father_name') }}">
                                    @error('stud_mother_name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Mobile No -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile_no">Mobile No/मोबाइल नंबर</label>
                                    <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" placeholder="Please Enter Mobile No" value="{{ old('student_father_name') }}">
                                    @error('mobile_no')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             <!-- Mobile No -->
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adhaar_no">Adhaar card No/आधार कार्ड सं.</label>
                                    <input type="text" class="form-control @error('adhaar_no') is-invalid @enderror" id="adhaar_no" name="adhaar_no" placeholder="Please Enter Mobile No" value="{{ old('student_father_name') }}">
                                    @error('adhaar_no')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email/ई-मेल</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Please Enter Email" value="{{ old('student_father_name') }}">
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
                                        <input class="form-control datepicker @error('display_date') is-invalid @enderror" name="display_date" placeholder="Select date" type="date" value="{{ date('Y-m-d') }}">
                                        @error('display_date')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- nationalilty -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationalilty">Nationalilty/राष्ट्रीयता </label>
                                    <input type="text" class="form-control @error('nationalilty') is-invalid @enderror" id="nationalilty" name="nationalilty" placeholder="Please Enter Nationalilty" value="{{ old('student_father_name') }}">
                                    @error('nationalilty')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             <!-- Address -->
                             <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="" rows="2" placeholder="Please enter Address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">{{ old('address') }}</textarea>
                                    @error('short_des')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- location -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="state_id" id="state">
                                            <option value="" selected>Select State</option>
                                                @foreach( $locations as $location)
                                                @php
                                                $selected = '';
                                                $selected = old('state_id') == $location->state_id ? 'selected' : '';
                                                @endphp
                                                    <option  value="{{ $location->state_id }}" @php echo $selected; @endphp>{{ $location->state_name }}</option> 
                                                @endforeach    
                                        </select>
                                            
                                    </div>
                                    @error('state_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="city_id" value="{{ old('city_id') }}"/> 
                            <input type="hidden" class="form-control" id="pincode_id" value="{{ old('pincode') }}"/>

                            <!-- city -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <div class="input-group">
                                        <select class="form-control" name="city_id" id="city">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="pincode" id="pincode" value="{{ old('pincode')}}">
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
                            <!-- Cast certificate -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cast_certificate">Cast Certificate</label>
                                    <input type="file" class="form-control" accept="image/*" name="cast_certificate" id="cast_certificate" placeholder="Please Enter OG image" value="{{ old('cast_certificate') }}">
                                    @error('cast_certificate')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <!-- Father Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="disability_certificate">Disability Certificate/दिव्यांग श्रेणी</label>
                                    <select class="form-control custom-select" name="disability_certificate" id="disability_certificate" value="{{ old('disability_certificate')}}">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="annual_imacome">Annual Income/अभिभावक/ संरक्षक/की वार्षिक आय</label>
                                    <input type="text" class="form-control @error('annual_imacome') is-invalid @enderror" id="annual_imacome" name="annual_imacome" placeholder="Please Enter Income" value="{{ old('student_father_name') }}">
                                    @error('annual_imacome')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Father Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payment">Payment/राशि</label>
                                    <input type="text" class="form-control @error('payment') is-invalid @enderror" id="payment" name="payment" placeholder="Please Enter Payment" value="{{ old('payment') }}">
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
                                        <option value="online" {{ old('payment_type') ? 'online' : ""}}>Online</option>
                                        <option value="account" {{ old('payment_type') ? 'account' : ""}}>Account</option>
                                    </select>
                                    @error('payment_type')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payment">date/दिनांक</label>
                                    <div class="input-group">
                                        <input class="form-control datepicker @error('date') is-invalid @enderror" name="date" placeholder="Select date" type="date" value="{{ date('Y-m-d') }}">
                                        @error('date')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
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
                                        <tr>
                                            <td rowspan="2"><input type="text" class="form-control" name="qualifications[]" id="qualifications"  placeholder=""></td>
                                            <td rowspan="2"><input type="text" class="form-control" name="name_of_board_university[]" id="name_of_board_university"  placeholder=""></td>
                                            <td rowspan="2"><input type="text" class="form-control" name="passing_year[]" id="passing_year" placeholder=""></td>
                                            <td rowspan="2"><input type="text" class="form-control" name="quali_subject[]" id="quali_subject"  placeholder=""></td>
                                            <td><input type="number" class="form-control" name="marks[]" id="marks"  placeholder=""></td>
                                            <td><input type="number" class="form-control" name="total_marks[]" id="total_marks"  placeholder=""></td>
                                            <td><input type="text" class="form-control" name="percentage[]" id="percentage"  placeholder=""></td>
                                            <td><input type="text" class="form-control" name="grade[]" id="grade"  placeholder=""></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add News</button>
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
 $(document).on('click', '.addroom', function(){
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
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){ 
  event.preventDefault();
  var error = '';
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_tableroom').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
});
</script>
<script type=text/javascript>
    $(document).ready(function(){
        if ($("#state > option:selected").val() != "") {
        var state = $("#state > option:selected").val();
        getCity(state);
        }

        $("body").on("change", "#state", function () {
            var state = $(this).val();
            getCity(state);

        });

        $("body").on("change", "#city", function () {
            var city = $(this).val();
            getPincode(city);

        });
    });

    function getCity(state) {
        var state_id = state;
        $("#city").html('');
        $.ajax({
            url:"{{url('get-city-list')}}",
            type: "POST",
            data: {
                state_id: state_id,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $("#city").html("<option value=''>Select City</option>");
                $.each(result.cities, function (key, value) {
                    if ($("#city_id").val() == value.city_id) {
                        $("#city").append('<option selected value="'+value.city_id+'">'+value.city_name+'</option>');
                        getPincode(value.city_id);
                    } else {
                        $("#city").append('<option value="'+value.city_id+'">'+value.city_name+'</option>');
                    }
                });
            }
        });
    }

    function getPincode(city) {
        var city_id = city;
        $("#pincode").html('');
        $.ajax({
            url:"{{url('get-pincode-list')}}",
            type: "POST",
            data: {
                city_id: city_id,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(result){
                $("#pincode").html("<option value=''>Select Pincode</option>");
                $.each(result.pincodes, function (key, value) {
                    if ($("#pincode_id").val() == value.id || $("#pincode_id").val() == value.pincode) {
                        
                        $("#pincode").append('<option selected value="'+value.id+'">'+value.pincode+'</option>');
                    } else {
                        $("#pincode").append('<option value="'+value.id+'">'+value.pincode+'</option>');
                    }
                });
            }
        });
    }
    </script>
@endsection
