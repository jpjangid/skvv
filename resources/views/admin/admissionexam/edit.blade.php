@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('addmissionexam.index')}}">Addmission & Exam</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Addmission & Exam</li>
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
                <form action="{{ route('addmissionexam.update',['addmissionexam' => $addimmisionExam->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <!-- Select Category -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="">College</label>
                                    <select class="form-control @error('college') is-invalid @enderror" name="college_id" id="college_id">
                                        <option value="" selected>--Select College--</option> 
                                        @foreach ($colleges as $college)
                                            <option value="{{ $college->id}}" {{ !empty($selectedCollege) && $selectedCollege === $college->id ? "selected" : "" }}>{{ $college->name}}</option> 
                                        @endforeach
                                    </select>
                                    {{-- @error('college_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>
                            </div>
                            <!-- Select Department -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="">Department</label>
                                    <select class="form-control" name="department_id" id="department_id">
                                        <option value="" selected>Select Department</option>
                                    </select>
                                    @error('department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="text" id="old_department_id" value="{{ $addimmisionExam->department_id }}" hidden>
                            </div>

                            <!-- Heading -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <select class="form-control" name="course_id" id="course_id">
                                        <option value="" selected>Select Course</option>
                                    </select>
                                    @error('course_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="text" id="old_course_id" value="{{ $addimmisionExam->course_id }}" hidden>
                            </div>
                            <!-- Slug Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug-text" placeholder="Please Enter slug" value="{{ $addimmisionExam->slug }}">
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Addmission/Exam</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="" selected>--Select Addmission/Exam--</option>
                                        <option value="addmission" {{ $addimmisionExam->type == 'addmission' ? "selected" : "" }}>Addmission</option>
                                        <option value="exam" {{ $addimmisionExam->type == 'exam' ? "selected" : "" }}>Exam</option>
                                    </select>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Document -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pdf">Start Date:</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" placeholder="Please enter Start Date" value="{{ $addimmisionExam->start_date }}">
                                    @error('start_date')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Link -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" placeholder="Please enter End Date" value="{{ $addimmisionExam->end_date }}">
                                    @error('end_date')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                            <!-- Meta section -->
                            <div class="row">
                                <h3 class="col-md-12">Meta Section</h3>
                                <!-- Meta title -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="metaTitle" placeholder="Please Enter Meta title" value="{{ $addimmisionExam->meta_title }}">
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
                                        <input type="text" class="form-control" name="meta_keyword" id="metaKeyword" placeholder="Please Enter Meta keyword" value="{{ $addimmisionExam->meta_keyword }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="meta_description" id="metaDescription" placeholder="Please Enter Meta description">{{ $addimmisionExam->meta_description }}</textarea>
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
                                        <input type="text" class="form-control" name="og_title" id="ogTitle" placeholder="Please Enter OG title" value="{{ $addimmisionExam->og_title }}">
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
                                        <input type="file" class="form-control" accept="image/*" name="og_image" id="ogImage" placeholder="Please Enter OG image" value="{{ $addimmisionExam->og_image }}">
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
                                        <input type="text" class="form-control" name="og_image_alt" id="ogImageAlt" placeholder="Please Enter OG image alt" value="{{ $addimmisionExam->og_image_alt }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="og_description" id="ogDescription" placeholder="Please Enter OG description">{{ $addimmisionExam->og_description }}</textarea>
                                    </div>
                                </div>    
                                <!-- OG description -->
                                
                            </div>
                            <!-- Og section -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('addmissionexam.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
{{-- <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>  --}}
<script>
loadDepartmentOnload();
$(document).on('change','#college_id', function(){
    department();
});
$(document).on('change','#department_id', function(){
    course();
});
   
function department() {
    var ClgId = $("#college_id > option:selected").val();
    var ClgURL = 'admin/addmissionexam/get-dept/'+ClgId;
    if(ClgId != ""){
        $.ajax({
            url: `{{ url('${ClgURL}') }}`,
            type: 'get',
            data:{'id':ClgId },
            datatype: 'json',
            success:function(response){
                if(response.data != ""){
                    $('#department_id').empty();
                    $('#department_id').append("<option value=''>Select Department</option>");
                    $.each(response.data, function(index,value){
                        if(value != null){
                            var oldDepartmentId = $('#old_department_id').val();
                            if(oldDepartmentId != "" && oldDepartmentId == value.id) {
                                $('#department_id').append("<option value='"+value.id+"' selected>"+value.name+"</option>");
                            } else {
                                $('#department_id').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            }
                        }
                    });
                }else{
                    $('#department_id').empty();
                    $('#department_id').append("<option value='' selected>No Department Available</option>");
                }
            }
        });
    }else{
        alert("select the College");
    }
}

function loadDepartmentOnload() {
    var oldDepartmentId = $('#old_department_id').val();
    if(oldDepartmentId != "") {
        department();
    }
    var oldCourseId = $('#old_course_id').val();
    if(oldCourseId != "" && oldDepartmentId != "") {
        oldCourse(oldDepartmentId);
    }
}

function oldCourse(oldDepartmentId) {
    var DeptId = oldDepartmentId;
    var DeptURL = 'admin/addmissionexam/get-course/'+DeptId;
    $.ajax({
            url: `{{ url('${DeptURL}') }}`,
            type: 'get',
            data:{'id':DeptId },
            datatype: 'json',
            success:function(response){
                if(response.data != ""){
                    $('#course_id').empty();
                    $('#course_id').append("<option value=''>Select Course</option>");
                    $.each(response.data, function(index,value){
                        if(value != null){
                            var oldCourseId = $('#old_course_id').val();
                            if(oldCourseId != "" && oldCourseId == value.id) {
                                $('#course_id').append("<option value='"+value.id+"' selected>"+value.name+"</option>");
                            } else {
                                $('#course_id').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            }
                        }
                    });
                }else{
                    $('#course_id').empty();
                    $('#course_id').append("<option value='' selected>No Course Available</option>");
                }
            }
        });
}


function course() {
    var DeptId = $("#department_id > option:selected").val();
    var DeptURL = 'admin/addmissionexam/get-course/'+DeptId;
    if(DeptId != ""){
        $.ajax({
            url: `{{ url('${DeptURL}') }}`,
            type: 'get',
            data:{'id':DeptId },
            datatype: 'json',
            success:function(response){
                if(response.data != ""){
                    $('#course_id').empty();
                    $('#course_id').append("<option value=''>Select Course</option>");
                    $.each(response.data, function(index,value){
                        if(value != null){
                            var oldCourseId = $('#old_course_id').val();
                            if(oldCourseId != "" && oldCourseId == value.id) {
                                $('#course_id').append("<option value='"+value.id+"' selected>"+value.name+"</option>");
                            } else {
                                $('#course_id').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            }
                        }
                    });
                }else{
                    $('#course_id').empty();
                    $('#course_id').append("<option value='' selected>No Course Available</option>");
                }
            }
        });
    }else{
        alert("select the Department");
    }
}
</script>
@endsection
