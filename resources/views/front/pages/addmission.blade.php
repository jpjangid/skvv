@extends('front.layouts.app')

@section('title','Contact Us')

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
                <a href="{{ url('addmission',$college->id) }}">{{ $college->name }}</a>
              </td>
            </tr>
          @endforeach
         
        </table>
      </div>
      <div class="col-md-6">
        <div class="contact-us-heading">Department</div>
        <div class="container my-4">
            <div class="row">
                <table class="administration-table">
                    {{-- <tr class="text-uppercase text-center">
                        <th class="administration-th">Department</th>
                    </tr> --}}
                    @if(!empty($departments) && count($departments) > 0)
                    @foreach($departments as $department)
                    <tr>
                        <td class="administration-td"><a href="">{{$department->name}} <img src="{{asset('frontend/images/new.gif')}}"></a></td>
                    </tr>
                    @endforeach
                    @endif
                  
                </table>
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
</script>    
@endsection