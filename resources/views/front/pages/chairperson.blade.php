@extends('front.layouts.app')

@section('title','Chairperson')

@section('css')
<style>
    .person_image {
        width:300px;
        height:300px;
        margin:auto;
    }
    .person_image img {
        border-radius:5px;
    }
    @media (max-width:1199px) {
        .person_name h1 {
            font-size:28px;
        }
        .person_designation h4 {
            font-size:23px;
        }
    }
    @media (max-width:992px) {
        .person_image {
            width:250px;
            height:250px;
        }
        .person_name h1 {
            font-size:23px;
        }
        .person_designation h4 {
            font-size:18px;
        }
    }
    @media (max-width:768px) {
        .person_name h1 {
            padding:10px 0 0 0;
        }
    }
</style>
@endsection

@section('content')
<div class="chairperson_section">
    <div class="container">
        <div class="row m-0 py-5">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="person_image">
                    <img src="https://img.freepik.com/premium-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg?w=2000" alt="" width="100%" height="100%">
                </div>            
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="person_name">
                    <h1 class="text-center">Shri Madhusudan Sharma</h1>
                </div>
                <div class="person_designation">
                    <h4 class="text-center">Chairman</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection