@php
use App\Models\College;
$colleges = College::where(['status' => 0,'flag' => 0])->with('departments')->get();
@endphp
<div class="bg-top navbar-light">
  <div class="container-fluid">
    <div class="row d-flex align-items-center align-items-stretch">
      <div class="align-items-center">
        <a class="navbar-brand">
          <img class="logo lazy-load-images" src="{{ asset('frontend/images/logo.jpg') }}" alt="">
        </a>
      </div>
      <div class="col-lg d-block">
        <div class="d-flex">
          <div class="col-md topper align-items-center">
            <div class="icon d-flex align-items-center">
              <span>Email</span>
              <span class="fa fa-envelope">
              </span>
            </div>
            <div class="text">
              <span>skvv.uni@gmail.com</span>
            </div>
          </div>
          <div class="col-md topper align-items-center">
            <div class="icon d-flex align-items-center">
              <span>Call</span>
              <span class="fa fa-phone">
              </span>
            </div>
            <div class="text">
              <span>Call Us: 01477 294 394</span>
            </div>
          </div>
          <div class="col-md d-flex topper align-items-center">
            <div class="text">
              <a href="{{ url('apply')}}">
                <span>Addmission <img src="https://webanix.in/new.gif" alt=""></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg sticky-top" id="ftco-navbar" style="background-color: #E9AB17;">
  <div class="d-flex align-items-center px-4">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon">
        <i class="fa fa-bars" style="color:#fff; font-size:28px;"></i>
      </span>
    </button>
    <!--<form action="" class="searchform order-lg-last">-->
    <!--  <div class="form-group d-flex">-->
    <!--    <input type="text" class="form-control pl-3" placeholder="Search">-->
    <!--    <button type="submit" placeholder="" class="form-control search">-->
    <!--      <span class="fa fa-search">-->
    <!--      </span>-->
    <!--    </button>-->
    <!--  </div>-->
    <!--</form>-->
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
              <i class="fa fa-caret-down"></i>
            </a>
          </li>
          <div class="menu-content">
            <div class="row">
              <div class="col-6 column">
                {{-- <div class="menu-head">ABC-XYZ</div> --}}
                <a href="{{ url('recruitment') }}">Recruitment</a>
              </div>
                <div class="col-6 column">
                  {{-- <div class="menu-head">ABC-XYZ</div> --}}
                  <a href="{{ url('non-teaching/staff') }}">Non-teaching Staff</a>
                </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="">Academics
              <i class="fa fa-caret-down"></i>
            </a>
          </li>
          <div class="menu-content">
            <div class="row">
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
                <i class="fa fa-caret-down"></i>
              </a>
            </li>
            <div class="menu-content">
              <div class="row">
                <div class="column">
                  <div class="menu-head">ABC-XYZ</div>
                  <a href="#">123</a>
                </div>
              </div>
            </div>
          </div> --}}
        <div class="mega-menu">
          <li class="menubtn"><a class="mega-a" href="">Media<i class="fa fa-caret-down"></i></a></li>
          <div class="menu-content">
            <div class="row">
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
        <!--    <i class="fa fa-caret-down"></i></a>-->
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
          <!--    {{-- <i class="fa fa-caret-down"></i> --}}-->
          <!--  </a>-->
          <!--</li>-->
          {{-- <div class="menu-content">
              <div class="row">
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
        {{-- <i class="fa fa-caret-down"></i> --}}
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
  {{-- <div class="mega-menu">
            <li class="menubtn">
              <a class="mega-a" href="">Register</a>
            </li>
          </div> --}}
  </ul>
  </div>
  <ul class="nav navbar-nav navbar-right" id="search-form">
    <li>
      <form action="/action_page.php" style="float: right !important;">
        <input type="text" placeholder="Search.." name="search2" class="search-field">
        <button type="submit" style="border: none; margin-left: -10px; border-radius: 5px; padding: 7px;"><i class="fa fa-search"></i></button>
      </form>
    </li>
  </ul>
  </div>
</nav>