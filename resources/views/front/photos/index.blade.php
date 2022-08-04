@extends('front.layouts.app')

@section('title','Photo Gallery')
@section('css')
<style>
        .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        /* z-index: 1; */
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }
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
</style>
@endsection
@section('content')
<section class="media-section">
    <div class="container-fluid my-4">
        <div class="row no gutters">
            <div class="col-md-3">
                <table class="table table-bordered">
                    <thead class="table-heading text-light font-weight-bold table-borderless">
                        <td>Media</td>
                    </thead>
                    <tr>
                        <td><a href="{{ route('front.news.events') }}">News & Events</a></td>
                    </tr>
                    {{-- <tr>
                        <td><a href="upcoming_news.html">Upcoming Events</a></td>
                    </tr> --}}
                    <tr>
                        <td><a href="{{ route('front.video.gallery') }}">Video Gallery</a></td>
                    </tr>
                    <tr>
                        <td class="active-td"><a href="{{ route('front.photo.gallery') }}">Photo Gallery</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-9">
                <div class="contact-us-heading">
                    Photo Gallery
                </div>
                <div class="container form">

                  <div class="row py-2">
                  @foreach($photos as $photo)  
                    <div class="col-md-4">
                      <div style="background-color: white;">
                        <div class="photo p-2">
                            <a href="#" onClick="openModel('{{$photo->image}}')">
                              <img src="{{ asset('storage/photo/'.$photo->image) }}" style="width: 100%; height:250px; object-fit: contain;">
                            </a>
                        </div>
                        <div class="photo-heading text-center">{{ $photo->short_des }}</div>
                      </div>
                    </div>
                  @endforeach  
                  <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>
                  </div>
                  
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    function openModel(url) {
        var img = 'storage/photo/'+url;
        var modalImg = document.getElementById("img01");
        modal.style.display = "block";
        modalImg.src = img;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>
@endsection