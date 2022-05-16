@extends('admin.layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('users.index')}}">Users</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Users</li>
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
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <!-- Username -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Please enter username" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Please enter email address" value="{{ old('email')}}" />
                                    @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Please enter your mobile number" value="{{ old('mobile') }}" />
                                    @error('mobile')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-md">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="Please enter password" value="{{ old('password')}}" />
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-primary"  onclick="myFunction()"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                        </div>
                                        @error('password')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- User Profile -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Choose Image:</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFileLang" lang="en">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                        @error('image')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="line1">Address</label>
                                    <input type="text" class="form-control @error('line1') is-invalid @enderror" id="line1" name="line1" placeholder="Please enter address" value="{{ old('line1') }}">
                                    @error('line1')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address Landmark -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="line2">Landmark (optional)</label>
                                    <input type="text" class="form-control @error('line2') is-invalid @enderror" id="line2" name="line2" placeholder="Please enter landmark, street, etc.(optional)" value="{{ old('line2') }}">
                                    @error('line2')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- DOB -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">DOB</label>
                                    <input class="form-control" name="dob" type="date" value="select DOB" id="example-date-input">
                                </div>
                            </div>

                            <!-- gender -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select  @error('gender') is-invalid @enderror" name="gender" id="gender">
                                            <option value="" selected>Select Gender</option>
                                            <option value="Female">Female</option> 
                                            <option value="Male">Male</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- roles -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>User Role</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select  @error('role') is-invalid @enderror" name="role" id="role">
                                            <option value="" selected>Select User Role</option>
                                                @foreach($roles as $role)
                                                    <option  value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }} >{{ $role->name }}</option> 
                                                @endforeach    
                                        </select>
                                            
                                    </div>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- College -->
                            <div class="" id="collegeAdd">

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

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add User</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Page specific script -->

    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("exampleInputPassword1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script type=text/javascript>
    $(document).ready(function(){
        if ($("#state > option:selected").val() != "") {
        var state = $("#state > option:selected").val();
        getCity(state);
        }

        $("body").on("change", "#role", function () {
            var role = $( "#role option:selected" ).val();
            $.ajax({
                url:"{{url('get-colleges')}}",
                type: "POST",
                data: {
                    role_id: role,
                    _token: '{{csrf_token()}}' 
                },
                dataType : 'json',
                success: function(result){
                    if(result.status === 200){
                        var selectStart = '<label>Colleges</label><select class="js-example-basic-multiple" name="college[]" multiple="multiple"><option value="" selected>Select College</option>';
                        var selectMiddle = [];
                        var selectEnd   = '</select>';
                        var html = '';
                    
                        if(result.colleges != "" && result.colleges.length > 0) {
                            $.each(result.colleges, function (key, value) {
                                    selectMiddle.push('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                            html += selectStart;
                            html += selectMiddle;
                            html += selectEnd;
                            $('#collegeAdd').empty();
                            $('#collegeAdd').attr('class','');
                            $('#collegeAdd').html(html);
                            $('#collegeAdd').attr('class','col-md-4');
                            hello();
                        } else {
                            var selectStart = '<label>Colleges</label><select class="js-example-basic-multiple" name="college[]" multiple="multiple">';
                            var selectMiddle = [];
                            var selectEnd   = '</select>';
                            var html = '';
                            selectMiddle.push('<option value="" selected>  No College Found </option>');
                            $('#collegeAdd').empty();
                            $('#collegeAdd').attr('class','');
                            $('#collegeAdd').html(html);
                            $('#collegeAdd').attr('class','col-md-4');
                        }
                    } else {
                        $('#collegeAdd').empty();
                        $('#collegeAdd').attr('class','');
                    }
                    
                }
            });
        });

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
     
    function hello() {
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    }
    </script>

@endsection