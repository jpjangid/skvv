@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('college.index')}}">College</a></li>
          <li class="breadcrumb-item active" aria-current="page">Update College</li>
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
                <form action="{{ route('college.update',$college->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">

                            <!-- College Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">College Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter College name" value="{{ $college->name }}">
                                    @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $college->email }}">
                                    @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- College Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">College Type</label>
                                    <input type="text" name="type" value="{{ $college->type }}" class="form-control @error('type') is-invalid @enderror" placeholder="Please enter your college type ex: private, public">
                                    @error('type')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Slug Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug-text" placeholder="Please Enter slug" value="{{ $college->slug }}">
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- College Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="college_code">College Code</label>
                                    <input type="text" name="college_code" class="form-control @error('college_code') is-invalid @enderror" placeholder="Please enter your college code" value="{{ $college->college_code}}">
                                    @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label @error('mobile') is-invalid @enderror">Mobile Number</label>
                                    <input class="form-control" name="mobile" type="number" value="{{ $college->mobile }}" id="example-number-input">
                                    @error('mobile')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label @error('phone') is-invalid @enderror">Phone Number</label>
                                    <input class="form-control" name="phone" type="number" value="{{ $college->phone }}" id="example-number-input">
                                    @error('phone')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Profile -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="profile">Choose Image:</label>
                                    <div class="custom-file">
                                        <input type="file" name="profile" class="custom-file-input @error('profile') is-invalid @enderror" id="customFileLang" lang="en">
                                        <label class="custom-file-label" for="customFileLang">{{ $college->profile }}</label>
                                    </div>
                                    @error('profile')
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
                                                    @if(!empty($state->state_id))
                                                    <option  value="{{ $location->state_id }} " {{ $location->state_id == $state->state_id ? 'selected' : '' }}>{{ $location->state_name }}</option> 
                                                    @endif
                                                    <option  value="{{ $location->state_id }}">{{ $location->state_name }}</option> 
                                                @endforeach    
                                        </select>
                                        @error('state_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror  
                                    </div>
                                </div>
                            </div>
                            @if(!empty($state->city_id))
                            <input type="hidden" class="form-control" id="city_id" value="{{ $state->city_id }}"/> 
                            <input type="hidden" class="form-control" id="pincode_id" value="{{ $state->pincode }}"/>
                            @endif

                            <!-- city -->
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" name="pincode" id="pincode" value="{{ old('pincode')}}">
                                            <option selected disabled >--Select--</option>
                                        </select>
                                        @error('pincode')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                                    </div>
                                </div>
                            </div>
                            <!-- end location -->
                        </div>
                        <hr>
                            <!-- Meta section -->
                            <div class="row">
                                <h3 class="col-md-12">Meta Section</h3>
                                <!-- Meta title -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="metaTitle" placeholder="Please Enter Meta title" value="{{ $college->meta_title }}">
                                        @error('meta_title')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>    
                                <!-- Meta title -->
                                <!-- Meta keywords -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Meta Keyword</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="metaKeyword" placeholder="Please Enter Meta keyword" value="{{ $college->meta_keyword }}">
                                        @error('meta_keyword')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>    
                                <!-- Meta keywords -->
                                <!-- Meta description -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Meta Description</label>
                                        <textarea type="text" class="form-control" rows="5" name="meta_description" id="metaDescription" placeholder="Please Enter Meta description">{{ $college->meta_description }}</textarea>
                                    </div>
                                </div>    
                                <!-- Meta description -->
                                
                            </div>
                            <!-- Meta section -->
                            <hr>
                            <!-- Og section -->
                            <div class="row">
                                <h3 class="col-md-12">OG Section</h3>
                                <!-- OG title -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">OG Title</label>
                                        <input type="text" class="form-control" name="og_title" id="ogTitle" placeholder="Please Enter OG title" value="{{ $college->og_title }}">
                                        @error('og_title')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>    
                                <!-- OG title -->
                                <!-- OG Image -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">OG Image</label>
                                        <input type="file" class="form-control" accept="image/*" name="og_image" id="ogImage" placeholder="Please Enter OG image" value="{{ $college->og_image }}">
                                        @error('og_image')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>    
                                <!-- OG Image -->
                                <!-- OG Image Alt -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">OG Image Alt</label>
                                        <input type="text" class="form-control" name="og_image_alt" id="ogImageAlt" placeholder="Please Enter OG image alt" value="{{ $college->og_image_alt }}">
                                        @error('og_image_alt')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>    
                                <!-- OG Image Alt -->
                                <!-- OG description -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">OG Description</label>
                                        <textarea type="text" class="form-control" rows="5" name="og_description" id="ogDescription" placeholder="Please Enter OG description">{{ $college->og_description }}</textarea>
                                    </div>
                                </div>    
                                <!-- OG description -->
                            </div>
                            <!-- Og section -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update College</button>
                        <a href="{{ route('college.index') }}" class="btn btn-outline-primary"> Cancel </a>
                    </div>

                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
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