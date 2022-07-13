@php
use App\Models\College;
$colleges = College::where(['status' => 0,'flag' => 0])->with('departments')->get();
@endphp
<div class="bg-top navbar-light">
  <div class="container-fluid">
    <div class="row d-flex align-items-center align-items-stretch">
      <div class="col-lg-4 col-md-12 d-flex align-items-center justify-content-md-center justify-content-sm-center justify-content-center">
        <a class="navbar-brand mr-0" style="width:100%;">
          <img class="logo lazy-load-images web-img" src="{{ asset('frontend/images/skvvnewlogo.png') }}" alt="Shri Kallaji Vedic Vishvavidyalaya">
        </a>
      </div>
      <div class="col-lg-8 col-md-12 d-block">
        <div class="d-flex align-items-center text-center">
          <div class="col-md topper align-items-center pl-0">
            <span class="contact_ref">
            <i class="fa fa-envelope mr-2"></i>skvv.uni@gmail.com
            </span>
          </div>
          <div class="col-md topper align-items-center">
              <span class="contact_ref"><i class="fa fa-phone mr-2"></i>01477 294 394</span>
          </div>
          <div class="col-md topper align-items-center px-0">
            <div class="admission_btn pr-0" >
              <a href="{{ asset('frontend/images/Result 2022.pdf') }}" class="btn btn-primary admission-btn" target="_blank">
                <span>Result</span>
              </a>
            </div>
          </div>
          <div class="col-md topper align-items-center pr-0">
            <div class="admission_btn pr-0" >
              <a href="{{ url('apply')}}" class="btn btn-primary admission-btn">
                <span>Admission</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg sticky-top" id="ftco-navbar" style="background-color: #E9AB17;">
  <div class="d-flex align-items-center w-100 justify-content-between">
    <button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon">
        <i class="fa fa-bars" style="color:#fff; font-size:28px;"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mr-auto">
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="{{ url('/') }}">Home</a>
          </li>
        </div>
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="">Administration
              <i class="fa fa-caret-down ml-1"></i>
            </a>
          </li>
          <div class="menu-content">
            <div class="row m-0">
                  <div class="column">
                    <div class="menu-head">Administration</div>
                    <a href="{{ url('recruitment') }}">Recruitment</a>
                    <a href="{{ url('ugc') }}">UGC</a>
                    <a href="{{ url('act') }}">Act</a>
                    <a href="{{ url('non-teaching/staff') }}">Non-teaching Staff</a>
                  </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="">Academics
              <i class="fa fa-caret-down ml-1"></i>
            </a>
          </li>
          <div class="menu-content">
            <div class="row m-0">
              @foreach($colleges as $college)
              @if(!empty($college->departments) && count($college->departments) > 0)
              <div class="column col-md-3">
                <div class="menu-head">{{ $college->name }}</div>
                @foreach($college->departments as $department)
                <a style="text-transform: capitalize !important;" href="{{ route('front.department',['department' => $department->slug]) }}">{{ strtolower($department->name) }}</a>
                @endforeach
                <div class="dropdown-divider"></div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
        {{-- <div class="mega-menu">
            <li class="menubtn">
              <a class="mega-a" href="">Recruitment
                <i class="fa fa-caret-down ml-1"></i>
              </a>
            </li>
            <div class="menu-content">
              <div class="row m-0">
                <div class="column">
                  <div class="menu-head">ABC-XYZ</div>
                  <a href="#">123</a>
                </div>
              </div>
            </div>
          </div> --}}
        <div class="mega-menu">
          <li class="menubtn"><a class="mega-a" href="">Media<i class="fa fa-caret-down ml-1"></i></a></li>
          <div class="menu-content">
            <div class="row m-0">
              <div class="column">
                <div class="menu-head">SKVV Media</div>
                <a href="{{ url('news-events') }}">News & Events</a>
                {{-- <a href="upcoming_news.html">Upcoming Events</a> --}}
                <a href="{{ route('front.photo.gallery') }}">Photo Gallery</a>
                <a href="{{ route('front.video.gallery') }}">Video Gallery</a>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="mega-menu"> -->
        <!-- <li class="menubtn"><a class="mega-a" href="">Media</a></li> -->
        <!--<li class="dropdown media-drop">-->
        <!--  <a class="text-uppercase font-weight-bold media-drop-btn" data-toggle="dropdown" href="#" style="color: white; font-size: 13px;">Media-->
        <!--    <i class="fa fa-caret-down ml-1"></i></a>-->
        <!--  <ul class="dropdown-menu" style="border: none;border-radius: 0px; margin-top: -5px;">-->
        <!--    <div class="menu-head" style="padding: 5px;">MEDIA</div>-->
        <!--    <li class="media-dropdown"><a href="{{ url('news-events') }}">News & Events</a></li>-->
        <!--    <li class="media-dropdown"><a href="{{ route('front.video.gallery') }}">Video Gallery</a></li>-->
        <!--    <li class="media-dropdown"><a href="{{ route('front.photo.gallery') }}">Photo Gallery</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
        <!-- </div> -->
        <div class="mega-menu">
          <!--<li class="menubtn">-->
          <!--  <a class="mega-a" href="{{url('about-us')}}">About Us-->
          <!--    {{-- <i class="fa fa-caret-down ml-1"></i> --}}-->
          <!--  </a>-->
          <!--</li>-->
          {{-- <div class="menu-content">
              <div class="row m-0">
                <div class="column">
                  <div class="menu-head">ABC-XYZ</div>
                  <a href="{{url('about-us')}}">123</a>
                </div>
            </div>
          </div> --}}
        </div>
  <div class="mega-menu">
    <li class="menubtn">
      <a class="mega-a" href="contact-us">Contact Us
        {{-- <i class="fa fa-caret-down ml-1"></i> --}}
      </a>
    </li>
    {{-- <div class="menu-content">
              <div class="row">
                <div class="column">
                  <div class="menu-head">ABC-XYZ</div>
                  <a href="#">123</a>
                </div>
              </div>
            </div> --}}
  </div>
  <!-- <div class="mega-menu">
    <li class="menubtn">
      <a class="mega-a" href="{{ url('syllabus')}}">Syllabus</a>
    </li>
  </div> -->
  <!-- <div class="mega-menu">
    <li class="menubtn">
      <a class="mega-a" href="">Research
        <i class="fa fa-caret-down ml-1"></i>
      </a>
    </li>
    <div class="menu-content">
      <div class="row">
        <div class="column col-md-11">
          <a href="{{ url('syllabus')}}">Syllabus</a>
        </div>
      </div>
    </div>
  </div> -->
      <div class="mega-menu">
        <li class="menubtn"><a class="mega-a" href="">Research<i class="fa fa-caret-down ml-1"></i></a></li>
        <div class="menu-content">
          <div class="row m-0">
            <div class="column">
                <div class="menu-head">SKVV Media</div>
                <!-- <a href="{{ url('news-events') }}">News & Events</a>
                <a href="{{ route('front.photo.gallery') }}">Photo Gallery</a>
                <a href="{{ route('front.video.gallery') }}">Video Gallery</a> -->
                <a href="{{ asset('frontend/images/Paper-I_English.pdf') }}" target="_blank">English</a>
                <a href="{{ asset('frontend/images/Hindi-20.pdf') }}" target="_blank">Hindi</a>
                <a href="{{ asset('frontend/images/Paper-I_Hindi-00.pdf') }}" target="_blank">Hindi-1</a>
                <a href="{{ asset('frontend/images/SANSKRIT-25.pdf') }}" target="_blank">SANSKRIT</a>
                <a href="{{ asset('frontend/images/Sanskrit Traditional-73.pdf') }}" target="_blank">Sanskrit Traditional</a>
                <a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">Yoga</a>
            </div>
          </div>
      </div>
  </ul>
  </div>
  <ul class="nav navbar-nav navbar-right text-right" id="search-form">
    <li>
      <form action="/action_page.php" style="float: right !important;">
        <input type="text" placeholder="Search.." name="search2" class="search-field">
        <button type="submit" style="border: none; margin-left: -10px; border-radius: 5px; padding: 7px;"><i class="fa fa-search"></i></button>
      </form>
    </li>
  </ul>
  </div>
</nav>