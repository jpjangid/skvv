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
              <a href="contact_us.html">Contact Us</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="locate_us.html">Locate Us</a>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-9">
        <div class="contact-us-heading">Contact Us</div>
        <div class="container">
          <div class="contact-us-content mt-3">
            <div class="font-weight-bold">Shri Kallaji Vedic Vishvavidyalaya</div>
            <div class="clearfix">
            </div>
            <div class="address">Kalyanlok, Jawda, Nimbahera, Chittorgarh, Rajasthan 312601</div>
            <div class="clearfix">
            </div>
            <div class="address">Rajasthan, India</div>
            <div class="clearfix">
            </div>
            <div class="phone-no">Phone: 01477 294 394</div>
            <div class="clearfix">
            </div>
            <div class="email-address">Email: skvv.uni@gmail.com</div>
            <hr>
            <!--<hr>-->
            <!--<div class="font-weight-bold">Grievance Redressal Executive</div>-->
            <!--<div class="clearfix">-->
            <!--</div>-->
            <!--<div class="contact-name">Dr. Manish Shrimali</div>-->
            <!--<div class="clearfix">-->
            <!--</div>-->
            <!--<div class="phone-no">+91 98872 85752</div>-->
            <!--<hr>-->
            <!--<hr>-->
            <div class="enquiry-form">
              <div class="font-weight-bold text-uppercase mb-3">Enquiry Form</div>
              <div class="clearfix">
              </div>
              <div class="form py-3 px-4 mr-5">
                <form action="{{ url('enquiry-us') }}" method="post" id="demo-form" data-parsley-validate="">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" data-parsley-required-message="Please Enter Name" required="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" data-parsley-required-message="Please Enter Email" name="email" required="">
                  </div>
                  <div class="form-group">
                    <label for="mobile">Mobile No.</label>
                    <input type="number" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="10" class="form-control" id="mobile" placeholder="Enter Mobile No." data-parsley-required-message="Please Enter Mobile No" name="mobile" required="">
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" rows="5" name="message" data-parsley-required-message="Please Enter Message" id="message" required="">
                    </textarea>
                  </div>
                  <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Submit" id="contactButton">
                  </div>
                </form>
              </div>
            </div>
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
  $(function() {
    $('#demo-form').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.bs-callout-info').toggleClass('hidden', !ok);
      $('.bs-callout-warning').toggleClass('hidden', ok);
    }).on('form:submit', function() {
      $('.submit-button').attr('disabled', true);
    });
  });
</script>
@endsection