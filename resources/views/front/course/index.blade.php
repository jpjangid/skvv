@extends('front.layouts.app')

@section('title','Department')

@section('content')
<section class="courses-section" style="height: 26rem;">
    <div class="container-fluid my-4">
        <div class="row no gutters">
            <div class="col-md-3">
                <table class="table table-bordered">
                    <thead class="table-heading text-light font-weight-bold table-borderless">
                        <td>{{ $departments->name }}</td>
                    </thead>
                    <tr>
                        <td><a href="{{ route('front.department',['department' => $departments->slug]) }}">About Department</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-9">
                <div class="contact-us-heading">
                    Courses Offered
                </div>
                <table class="table table-bordered">
                    <thead>
                        <td class="font-weight-bold">Course Name</td>
                        <td class="font-weight-bold">Duration</td>
                        <td class="font-weight-bold">Course Type</td>
                        <td class="font-weight-bold">Seats Available</td>
                        <td class="font-weight-bold">Eligibilty</td>
                    </thead>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>
                            @if($course->type_of_year == 1)
                                {{ $course->number_of_year }} Year
                            @endif
                            @if($course->type_of_year == 2)
                                @php
                                  $semester = "";     
                                  $semesters = array('I' => 1,'II' => 2,'III' => 3,'IV' => 4,'V' => 5,'VI' => 6,'VII' => 7,'VIII' => 8,'IX' => 9,'X' => 10);      
                                  $semester = array_search($course->type_of_year,$semesters,true); 
                                @endphp
                                {{ $semester }} Semester
                            @endif
                        </td>
                        <td>{{ strtoupper($course->course_type) }}</td>
                        <td>{{ $course->seats }}</td>
                        <td>{{ $course->eligibility }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection