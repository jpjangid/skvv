@extends('front.layouts.app')

@section('title','Award Achievements')

@section('css')
<style type="text/css">
    .scrollax-performance,
    .scrollax-performance *,
    .scrollax-performance *:before,
    .scrollax-performance *:after {
      pointer-events: none !important;
      -webkit-animation-play-state: paused !important;
      animation-play-state: paused !important;
    }

    #slideshow {
        margin: 0 auto;
        height: 300px;
        width: 100%;
        box-sizing: border-box;
    }

    .slideshow-title {
        font-family: 'Allerta Stencil';
        font-size: 62px;
        color: #fff;
        margin: 0 auto;
        text-align: center;
        margin-top: 25%;
        letter-spacing: 3px;
        font-weight: 300;
    }

    .sub-heading {
        padding-top: 50px;
        font-size: 18px;
    } .sub-heading-two {
        font-size: 15px;
    } .sub-heading-three {
        font-size: 13px;
    } .sub-heading-four {
        font-size: 11px;
    } .sub-heading-five {
        font-size: 9px;
    } .sub-heading-six {
        font-size: 7px;
    } .sub-heading-seven {
        font-size: 5px;
    } .sub-heading-eight {
        font-size: 3px;
    } .sub-heading-nine {
        font-size: 1px;
    }

    .entire-content {
        margin: auto;
        width: 190px;
        perspective: 1000px;
        position: relative;
        padding-top: 80px;
    }

    .content-carrousel {
        width: 100%;
        position: absolute;
        float: right;
        animation: rotar 100s infinite linear;
        transform-style: preserve-3d;
    }

    .content-carrousel:hover {
        animation-play-state: paused;
        cursor: pointer;
    }

    .content-carrousel figure {
        width: 100%;
        /* height: 120px;
        border: 1px solid #3b444b; */
        overflow: hidden;
        position: absolute;
    }

    .content-carrousel figure:nth-child(1) {
        transform: rotateY(0deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(2) {
        transform: rotateY(40deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(3) {
        transform: rotateY(80deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(4) {
        transform: rotateY(120deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(5) {
        transform: rotateY(160deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(6) {
        transform: rotateY(200deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(7) {
        transform: rotateY(240deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(8) {
        transform: rotateY(280deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(9) {
        transform: rotateY(320deg) translateZ(300px); 
    } .content-carrousel figure:nth-child(10) {
        transform: rotateY(360deg) translateZ(300px); 
    } 

    .shadow {
        position: absolute;
        box-shadow: 0px 0px 20px 0px #000;
        border-radius: 1px;
    }

    .content-carrousel img {
        image-rendering: auto;
        transition: all 300ms;
        width: 100%;
        height: 100%;
    }

    .content-carrousel img:hover {
        transform: scale(1.2);
        transition: all 300ms;
    }

    @keyframes rotar {
        from {
            transform: rotateY(0deg);
        } to {
            transform: rotateY(360deg);
        }
    }
    .shadow img {
        cursor: pointer;
    }

    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
   
  </style>   
@endsection

@section('content')
<section class="gallery-section">
  <div class="row no-gutters dept-faculty">
    <div class="col-md-12">
      <h2 class="text-uppercase text-center font-weight-bold text-light pb-3 pt-3">Awards & Achievements</h2>
    </div>
  </div>
  <div class="container py-4">
    <div class="row">
    @foreach($news as $new)  
    @if(!empty($new->img_url))
      <div class="col-md-3 pb-3">
        <img src="{{ asset('storage/news/image/'.$new->img_url) }}" class="details-images popup">
      </div>
    @endif  
    @endforeach
    </div>
    <div class="row">
      <div class="col-md-12 text-center py-2">

      </div>
    </div>
  </div>
</section>
@endsection
