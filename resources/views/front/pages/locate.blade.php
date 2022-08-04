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
            <td>Contact & Locate</td>
          </thead>
          <tr>
            <td class="active-td">
              <a href="{{ url('contact-us')}}">Contact Us</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{ url('locate-us')}}">Locate Us</a>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-9">
        <div class="contact-us-heading">Locate Us</div>
        <div class="container py-4">
            <div class="w-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3627.503133162352!2d74.61768581474367!3d24.60633816145607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3966163f1d4edf01%3A0x714c932b4616f493!2sKallaji%20Vedic%20University.!5e0!3m2!1sen!2sin!4v1659610851670!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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