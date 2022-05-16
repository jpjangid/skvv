@extends('front.layouts.app')

@section('title','Department')

@section('css')
<style>
  li.parsley-required {
      color: red;
  }
  li.parsley-minlength {
    color: red;
  }
  li.parsley-maxlength {
    color: red;
  }
  ul.parsley-errors-list li.parsley-required {
    color: red !important;
  }
  html {
  overflow-x: hidden;
}
</style>
@endsection

@section('content')
<section class="dept-profile">
  <div class="container-wrap my-3">
    <div class="row no-gutters">
      <div class="col-md-12">
        <div class="container">
          <h1 class="text-uppercase section-heading text-center font-weight-bold">{{ $department->name }}</h1>
            <div class="dept-intro text-justify">
             <p>{{ $department->description }}</p>
            </div>
            <div class="font-weight-bold text-center my-4">For department works please mail to skvv.uni@gmail.com</div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="dept-profile">
  <div class="container-wrap my-3">
    <div class="row no-gutters">
      <div class="col-md-12">
        <div class="dept-faculty">
          <h2 class="text-uppercase text-center text-light font-weight-bold pb-3">Faculty in Department of CS & IT</h2>
          <div id="owl-demo" class="owl-carousel owl-theme">
            <!--<div class="item pl-4">-->
            <!--  <img src="{{ asset('frontend/images/pic-1.jpg') }}" alt="Owl Image" style="width: 60%; border-radius: 10%;">-->
            <!--  <span class="faculty-name">abcdef</span>-->
            <!--</div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="dept-profile">
  <div class="container-wrap my-3">
    <div class="row no-gutters">
      <div class="col-md-12">
          <h2 class="text-uppercase text-center font-weight-bold">Courses Offered</h2>
          <div class="container courses-offered">
            <div class="row">
              <div class="col-md-6 my-2">
                @foreach($courses as $course)
                <a href={{ route('front.course',['department' => $course->department->slug]) }} style="color: white">
                  <div class="dept-course p-3 mb-2">{{ $course->name }}</div>
                </a>  
                @endforeach
              </div>
              <div class="col-md-6 my-2">
                <img src="./images/courses.jpg" alt="" width="91%">
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>  

<section class="dept-profile">
  <div class="container-wrap my-3 dept-faculty">
    <div class="row no-gutters">
      <div class="col-md-12">
        <h2 class="text-uppercase text-center font-weight-bold text-light pb-3">Notifications</h2>
      </div>
    </div>
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-12">
          <div class="row">
          @foreach($notifications as $notification)  
            <div class="col-md-3" style="padding: 2px 2px 10px 2px;">
              <div class="col-md-12" style="background-color: #f0f0f09c;">
                <span style="color: black;">
                  {{ $notification->college->name }} {{ $notification->department->name }}  {{ $notification->course->name }} exams from {{ $notification->start_date }}  till {{ $notification->start_date }}                                  
                </span>
              </div>
              <div class="col-md-12" style="background-color: white !important;">
                <p class="current-date float-right">{{ $notification->created_date }}</p>
              </div>
            </div>
          @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(function () {
      $('#demo-form').parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
      }).on('form:submit', function() {
        $('.submit-button').attr('disabled',true);    
      });
    });

    var current = new Date();
    var dd = current.getDate();
    var mm = current.getMonth() + 1;
    var yyyy = current.getFullYear();  
    if (dd < 10) 
    {
        dd = '0' + dd;
    }
    if (mm < 10) 
    {
        mm = '0' + mm;
    }
    var today = dd + '-' + mm + '-' + yyyy;
    $(".current-date").text(today);
</script>    
@endsection