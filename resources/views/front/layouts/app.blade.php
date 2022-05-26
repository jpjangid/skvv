<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Shri Kallaji Vedic Vishvavidyalaya | @yield('title','Home')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @if(request()->session()->has('download.in.the.next.request'))
  <meta http-equiv="refresh" content="5;url={{ url('test') }}">
  @endif
  <link href="{{ asset('frontend/css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/open-iconic-bootstrap.css') }}">
  <style type="text/css">
    .scrollax-performance,
    .scrollax-performance *,
    .scrollax-performance *:before,
    .scrollax-performance *:after {
      pointer-events: none !important;
      -webkit-animation-play-state: paused !important;
      animation-play-state: paused !important;
    }
  </style>
  @yield('css')
  <script type="text/javascript" charset="UTF-8" src="{{ asset('frontend/common.js') }}"></script>
  <script type="text/javascript" charset="UTF-8" src="{{ asset('frontend/util.js.download') }}"></script>
</head>

<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">
  <!-- header section begin -->
  @include('front.layouts.header')
  <!-- header section ends -->
  <!-- container section begin -->
  @yield('content')
  <!-- container section end -->
  <!-- footer section begin -->
  @include('front.layouts.footer')
  <!-- footer section end -->
  <div id="ftco-loader" class="fullscreen">
    <svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee">
      </circle>
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00">
      </circle>
    </svg>
  </div>{{--
  <script src="{{ asset('frontend/jquery.min.js.download') }}"></script>--}}
  <script src="{{ asset('frontend/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/jquery-migrate-3.0.1.min.js+popper.min.js+bootstrap.min.js.pagespeed.jc.5-SMnWxyDE.js.download') }}"></script>
  <script src="{{ asset('frontend/jquery.easing.1.3.js+jquery.waypoints.min.js+jquery.stellar.min.js+owl.carousel.min.js.pagespeed.jc.klS8bGtWo2.js.download') }}"></script>
  <script src="{{ asset('frontend/jquery.magnific-popup.min.js+aos.js+jquery.animateNumber.min.js+scrollax.min.js+google-map.js+main.js.pagespeed.jc.nSxM_GnpQM.js.download') }}"></script>
  <script src="{{ asset('frontend/js(1)') }}"></script>
  <script async="" src="{{ asset('carousel/owl.carousel.js') }}"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
  <script async="" src="{{ asset('frontend/js') }}"></script>
  <script>
    $(document).ready(function() {
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        lazyLoad: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true
      });
      $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
      })
      $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
      })

      $(function() {
        $('.lazy-load-images').lazy();
      });

    });



    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer="" src="{{ asset('frontend/beacon.min.js.download') }}" data-cf-beacon="{&quot;rayId&quot;:&quot;696b02e24b4e2cc2&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2021.9.0&quot;,&quot;si&quot;:100}">
    var current = new Date();
    var dd = current.getDate();
    var mm = current.getMonth() + 1;
    var yyyy = current.getFullYear();
    if (dd < 10) {
      dd = '0' + dd;
    }
    if (mm < 10) {
      mm = '0' + mm;
    }
    var today = dd + '-' + mm + '-' + yyyy;
    $(".current-date").text(today);
    $(".current-year").text(yyyy);
  </script>
  @yield('js')
</body>

</html>