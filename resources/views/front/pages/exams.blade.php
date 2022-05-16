@extends('front.layouts.app')

@section('title','UNIVERSITY EXAMS')

@section('content')
<section class="contact-us-section">
  <div class="container-fluid my-4">
    <div class="row no gutters">
      <div class="col-md-3">
        <table class="table table-bordered">
          <thead class="table-heading text-light font-weight-bold table-borderless">
            <td>College</td>
          </thead>
          @foreach ($colleges as $college)
            <tr>
              <td class="active-td">
                <a href="{{ url('university-exams',['slug' => $college->slug]) }}">{{ $college->name }}</a>
              </td>
            </tr>
          @endforeach
         
        </table>
      </div>
      <div class="col-md-6">
        <div class="contact-us-heading">UNIVERSITY EXAMS</div>
        <div class="container my-4">
            <div class="row">
                <table class="administration-table">
                    @if(!empty($exams) && count($exams) > 0)
                    @foreach($exams as $exam)
                    <tr>
                        <td class="administration-td"><a href="#" onclick="return false;">{{ !empty($exam->college->name) ? $exam->college->name : "" }} {{ !empty($exam->department->name) ? $exam->department->name : "" }}{{ !empty($exam->course->name) ? $exam->course->name : "" }} from {{ $exam->start_date }} to {{ $exam->end_date }} <img src="{{asset('frontend/images/new.gif')}}"></a></td>
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

