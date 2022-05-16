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
                        <td>Faculty</td>
                    </thead>
                    <tr>
                        <td class="active-td"><a href="{{ route('front.non_teaching.index') }}">Non-Teaching</a></td>
                    </tr>
                    {{-- <tr>
                        <td><a href="upcoming_news.html">Upcoming Events</a></td>
                    </tr> --}}
                    {{-- <tr>
                        <td><a href="{{ route('front.video.gallery') }}">Video Gallery</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('front.photo.gallery') }}">Photo Gallery</a></td>
                    </tr> --}}
                </table>
            </div>
            <div class="col-md-9">
                <div class="contact-us-heading">
                    Faculty Details
                </div>
                <div class="container form">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                        <tbody>
                            <tr>
                                <td style="text-align:center">&nbsp;</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td style="text-align:center"><img src="{{ asset('/storage/user/'.$users->image)}}" style="border:2px solid #858585; height:200px; margin:10px; padding:10px"></td>
                            </tr>
                            <tr>
                                <td>
                                <p style="text-align:center"><strong>{{ $users->name }}</strong><br>
                                {{ $users->role }}&nbsp;</p>
                    
                                <p style="text-align:center"><strong>{{ $users->email }}</strong></p>
                    <p style="text-align:center"><strong><a href="Pdfnew/Vision of the Vice Chancellor for this University. pdf.pdf" style="text-decoration: none;" target="_blank">Vision Document</a></strong></p>
                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        </div>
                    </div>
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