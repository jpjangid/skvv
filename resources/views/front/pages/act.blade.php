@extends('front.layouts.app')

@section('title','Act')

@section('content')
<section class="media-section">
    <div class="container-fluid my-4">
        <div class="row no gutters">
            <div class="col-md-3">
                <table class="table table-bordered">
                    <thead class="table-heading text-light font-weight-bold table-borderless">
                        <td>Administration</td>
                    </thead>
                    <tr>
                        <td class="active-td"><a href="{{ url('recruitment') }}">Recruitment</a></td>
                    </tr>
                    
                    <tr>
                        <td><a href="{{ url('non-teaching/staff') }}">Non-teaching Staff</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ url('act') }}">Act</a></td>
                    </tr>
                   
                </table>
            </div>
            <div class="col-md-9">
                <div class="contact-us-heading">
                    Act
                </div>
                <div class="container form">
                  <div class="row py-2">
                  
                    <div class="col-md-4">
                      <div style="background-color: white;">
                       
                        <div class="video-heading text-center"></div>
                        <div>
                            <!-- <button type="button" class="btn btn-primary">Act_University Pdf</button> -->
                        <a href="{{ asset('storage/course_images/ACT_university.pdf') }}">Act_University Pdf</a>
                    </div>
                      </div>
                    </div>
                  
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection