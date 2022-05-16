@extends('front.layouts.app')

@section('title','News & Events')

@section('css')
<style>
    .footer-section {
        position: relative !important;
        bottom:0 !important;
        width: 100% !important;
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
                    {{ $news->heading }}
                </div>
                <div class="container form">
                    @if(!empty($news->desc))
                    <p style="text-transform: capitalize !important;">
                       {{ strtolower($news->desc) }} 
                    </p>
                    @endif
                    @if(!empty($news->pic_url))
                        <a href="{{ asset('storage/news/document/'.$news->pic_url) }}" download>Download document</a>
                        <iframe src="{{ asset('storage/news/document/'.$news->pic_url) }}" width="100%" height="700px"></iframe>    
                    @endif   
                    @if(!empty($news->img_url))
                        <img src="{{ asset('storage/news/image/'.$news->img_url) }}" alt="{{ $news->heading }}" width="100%" height="500">    
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection