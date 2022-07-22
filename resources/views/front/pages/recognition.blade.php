@extends('front.layouts.app')

@section('title','Recognition')

@section('css')
<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
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

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
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

    .container {
        max-width: 100%;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<section class="media-section">
    <div class="container-fluid my-4">
        <div class="row no gutters">
            <div class="col-md-0">
                <!-- <table class="table table-bordered">
                    <thead class="table-heading text-light font-weight-bold table-borderless">
                        <td>Administration</td>
                    </thead>
                    <tr>
                        <td class="active-td"><a href="{{ url('recruitment') }}">Recruitment</a></td>
                    </tr>

                    <tr>
                        <td><a href="{{ url('non-teaching/staff') }}">Non-teaching Staff</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ url('act') }}">Act</a></td>
                    </tr>

                </table> -->
            </div>
            <div class="col-md-12">
                <div class="contact-us-heading">
                    Recognition
                </div>
                <div class="container form">
                    <div class="row py-2">
                        <div class="col-md-12">
                            <div style="background-color: white;">
                                <div class="video-heading text-center"></div>
                                @foreach($recognitions as $recognition)
                                <div>
                                    <a href="{{ asset('storage/news/document/'.$recognition->pic_url) }}" target="_blank">{{ $recognition->heading}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-0">
            </div>
</section>
@endsection

@section('js')

@endsection