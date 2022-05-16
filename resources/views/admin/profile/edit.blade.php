@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                <form action="{{ route('profile.admin.update',['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            @if(!empty($user->image))
                            <div class="col-md-12 text-center mb-3">
                                <img src="{{ asset('storage/user/'.$user->image) }}" height="190" width="190" class="rounded" alt="Cinque Terre">
                            </div>
                            @endif
                            <!-- Username -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Please enter username" value="{{ $user->name }}" />
                                    @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Please enter email address" value="{{ $user->email }}" />
                                    @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Please enter your mobile number" value="{{ $user->mobile }}" />
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
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="Please enter password" />
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
                                    <label class="custom-file-label" for="customFileLang"></label>
                                    @error('image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update User</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')

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