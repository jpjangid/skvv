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

  #bg_img {
    opacity: 0.3;
  }

  .dept-intro {
    position: absolute;
    bottom: 70px;
  }

  .background_image {
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    text-align: center;
    position: relative;
  }

  @media (max-width:768px) {
    .dept-intro {
      position: relative;
    }
  }

  @media(max-width:576px) {
    .dept-intro {
      top: 10px;
      /* padding: 0 15px 0 0; */
    }

    .background_image img {
      display: none !important;
      width: 320px;
      display: flex;
      margin: auto;
      padding: 190px 0;
    }

    .dept-faculty h2 {
      font-size: 20px;
    }
  }
</style>
@endsection

@section('content')
<section class="dept-profile">
  <div class="container-wrap my-3">
    <div class="row no-gutters">
      <div class="col-md-12">
        <h1 class="text-uppercase section-heading text-center font-weight-bold">{{ $department->name }}</h1>
        <div class="profile_section">
          <div class="container">
            <div class="row m-0 py-4">
              <!-- <div class="col-2"></div> -->
              <div class="col-lg-6 col-md-6 col-12 pb-2">
                <div class="img_content">
                  <div class="row m-0 py-3">
                    <div class="col-lg-5 col-12 d-flex align-items-center">
                      <div class="profile_dashboard">
                        <img src="https://img.freepik.com/premium-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg?w=2000" alt="">
                      </div>
                    </div>
                    <div class="col-lg-7 col-12 d-flex align-items-center">
                      <div class="content">
                        <p class="text-justify">Education is the passport to the future, for tomorrow belongs to those who prepare for it today.</p>
                        <p class="text-right text-warning name_content">FOUNDER AND VICE CHANCELLOR</p>
                        <p class="text-right text-warning m-0 name_content">- Prof. Laxmi Sharma</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-6 col-md-6 col-12 pb-2">
                <div class="img_content">
                  <div class="row m-0 py-3">
                    <div class="col-lg-5 col-12 d-flex align-items-center">
                      <div class="profile_dashboard">
                        <img src="https://img.freepik.com/premium-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg?w=2000" alt="">
                      </div>
                    </div>
                    <div class="col-lg-7 col-12 d-flex align-items-center">
                      <div class="content">
                        <p class="text-justify">Education is the passport to the future, for tomorrow belongs to those who prepare for it today.</p>
                        <p class="text-right text-warning name_content">FOUNDER AND VICE CHANCELLOR</p>
                        <p class="text-right text-warning m-0 name_content">- Prof. Laxmi Sharma</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-2"></div> -->
            </div>
          </div>
        </div>
        <div class="container background_image">
          <img src="/frontend/images/SKVV_Logo.jpg" alt="" id="bg_img">
          <div class="dept-intro text-justify">
            <p>{{ $department->short_des }}</p>
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
        <div class="font-weight-bold text-center my-4">For department works please mail to skvv.uni@gmail.com</div>
        <div class="dept-faculty pb-3">
          <h2 class="slider_heading text-uppercase text-center text-light font-weight-bold">Faculty in Department of {{ $department->name }}</h2>
          <!-- <div id="owl-demo" class="owl-carousel owl-theme pb-3"> -->
          <!-- <div class="item">
              <img src="https://skvv.ac.in/frontend/images/vedic71.jpg" alt="Owl Image">
              <div class="text-center">
                <span class="faculty-name">P. Yogesh Ji Sharma</span>
              </div>
            </div> -->
          <!-- </div> -->
          <div class="row m-0">
            <div class="col-lg-2 col-md-1 col-0"></div>
            @foreach($faculties as $faculty)
            <div class="col-lg-4 col-md-5 col-12">
              <div class="item">
                <div class="profile_img" style="width:200px;height:200px;margin:auto;">
                  <img src="{{ asset('storage/user/'.$faculty->teacher->image)}}" alt="Owl Image" width="100%" height="100%" style="border-radius:10px;">
                </div>
                <div class="text-center">
                  <span class="faculty-name">{{ $faculty->teacher->name}}</span>
                  <br>
                  <span class="faculty-name"><a href="{{ url('teacher',['name' => $faculty->teacher->name]) }}">{{$faculty->teacher_role}}</a></span>
                </div>
              </div>
            </div>
            @endforeach
            <!-- <div class="col-lg-4 col-md-5 col-12">
              <div class="item">
                <div class="profile_img" style="width:200px;height:200px;margin:auto;">
                  <img src="https://skvv.ac.in/frontend/images/vedic71.jpg" alt="Owl Image" width="100%" height="100%" style="border-radius:10px;">
                </div>
                <div class="text-center">
                  <span class="faculty-name">P. Yogesh Ji Sharma</span>
                  <br>
                  <span class="faculty-name">Assistant Prof.</span>
                </div>
              </div>
            </div> -->
            <div class="col-lg-2 col-md-1 col-0"></div>
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
            <div class="col-md-6 my-2 text-center">
              <img src="https://www.mdcnayagarh.org.in/img/courses/cc1.png" alt="">
            </div>
            <div class="col-md-6 my-2 text-capitalize">
              <a href="" style="color: white">
                <div class="dept-course p-3 mb-2">jyotish</div>
              </a>
              <a href="" style="color: white">
                <div class="dept-course p-3 mb-2">agamasastra</div>
              </a>
              <a href="" style="color: white">
                <div class="dept-course p-3 mb-2">dharmasastra</div>
              </a>
              <a href="" style="color: white">
                <div class="dept-course p-3 mb-2">vyakarana</div>
              </a>
              <a href="" style="color: white">
                <div class="dept-course p-3 mb-2">paurohitya</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="dept-profile">
  <div class="container-wrap my-3 dept-faculty">
    <div class="row no-gutters">
      <div class="col-md-12">
        <h2 class="text-uppercase text-center font-weight-bold text-light">Notifications</h2>
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
                  {{ $notification->college->name }} {{ $notification->department->name }} {{ $notification->course->name }} exams from {{ $notification->start_date }} till {{ $notification->start_date }}
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
</section> -->
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
  $(function() {
    $('#demo-form').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    }).on('form:submit', function() {
      $('.submit-button').attr('disabled', true);
    });
  });

  var current = new Date();
  var dd = current.getDate();
  var mm = current.getMonth() + 1;
  var yyyy = current.getFullYear();
  if (dd < 10) {
    dd = '0' + dd;
  }
  if (mm < 10) {
    mm = '0' + mm;
  }
  var today = dd + '-' + mm + '-' + yyyy;
  $(".current-date").text(today);
</script>
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    // margin:10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      600: {
        items: 3,
        nav: true
      },
      1000: {
        items: 4,
        nav: true,
        loop: true
      }
    }
  })
</script>
@endsection