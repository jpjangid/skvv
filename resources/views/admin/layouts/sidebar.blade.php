  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ route('admin') }}">
          <img src="{{ asset('rv/rv_logo.png')}}" class="navbar-brand-img site-logo-img" alt="rv_logo.png">
          <span class="dashboard-logo">JRNRVU</span>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/admin') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            @if(in_array('roles.index', userpermissions()))  
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/role/permissions') }}">
                <i class="ni ni-tie-bow text-primary"></i>
                <span class="nav-link-text">Roles Permission</span>
              </a>
            </li>
            @endif
            @if(in_array('userpermission.index', userpermissions()))  
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/userpermissions') }}">
                <i class="ni ni-tie-bow text-primary"></i>
                <span class="nav-link-text">User Permissions</span>
              </a>
            </li>
            @endif
            @if(in_array('user.index', userpermissions()))  
            <li class="nav-item">
              <a class="nav-link" href="{{ route('users.index') }}">
                <i class="ni ni-circle-08 text-primary"></i>
                <span class="nav-link-text">Users</span>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ route('slider.index') }}">
                <i class="ni ni-album-2 text-primary"></i>
                <span class="nav-link-text">Banner</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('college.index') }}">
                <i class="ni ni-badge text-primary"></i>
                <span class="nav-link-text">College</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('department.index') }}">
                <i class="ni ni-folder-17 text-primary"></i>
                <span class="nav-link-text">Department</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('category.index') }}">
                <i class="ni ni-books text-primary"></i>
                <span class="nav-link-text">Category</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('photo.index') }}">
                <i class="ni ni-image text-primary"></i>
                <span class="nav-link-text">Photos</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('video.index') }}">
                <i class="ni ni-button-play text-primary"></i>
                <span class="nav-link-text">Videos</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('news.index') }}">
                <i class="ni ni-book-bookmark text-primary"></i>
                <span class="nav-link-text">News & Events</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('page.index') }}">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Pages</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('enquiry.index') }}">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Enquiries</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('addmissionexam.index') }}">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Addmission Exam</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('course.index') }}">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Courses</span>
              </a>  
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="{{ route('faculty.index') }}">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Faculty</span>
              </a>  
            </li>  
             <li class="nav-item">
              <a class="nav-link" href="{{ route('alumnispeak.index') }}">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Alumni Speak</span>
              </a>  
            </li>  
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>