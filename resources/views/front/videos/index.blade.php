@extends('front.layouts.app')

@section('title','Video Gallery')

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
                        <td class="active-td"><a href="{{ route('front.news.events') }}">News & Events</a></td>
                    </tr>
                    {{-- <tr>
                        <td><a href="upcoming_news.html">Upcoming Events</a></td>
                    </tr> --}}
                    <tr>
                        <td><a href="{{ route('front.video.gallery') }}">Video Gallery</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('front.photo.gallery') }}">Photo Gallery</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-9">
                <div class="contact-us-heading">
                    Video Gallery
                </div>
                <div class="container form">
                  <div class="row py-2">
                  @foreach($videos as $video)  
                    <div class="col-md-4">
                      <div style="background-color: white;">
                        <div class="video p-2">
                          <a href="#"><img src="{{ asset('storage/video/') }}" style="width: 100%; object-fit: contain;"></a>
                        </div>
                        <div class="video-heading text-center">{{ $video->short_des }}</div>
                      </div>
                    </div>
                  @endforeach  
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection