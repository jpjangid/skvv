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
        <div class="d-flex align-items-center text-left">
          <div class="col-md topper align-items-center pl-0">
            <span class="contact_ref">
              <i class="fa fa-envelope mr-2"></i>skvv.uni@gmail.com <br>
              <span class="contact_ref"><i class="fa fa-phone mr-2"></i>01477 294 394</span>
            </span>
          </div>
          <!-- <div class="col-md topper align-items-center">
            <span class="contact_ref"><i class="fa fa-phone mr-2"></i>01477 294 394</span>
          </div> -->
          <div class="col-md topper align-items-center px-0">
            <div class="admission_btn pr-0">
              <a href="{{ asset('frontend/images/Result 2022.pdf') }}" class="btn btn-primary admission-btn" target="_blank">
                <span>Result</span>
              </a>
            </div>
          </div>
          <div class="col-md topper align-items-center pr-0">
            <div class="admission_btn pr-0">
              <a href="{{ url('apply')}}" class="btn btn-primary admission-btn">
                <span>Admission</span>
              </a>
            </div>
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
            <a class="mega-a" href="{{ url('/') }}">Home
              <i class="fa fa-caret-down ml-1"></i>
            </a>
          </li>
          <div class="menu-content">
            <div class="row m-0">
              <div class="column">
                <a href="{{ url('coming-soon') }}">Home/History and Origin</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="">About Us
              <i class="fa fa-caret-down ml-1"></i>
            </a>
          </li>
          <div class="menu-content">
            <div class="row m-0">
              <div class="column">
                <a href="{{ url('coming-soon') }}">Our Moto</a>
                <a href="{{ url('coming-soon') }}">About the Logo</a>
                <a href="{{ url('act') }}">Gazette Notification(Act)</a>
                <a href="{{ url('coming-soon') }}">Campus</a>
                <a href="{{ url('ugc') }}">Affiliation</a>
                <a href="{{ url('coming-soon') }}">Annual Report</a>
                <a href="{{ url('coming-soon') }}">Recognition</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="">Bodies & Committees
              <i class="fa fa-caret-down ml-1"></i>
            </a>
          </li>
          <div class="menu-content">
            <div class="row m-0">
              <div class="column">
                <a href="{{ url('coming-soon') }}">Board of Management</a>
                <a href="{{ url('coming-soon') }}">Academic Council</a>
                <a href="{{ url('coming-soon') }}">Finance Committee</a>
                <a href="{{ url('coming-soon') }}">Research Board</a>
                <a href="{{ url('coming-soon') }}">Library Committee</a>
                <a href="{{ url('coming-soon') }}">Sports Committee</a>
                <a href="{{ url('coming-soon') }}">Admission Committee (UG/PG)</a>
                <a href="{{ url('coming-soon') }}">Board of Studies</a>
              </div>
            </div>
          </div>
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
                <a href="{{ url('coming-soon') }}">Chairman</a>
                <a href="{{ url('coming-soon') }}">President</a>
                <a href="{{ url('coming-soon') }}">Resistrar</a>
                <a href="{{ url('coming-soon') }}">Finance Officer</a>
                <a href="{{ url('coming-soon') }}">Controller of Examination</a>
                <a href="{{ url('coming-soon') }}">Chief Librarian</a>
                <a href="{{ url('coming-soon') }}">Director</a>
                <a href="{{ url('coming-soon') }}">Assistant Resigtrar</a>
                <a href="{{ url('non-teaching/staff') }}">Non Teaching Staff</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="">Faculties & Departments
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
        <div class="mega-menu">
          <li class="menubtn"><a class="mega-a" href="">Students Corner<i class="fa fa-caret-down ml-1"></i></a></li>
          <div class="menu-content">
            <div class="row m-0">
              <div class="column">
                <a href="{{ url('coming-soon') }}">Courses Offer</a>
                <a href="{{ url('coming-soon') }}">Syllabus & Prospectus</a>
                <a href="{{ url('coming-soon') }}">Academic Calendar</a>
                <a href="{{ url('coming-soon') }}">Student Admission</a>
                <a href="{{ url('coming-soon') }}">Examinations</a>
                <a href="{{ url('coming-soon') }}">Results</a>
                <a href="{{ url('coming-soon') }}">Student's Notice Board</a>
                <a href="{{ url('coming-soon') }}">Services(TC/CC/MC/ID/Library Card/Insurance etc.)</a>
                <a href="{{ url('coming-soon') }}">Hostel</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
        </div>
        <div class="mega-menu">
          <li class="menubtn"><a class="mega-a" href="">Research<i class="fa fa-caret-down ml-1"></i></a></li>
          <div class="menu-content">
            <div class="row m-0">
              <div class="column">
                <a href="{{ asset('frontend/images/Paper-I_English.pdf') }}" target="_blank">Maharshi Bharadvaja Anusandhana Kendra</a>
                <a href="{{ asset('frontend/images/Hindi-20.pdf') }}" target="_blank">Vidhyavaridhi(Ph.D.) & Vidyavacaspati(D.Lit.)</a>
                <a href="{{ asset('frontend/images/Paper-I_Hindi-00.pdf') }}" target="_blank">Publication Committee</a>
                <a href="{{ asset('frontend/images/SANSKRIT-25.pdf') }}" target="_blank">List of Pulications</a>
                <a href="{{ asset('frontend/images/Sanskrit Traditional-73.pdf') }}" target="_blank">Ongoing Projects</a>
                <a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">Completed Projects</a>
                <a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">University Journal</a>
                <a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">Referesher Courses</a>
                <a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">Seminars</a>
                <a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">Workshops</a>
                <a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">Public Letcures</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
          <li class="menubtn"><a class="mega-a" href="">Media<i class="fa fa-caret-down ml-1"></i></a></li>
          <div class="menu-content">
            <div class="row m-0">
              <div class="column">
                <!-- <div class="menu-head">SKVV Media</div> -->
                <a href="{{ url('news-events') }}">News & Events</a>
                <a href="{{ route('front.photo.gallery') }}">Photo Gallery</a>
                <a href="{{ url('coming-soon') }}">Video Gallery</a>
              </div>
            </div>
          </div>
        </div>
        <div class="mega-menu">
          <li class="menubtn">
            <a class="mega-a" href="contact-us">Contact Us
            </a>
          </li>
        </div>
      </ul>
    </div>
  </div>
</nav>