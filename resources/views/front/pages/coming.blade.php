
@extends('front.layouts.app')

@section('title','Contact Us')

@section('css')
<style>
    .container .comming-soon .background {
        width: 500px;
        height: 100vh;
        object-fit: cover;
        display: flex;
        margin: auto;
    }
    .tag img {
        width: 300px;
        position: absolute;
        top: 0;
    }
    .comming-soon {
        position: relative;
    }
  </style>
@endsection

@section('content')

<div class="container">
    <div class="comming-soon">
        <img class="background"
            src="https://img.freepik.com/premium-vector/young-girl-sitting-near-pile-books-reading-book-vector-flat-illustration_357257-1053.jpg?w=740"
            alt="">
        <div class="tag">
            <img
                src="assets/img/22520129_l-removebg-preview.png"
                alt="">
        </div>
    </div>
</div>
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