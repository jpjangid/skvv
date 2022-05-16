@extends('front.layouts.app')

@section('title','Contact Us')

@section('css')

@endsection

@section('content')
<section class="media-section">
  <div class="container-fluid my-4">
      <div class="row no gutters">
          <div class="col-md-12">
              <div class="contact-us-heading">
                  Recruitment
              </div>
              <div class="container-fluid form">
                  <div class="row py-2">
                    @foreach ($news as $new)
                    <div class="col-md-3">
                      <div style="background-color: white;">
                        <div class="photo p-2">
                          <a href="#"><img src="{{ asset('storage/news/image/'.$new->img_url) }}" style="width: 100%; height: 360px; object-fit: contain;"></a>
                        </div>
                        <div class="photo-heading text-center">{{ $new->heading}}</div>
                      </div>
                    </div>
                    @endforeach
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