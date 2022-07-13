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
            <form action="{{ route('faculty.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <option value="{{ $college->id }}" {{ old('college_id') == $college->id ? "selected" : "" }}>{{ $college->name}}</option>
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
                            <input type="text" id="old_department_id" value="{{ old('department_id') }}" hidden>
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
                            <input type="text" id="old_course_id" value="{{ old('course_id')}}" hidden>
                        </div>

                        <!-- Teacher -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="teacher">Teacher</label>
                                <select name="teacher" id="teacher" class="form-control @error('teacher') is-invalid @enderror">
                                    <option value="" selected>Select Teacher</option>
                                    @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}/{{ $teacher->role }}</option>
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
                                    <option value="Dean">Dean</option>
                                    <option value="Professor">Professor</option>
                                    <option value="Assistant Professor">Assistant Professor</option>
                                    <option value="Associate Professor">Associate Professor</option>
                                    <option value="Head teacher">Head teacher</option>
                                    <option value="Assistance teacher">Assistance teacher</option>
                                    <option value="Scholar teacher">Scholar teacher</option>
                                </select>
                                @error('teacher_role')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Qualifications -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="qualifications">Qualifications</label>
                                <input type="text" name="qualifications" value="{{ old('qualifications') }}" class="form-control @error('qualifications') is-invalid @enderror" placeholder="Please Enter Qualifications">
                                @error('qualifications')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Specializations -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specializations">Specializations</label>
                                <input type="text" name="specializations" value="{{ old('specializations') }}" class="form-control @error('specializations') is-invalid @enderror" placeholder="Please Enter Specializations">
                                @error('specializations')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Research Interests -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="research_interests">Research Interests</label>
                                <input type="text" name="research_interests" value="{{ old('research_interests') }}" class="form-control @error('research_interests') is-invalid @enderror" placeholder="Please Enter Research Interests">
                                @error('research_interests')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Research Interests -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="published_books">Published Books</label>
                                <input type="text" name="published_books" value="{{ old('published_books') }}" class="form-control @error('published_books') is-invalid @enderror" placeholder="Please Enter Published Books Number">
                                @error('published_books')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Research Interests -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="office_address">Office Address</label>
                                <textarea name="office_address" value="{{ old('office_address') }}" class="form-control @error('office_address') is-invalid @enderror" placeholder="Please Enter Office Address"></textarea>
                                @error('office_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add Faculty</button>
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
        $(document).on('change', '#college_id', function() {
            department();
        });
        $(document).on('change', '#department_id', function() {
            course();
        });

        function department() {
            var ClgId = $("#college_id > option:selected").val();
            var ClgURL = 'admin/addmissionexam/get-dept/' + ClgId;
            if (ClgId != "") {
                $.ajax({
                    url: `{{ url('${ClgURL}') }}`,
                    type: 'get',
                    data: {
                        'id': ClgId
                    },
                    datatype: 'json',
                    success: function(response) {
                        if (response.data != "") {
                            $('#department_id').empty();
                            $('#department_id').append("<option value=''>Select Department</option>");
                            $.each(response.data, function(index, value) {
                                if (value != null) {
                                    var oldDepartmentId = $('#old_department_id').val();
                                    if (oldDepartmentId != "" && oldDepartmentId == value.id) {
                                        $('#department_id').append("<option value='" + value.id + "' selected>" + value.name + "</option>");
                                    } else {
                                        $('#department_id').append("<option value='" + value.id + "'>" + value.name + "</option>");
                                    }
                                }
                            });
                        } else {
                            $('#department_id').empty();
                            $('#department_id').append("<option value='' selected>No Department Available</option>");
                        }
                    }
                });
            } else {
                $('#department_id').empty();
                $('#department_id').append("<option value='' selected>Select Department</option>");
                $('#course_id').empty();
                $('#course_id').append("<option value='' selected>Select Course</option>");
            }
        }

        function loadDepartmentOnload() {
            var oldDepartmentId = $('#old_department_id').val();
            if (oldDepartmentId != "") {
                department();
            }
            var oldCourseId = $('#old_course_id').val();
            if (oldCourseId != "" && oldDepartmentId != "") {
                oldCourse(oldDepartmentId);
            }
        }

        function oldCourse(oldDepartmentId) {
            var DeptId = oldDepartmentId;
            var DeptURL = 'admin/addmissionexam/get-course/' + DeptId;
            $.ajax({
                url: `{{ url('${DeptURL}') }}`,
                type: 'get',
                data: {
                    'id': DeptId
                },
                datatype: 'json',
                success: function(response) {
                    if (response.data != "") {
                        $('#course_id').empty();
                        $('#course_id').append("<option value=''>Select Course</option>");
                        $.each(response.data, function(index, value) {
                            if (value != null) {
                                var oldCourseId = $('#old_course_id').val();
                                if (oldCourseId != "" && oldCourseId == value.id) {
                                    $('#course_id').append("<option value='" + value.id + "' selected>" + value.name + "</option>");
                                } else {
                                    $('#course_id').append("<option value='" + value.id + "'>" + value.name + "</option>");
                                }
                            }
                        });
                    } else {
                        $('#course_id').empty();
                        $('#course_id').append("<option value='' selected>No Course Available</option>");
                    }
                }
            });
        }


        function course() {
            var DeptId = $("#department_id > option:selected").val();
            var DeptURL = 'admin/addmissionexam/get-course/' + DeptId;
            if (DeptId != "") {
                $.ajax({
                    url: `{{ url('${DeptURL}') }}`,
                    type: 'get',
                    data: {
                        'id': DeptId
                    },
                    datatype: 'json',
                    success: function(response) {
                        if (response.data != "") {
                            $('#course_id').empty();
                            $('#course_id').append("<option value=''>Select Course</option>");
                            $.each(response.data, function(index, value) {
                                if (value != null) {
                                    var oldCourseId = $('#old_course_id').val();
                                    if (oldCourseId != "" && oldCourseId == value.id) {
                                        $('#course_id').append("<option value='" + value.id + "' selected>" + value.name + "</option>");
                                    } else {
                                        $('#course_id').append("<option value='" + value.id + "'>" + value.name + "</option>");
                                    }
                                }
                            });
                        } else {
                            $('#course_id').empty();
                            $('#course_id').append("<option value='' selected>No Course Available</option>");
                        }
                    }
                });
            } else {
                alert("select the Department");
            }
        }
    </script>
    @endsection