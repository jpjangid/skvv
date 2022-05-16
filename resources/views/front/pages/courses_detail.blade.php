@extends('front.layouts.app')

@section('title','COURSES OFFERED')

@section('content')
<section class="contact-us-section">
  <div class="container-fluid my-4">
    <div class="row no gutters">
      <div class="col-md-3">
        <table class="table table-bordered">
          <thead class="table-heading text-light font-weight-bold table-borderless">
            <td>Department</td>
          </thead>
          @foreach ($departments as $department)
            <tr>
              <td class="active-td">
                <a href="{{ url('courses-offered',['slug' => $department->slug]) }}">{{ $department->name }}</a>
              </td>
            </tr>
          @endforeach
         
        </table>
      </div>
      <div class="col-md-6">
        <div class="contact-us-heading">COURSES OFFERED</div>
        <div class="container my-4">
            <div class="row">
                <table class="administration-table">
                    @if(!empty($courses) && count($courses) > 0)
                    @foreach($courses as $course)
                    <tr>
                        <td class="administration-td"><span>{{ $course->name }}</span></td>
                    </tr>
                    @endforeach
                    @else 
                    <tr>
                        <td class="administration-td text-center" style="border: 1px solid white;"><span>No Data Available</span></td>
                    </tr>
                     @endif
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

