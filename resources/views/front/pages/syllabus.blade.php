@extends('front.layouts.app')

@section('title','Syllabus')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<style>
    .footer-section {
        position: relative !important;
        bottom: 0 !important;
        width: 100% !important;
    }

    #example_filter,
    #example_length {
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
                    Syllabus
                </div>
                <div class="container form">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Syllabus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ asset('frontend/images/Paper-I_English.pdf') }}" target="_blank">English</a></td>
                            </tr>
                            <tr>
                                <td><a href="{{ asset('frontend/images/Hindi-20.pdf') }}" target="_blank">Hindi</a></td>
                            </tr>
                            <tr>
                                <td><a href="{{ asset('frontend/images/Paper-I_Hindi-00.pdf') }}" target="_blank">Hindi-1</a></td>
                            </tr>
                            <tr>
                                <td><a href="{{ asset('frontend/images/SANSKRIT-25.pdf') }}" target="_blank">SANSKRIT</a></td>
                            </tr>
                            <tr>
                                <td><a href="{{ asset('frontend/images/Sanskrit Traditional-73.pdf') }}" target="_blank">Sanskrit Traditional</a></td>
                            </tr>
                            <tr>
                                <td><a href="{{ asset('frontend/images/Yoga-100.pdf') }}" target="_blank">Yoga</a></td>
                            </tr>
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
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection