@extends('admin.layouts.app')

@section('title','Faculty Create')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('faculty.index')}}">Faculty</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Faculty</li>
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
                <form action="{{ route('faculty.update',['faculty' => $faculty->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <!-- Select College -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="">College</label>
                                    <select class="form-control @error('college') is-invalid @enderror" name="college_id" id="college_id">
                                        <option value="" selected> Select College </option> 
                                        @foreach ($colleges as $college)
                                            <option value="{{ $college->id }}" {{ $faculty->college_id == $college->id ? "selected" : "" }}>{{ $college->name}}</option> 
                                        @endforeach
                                    </select>
                                    @error('college')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Select Department -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="">Department</label>
                                    <select class="form-control @error('department_id') is-invalid @enderror" name="department_id" id="department_id">
                                        <option value="" selected>Select Department</option>
                                    </select>
                                    @error('department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="text" id="old_department_id" value="{{ $faculty->department_id }}" hidden>
                            </div>

                            <!-- Select Course -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <select class="form-control @error('course_id') is-invalid @enderror" name="course_id" id="course_id">
                                        <option value="" selected>Select Course</option>
                                    </select>
                                    @error('course_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="text" id="old_course_id" value="{{ $faculty->course_id }}" hidden>
                            </div>

                            <!-- Teacher -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="teacher">Teacher</label>
                                    <select name="teacher" id="teacher" class="form-control @error('teacher') is-invalid @enderror">
                                        <option value="" selected>Select Teacher</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ $faculty->teacher_id  == $teacher->id ? "selected" : "" }}>{{ $teacher->name }}/{{ $teacher->role }}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Teacher role -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="teacher_role">Teacher role</label>
                                    <select name="teacher_role" id="teacher_role" class="form-control @error('teacher_role') is-invalid @enderror">
                                        <option value="" selected>Select Teacher role</option>
                                        <option value="1" {{ $faculty->teacher_role == Professor ? "Selected" : "" }}>Professor</option>
                                        <option value="2" {{ $faculty->teacher_role == Dean ? "Selected" : "" }}>Dean</option>
                                        <option value="3" {{ $faculty->teacher_role == Head teacher ? "Selected" : "" }}>Head teacher</option>
                                        <option value="4" {{ $faculty->teacher_role == Assistance teacher ? "Selected" : "" }}>Assistance teacher</option>
                                        <option value="5" {{ $faculty->teacher_role == Scholar teacher ? "Selected" : "" }}>Scholar teacher</option>
                                    </select>
                                    @error('teacher_role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            

                        </div>
                        <hr>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Faculty</button>
                        <a href="{{ route('faculty.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection


@section('js')
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
        $('#department_id').empty();
        $('#department_id').append("<option value='' selected>Select Department</option>");
        $('#course_id').empty();
        $('#course_id').append("<option value='' selected>Select Course</option>");
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
