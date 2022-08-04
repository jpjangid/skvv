@extends('front.layouts.app')

@section('content')
<!-- Carousel Begin -->
<div id="rv-carousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($sliders as $key => $slider)
    <div class="carousel-item {{ $key === 0 ? "active" : "" }}">
      <img class="lazy-load-images" src="{{ asset('storage/slider/'.$slider->image) }}" alt="{{ $slider->slider_title }}" height="325">
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#rv-carousel" data-slide="prev">
    <span class="carousel-control-prev-icon">
    </span>
  </a>
  <a class="carousel-control-next" href="#rv-carousel" data-slide="next">
    <span class="carousel-control-next-icon">
    </span>
  </a>
</div>
<!-- Carousel End -->
<section class="short-links">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-4 short-column-1 p-3 text-center">
        <a href="{{url('admission')}}" class="short-column-1 anchor_text">
          <i class="fa fa-university icon"></i>
          <br>Online
          <br>Admissions</a>
      </div>
      <div class="col-lg-2 col-4 short-column-2 p-3 text-center">
        <a href="{{ url('university-exams') }}" class="short-column-2 anchor_text">
          <i class="fa fa-edit icon"></i>
          <br>University
          <br>Exams</a>
      </div>
      <div class="col-lg-2 col-4 short-column-1 p-3 text-center">
        <a href="{{ url('courses-offered') }}" class="short-column-1 anchor_text">
          <i class="fa fa-book custom icon"></i>
          <br>Courses
          <br>Offered</a>
      </div>
      <div class="col-lg-2 col-4 short-column-2 p-3 text-center">
        <a href="{{ url('recruitment') }}" class="short-column-2 anchor_text">
          <i class="fa fa-plus icon"></i>
          <br>University
          <br>Recruitment</a>
      </div>
      <div class="col-lg-2 col-4 short-column-1 p-3 text-center">
        <a href="#" class="short-column-1 anchor_text">
          <i class="fa fa-laptop icon"></i>
          <br>Digital
          <br>Notes</a>
      </div>
      <div class="col-lg-2 col-4 short-column-2 p-3 text-center">
        <a href="{{ url('award-achievements') }}" class="short-column-2 anchor_text">
          <i class='fa fa-trophy icon'></i>
          <br>Awards &
          <br>Achievements</a>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-no-pt ftc-no-pb">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-5 py-3 order-md-last wrap-about wrap-about d-flex align-items-stretch">
        <div class="news-section" style="width: 100%">
          <div class="border border-2 border-dark px-4 in-news-section">
            <h2 class="section-heading py-3 font-weight-bold text-uppercase">
              <span class="founder">news </span>&
              <span class="chancellor">events</span>
            </h2>
            <div class="container1 blur">
              @foreach($news as $new)

              @if(!empty($new->link_url))
              <a href="{{ url($new->link_url) }}" target="_blank">

                <ul class="slider">
                  <li>{{ strtolower($new->heading) }}</li>
                  <div class="date">
                    <span>Updated on: 03/08/2022</span>
                  </div>
                  <hr>
                </ul>
              </a>
              @else
              <a href="{{ url('news-events',$new->slug) }}">

                <ul class="slider">
                  <li>{{ strtolower($new->heading) }}</li>
                  <div class="date">
                    <span class="updated-date">Updated on: 03/08/2022</span>
                  </div>
                  <hr>
                </ul>
              </a>
              @endif
              @endforeach
            </div>
            <div class="view-all">
              <button class="view-btn" type="button">View all
                <i class="fa fa-angle-double-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7 py-3 wrap-about pr-md-4 ftco-animate fadeInUp ftco-animated">
        <h2 class="section-heading text-uppercase mb-2 mt-3 font-weight-bold">
          <span class="founder">what</span> we
          <span class="chancellor"> offer</span>
        </h2>
        <p class="section-para">The university has always felt concerned about increasing access of students from various sections of the society to higher education. By providing reservations, financial aids, scholarships and relaxation in qualifications for socially backward classes, the university has registered significant increase in access during last few years. The university aims to achieve its goal of providing higher education to create just, plural and equitable society in consonance with constitutional values.</p>
        <div class="row mt-5">
          <div class="col-lg-6">
            <div class="services-2 d-flex">
              <div class="icon mt-2 d-flex justify-content-center align-items-center">
                <span class="fa fa-check">
                </span>
              </div>
              <div class="text pl-3">
                <h3>Safety First</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="services-2 d-flex">
              <div class="icon mt-2 d-flex justify-content-center align-items-center">
                <span class="fa fa-book">
                </span>
              </div>
              <div class="text pl-3">
                <h3>Regular Classes</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="services-2 d-flex">
              <div class="icon mt-2 d-flex justify-content-center align-items-center">
                <span class="fa fa-book">
                </span>
              </div>
              <div class="text pl-3">
                <h3>Creative Lessons</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="services-2 d-flex">
              <div class="icon mt-2 d-flex justify-content-center align-items-center">
                <span class="fa fa-futbol-o">
                </span>
              </div>
              <div class="text pl-3">
                <h3>Sports Facilities</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-counter img py-3" id="section-counter" style="background-image: url({{ asset('frontend/images/college.png') }}); background-position: 50% 50%;" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row justify-content-center mb-2 pb-2 d-flex">
      <div class="col-md-6 align-items-stretch d-flex pt-4">
        <div class="img img-video d-flex align-items-center" style="background-image:url(https://brandtalks.in/kallajivedic/storage/slider/77d80aeb-bd0f-4d35-b8b7-f1b75c4848881651554820.jpg)">
          <div class="video justify-content-center">
            <a href="https://www.youtube.com/watch?v=FZU77S3UMfY&t=6s" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
              <span class="fa fa-play">
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 fadeInUp ftco-animated">
        <h2 class="mb-3 mt-3">shri kallaji vedic vishvavidyalaya</h2>
        <p class="section-para">Ever since its inception university has been striving to maintain excellence in teaching, research and community service. Great emphasis has been laid in creating scientific temper, maintaining high ethical values and in keeping pace with emerging areas of higher learning. University has ensured overall socio-economic growth of all the sections of society by encouraging greater access and inclusive approach making it most preferred institution for higher education, learning and research.</p>
      </div>
    </div>
    <div class="row d-md-flex align-items-center justify-content-center mb-3">
      <div class="col-lg-12">
        <div class="d-flex align-items-center">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
            <div class="block-18">
              <!-- <div class="icon">
                <span class="flaticon-doctor">
                </span>
              </div> -->
              <div class="text">
                <strong class="number" data-number="18">18</strong>
                <span>Certified Teachers</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
            <div class="block-18">
              <!-- <div class="icon">
                <span class="flaticon-doctor">
                </span>
              </div> -->
              <div class="text">
                <strong class="number" data-number="401">401</strong>
                <span>Students</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
            <div class="block-18">
              <!-- <div class="icon">
                <span class="flaticon-doctor">
                </span>
              </div> -->
              <div class="text">
                <strong class="number" data-number="30">30</strong>
                <span>Courses</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
            <div class="block-18">
              <!-- <div class="icon">
                <span class="flaticon-doctor">
                </span>
              </div> -->
              <div class="text">
                <strong class="number" data-number="50">50</strong>
                <span>Awards Won</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="container vc-info py-4 mt-4">
  <h2 class="text-center text-uppercase font-weight-bold pb-5 mt-0">
    <span class="founder">founder</span> and
    <span class="chancellor"> vice chancellor</span>
  </h2>
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-5">
          <img class="lazy-load-images" width="100%" src="{{ asset('frontend/images/Untitled design.jpg') }}">
        </div>
        <div class="col-md foundertext">
          <p class="text">Education is the passport to the future, for tomorrow belongs to those who prepare for it today.</p>
          <p class="float-right font-weight-bold chancellor">- Prof. Tarashankar Sharma</p>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</section>
<!--<section class="ftco-section my-0 py-5 course-section">-->
<!--  <div class="container-fluid px-4">-->
<!--    <div class="row justify-content-center mb-3 pb-2">-->
<!--      <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">-->
<!--        <h2 class="text-center text-uppercase font-weight-bold pb-5 mt-0">-->
<!--          <span class="founder">our</span> top-->
<!--          <span class="chancellor"> courses</h2>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--    @foreach($topCourses as $topCourse)  -->
<!--      <div class="col-md-3 course ftco-animate fadeInUp ftco-animated border border-2">-->
<!--        <div class="text py-3">-->
<!--          <h3 class="text-center top-department">-->
<!--            {{ $topCourse->name }}-->
<!--          </h3>-->
<!--          <p class="text-justify">{{ $topCourse->short_description }}</p>-->
<!--          <div class="text-center">-->
<!--            <a href="#" class="btn btn-primary">Apply now</a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    @endforeach  -->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->
<section class="ftco-section my-0 py-5 course-section">
  <div class="container-fluid px-4">
    <div class="row justify-content-center mb-3 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
        <h2 class="text-center text-uppercase font-weight-bold pb-5 mt-0"><span class="founder">our</span> top <span class="chancellor">courses</h2>
      </div>
    </div>
    <div class="container">
      <div class="row">
        @foreach($topCourses as $topCourse)
        <div class="col-lg-4 col-md-6 col-12 course ftco-animate fadeInUp ftco-animated">
          <div class="course-border">
            <div class="text py-3 px-2">
              <h3 class="text-center top-department font-weight-bold">
                {{ $topCourse->name }}
              </h3>
              <p class="text-justify">{{ $topCourse->short_description }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- <section class="testimony-section py-4">
  <div class="container">
    <div class="row justify-content-center pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
        <h2 class="text-center text-uppercase font-weight-bold text-light">Alumni speak</h2>
      </div>
    </div>
    <div class="row ftco-animate justify-content-center fadeInUp ftco-animated py-5">
      <div class="col-md-12">
        <div id="alumni-carousel" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators alumni-indicators">
            <li data-target="#alumni-carousel" data-slide-to="0" class="active">
            </li>
            <li data-target="#alumni-carousel" data-slide-to="1">
            </li>
            <li data-target="#alumni-carousel" data-slide-to="2">
            </li>
          </ul>
          <div class="carousel-inner">
            @foreach ($alumnispeaks as $key => $alumnispeak)
            <div class="carousel-item {{ $key === 0 ? "active" : "" }}">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url();">
                    <img src="{{ asset('storage/alumni_image/'.$alumnispeak->alumni_image) }}" alt="">
                  </div>
                  <div class="text ml-2">
                    <p class="section-para">{{ $alumnispeak->description}}</p>
                    <p class="name">{{ $alumnispeak->name}}</p>
                    <span class="position">{{ $alumnispeak->designation}}</span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<section class="ftco-gallery">
  <div class="container-wrap">
    <div class="row justify-content-center my-4 no-gutters">
      <div class="col-md-12 text-center heading-section ftco-animate fadeInUp ftco-animated">
        <h2 class="text-center text-uppercase font-weight-bold">
          <span class="founder">photo</span>
          <span class="chancellor"> gallery</span>
        </h2>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-12 py-5">
        <div id="owl-demo" class="owl-carousel owl-theme">
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/kallaji.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic12.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic23.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic70.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic71.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic72.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic73.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic75.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic76.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic77.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic78.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic79.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic80.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic81.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic82.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic83.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/vedic86.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/Adminstrative Building 1.jpg') }}" alt="Owl Image">
          </div>
          <div class="item">
            <img class="lazy-load-images" src="{{ asset('frontend/images/Adminstrative Building 16.jpg') }}" alt="Owl Image">
          </div>
        </div>
        <!-- Carousel start -->
        <!-- <div id="owl-demo" class="owl-carousel owl-theme pb-3">
          <div class="item">
            <img src="https://skvv.ac.in/frontend/images/vedic71.jpg" alt="Owl Image">
            <div class="text-center">
              <span class="faculty-name">P. Yogesh Ji Sharma</span>
            </div>
          </div>
        </div> -->
        <!-- carousel end -->
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  // $('#reccomended').owlCarousel({
  //       center: true,
  //       items: 2,
  //       loop: true,
  //       margin: 0,
  //       responsive: {
  //           0: {
  //               items: 1
  //           },
  //           600: {
  //               items: 2
  //           },
  //           767: {
  //               items: 2
  //           },
  //           1000: {
  //               items: 3
  //           },
  //           1400: {
  //               items: 4
  //           }
  //       }
  // });
  //   $('.owl-carousel').owlCarousel({
  //       loop:true,
  //       // margin:10,
  //       responsiveClass:true,
  //       responsive:{
  //           0:{
  //               items:1,
  //               nav:true
  //           },
  //           600:{
  //               items:3,
  //               nav:true
  //           },
  //           1000:{
  //               items:4,
  //               nav:true,
  //               loop:true
  //           }
  //       }
  //   })
</script>
@endsection