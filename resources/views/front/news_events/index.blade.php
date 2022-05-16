@extends('front.layouts.app')

@section('title','News & Events')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<style>
    .footer-section {
        position: relative !important;
        bottom:0 !important;
        width: 100% !important;
    }
    #example_filter,#example_length {
        margin-top: 10px;
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
                    News & Events
                </div>
                <div class="container form">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Heading</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $new)
                            <tr>
                                <td><a href="{{ url('news-events',$new->slug) }}" style="text-transform: capitalize !important;">{{ strtolower($new->heading) }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#example').DataTable();
    } );
</script>
@endsection