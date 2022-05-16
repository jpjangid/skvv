@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
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
                <form action="{{ route('course.update',['course' => $course->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">

                            <!-- College Name -->
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="name">College Name</label>
                                    <select name="college" id="college_id" class="form-control @error('college') is-invalid @enderror">
                                    <option value="">Select College</option>
                                    @foreach($colleges as $college)    
                                        <option value="{{ $college->id }}" {{ !empty($selectedCollege) && $selectedCollege === $college->id ? "selected" : "" }}>{{ $college->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Department Name -->
                            <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="name">Department Name</label>
                                        <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                        <option value="">Select Department</option>
                                        @error('department_id')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <input type="text" id="old_department_id" value="{{ $course->department_id }}" hidden>
                                </div>
                            </div>

                            <!-- Course Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Course Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Please Enter Course name" value="{{ $course->name }}">
                                    @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Slug Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug-text" placeholder="Please Enter slug" value="{{ $course->slug }}">
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                           
                            <!-- year or semester -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year_">Course Year / Semester</label>
                                    <select name="type_of_year" id="type_of_year" class="form-control">
                                        <option value="1" {{ $course->type_of_year == 1 ? "selected" : "" }}>Year</option>
                                        <option value="2" {{ $course->type_of_year == 2 ? "selected" : "" }}>Semester</option>
                                    </select>
                                    @error('type_of_year')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- College Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Section Year / Semester</label>
                                    <select name="number_of_year" id="number_of_year" class="form-control">
                                       
                                    </select>
                                    @error('number_of_year')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- @php dd($course->eligibility);  @endphp --}}
                            <!-- Eligibility Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="eligibility">Eligibility</label>
                                    <input type="text" name="eligibility" class="form-control @error('eligibility') is-invalid @enderror" placeholder="Please enter eligibility for course" value="{{ $course->eligibility }}">
                                    @error('eligibility')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Seats Code -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seats">Seats</label>
                                    <input type="number" name="seats" class="form-control @error('seats') is-invalid @enderror" placeholder="Please enter seats for course" value="{{ $course->seats }}">
                                    @error('seats')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Course Type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="courseType">Course Type</label>
                                    <select name="course_type" id="courseType" class="form-control">
                                        <option value="" selected>Select Course Type</option>
                                        <option value="ug" {{ $course->course_type == "ug" ? "selected" : "" }}>UG</option>
                                        <option value="pg" {{ $course->course_type == "pg" ? "selected" : "" }}>PG</option>
                                        <option value="phd" {{ $course->course_type == "phd" ? "selected" : "" }}>PHD</option>
                                    </select>
                                    @error('course_type')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- pdf -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="profile">Attach Document:</label>
                                    <div class="custom-file">
                                        <input type="file" name="pdf" class="custom-file-input @error('pdf') is-invalid @enderror" id="customFileLang" lang="en">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                    </div>
                                    @error('pdf')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if(!empty($course->pdf))
                            <!-- pdf -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="profile">Attach Document uploaded:</label>
                                       <br> 
                                       @php
                                        $file_extension = \File::extension($course->pdf);
                                       @endphp
                                       {{ $course->pdf }} 
                                       <a href="{{ asset('storage/course_images/'.$course->pdf) }}" class="btn btn-success btn-sm ml-3" download><i class="fa fa-download" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            @endif

                            <!-- Short Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short-des">Short Description</label>
                                    <textarea name="short_des" id="short_des" cols="" rows="5" placeholder="Please enter Short Description" class="form-control @error('short_des') is-invalid @enderror">{{ $course->short_description }}</textarea>
                                    @error('short_des')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="" rows="5" placeholder="Please enter Description" class="form-control @error('description') is-invalid @enderror">{{ $course->description }}</textarea>
                                    @error('description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Top Courses -->
                            <div class="col-md-6">
                                <label for="">Top Course</label> :
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" name="top_course" {{ $course->top_course == 1 ? "checked" : "" }}>Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="0" name="top_course" {{ $course->top_course == 0 ? "checked" : "" }}>No
                                    </label>
                                </div>
                                @error('top_course')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Top Courses -->
                            
                        </div>
                        <hr>
                            <!-- Meta section -->
                            <div class="row">
                                <h3 class="col-md-12">Meta Section</h3>
                                <!-- Meta title -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="metaTitle" placeholder="Please Enter Meta title" value="{{ $course->meta_title }}">
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
                                        <input type="text" class="form-control" name="meta_keyword" id="metaKeyword" placeholder="Please Enter Meta keyword" value="{{ $course->meta_keyword }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="meta_description" id="metaDescription" placeholder="Please Enter Meta description">{{ $course->meta_description }}</textarea>
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
                                        <input type="text" class="form-control" name="og_title" id="ogTitle" placeholder="Please Enter OG title" value="{{ $course->og_title }}">
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
                                        <input type="file" class="form-control" accept="image/*" name="og_image" id="ogImage" placeholder="Please Enter OG image" value="{{ $course->og_image }}">
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
                                        <input type="text" class="form-control" name="og_image_alt" id="ogImageAlt" placeholder="Please Enter OG image alt" value="{{ $course->og_image_alt }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="og_description" id="ogDescription" placeholder="Please Enter OG description">{{ $course->og_description }}</textarea>
                                    </div>
                                </div>    
                                <!-- OG description -->
                                
                            </div>
                            <!-- Og section -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Course</button>
                        <a href="{{ route('course.index') }}" class="btn btn-outline-primary"> Cancel </a>
                    </div>

                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
<script>
$(document).on('change','#college_id', function(){
    department();
});
$(document).on('change','#type_of_year', function(){
    yearSemester();
});
loadDepartmentOnload();    
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
}

function yearSemester() {
    let type_of_year = $("#type_of_year > option:selected").val();
    $('#number_of_year').empty();
    if(type_of_year == 1) {
        loadYearContent();
    }
    if(type_of_year == 2) {
        loadSemesterContent();
    }
}

function loadYearContent() {
    let selectedYear = "{{ $course->number_of_year }}";
    let first = selectedYear == 1 ? 'selected' : '';
    let second = selectedYear == 2 ? 'selected' : '';
    let third = selectedYear == 3 ? 'selected' : '';
    let fourth = selectedYear == 4 ? 'selected' : '';
    let fifth = selectedYear == 5 ? 'selected' : '';

    let html = `
                <option value="1" ${first}>1</option>
                <option value="2" ${second}>2</option>
                <option value="3" ${third}>3</option>
                <option value="4" ${fourth}>4</option>
                <option value="5" ${fifth}>5</option>
                `;
    $('#number_of_year').html(html);
}

function loadSemesterContent() {
    let selectedYear = "{{ $course->number_of_year }}";
    let first = selectedYear == 1 ? 'selected' : '';
    let second = selectedYear == 2 ? 'selected' : '';
    let third = selectedYear == 3 ? 'selected' : '';
    let four = selectedYear == 4 ? 'selected' : '';
    let five = selectedYear == 5 ? 'selected' : '';
    let six = selectedYear == 6 ? 'selected' : '';
    let seven = selectedYear == 7 ? 'selected' : '';
    let eight = selectedYear == 8 ? 'selected' : '';
    let nine = selectedYear == 9 ? 'selected' : '';
    let ten = selectedYear == 10 ? 'selected' : '';

    let html = `
                <option value="1" ${first}>I</option>
                <option value="2" ${second}>II</option>
                <option value="3" ${third}>III</option>
                <option value="4" ${four}>IV</option>
                <option value="5" ${five}>V</option>
                <option value="6" ${six}>VI</option>
                <option value="7" ${seven}>VII</option>
                <option value="8" ${eight}>VIII</option>
                <option value="9" ${nine}>IX</option>
                <option value="10" ${ten}>X</option>
                `;
    $('#number_of_year').html(html);
}

yearSemester();

</script>
@endsection
