@extends('front.layouts.app')

@section('title','Chairperson')

@section('css')
<style>
    .person_image {
        width: 300px;
        height: 300px;
        margin: auto;
    }

    .person_image img {
        border-radius: 5px;
    }

    .person_name {
        margin-top: 70px;
    }

    @media (max-width:1199px) {
        .person_name h1 {
            font-size: 28px;
        }

        .person_designation h4 {
            font-size: 23px;
        }
    }

    @media (max-width:992px) {
        .person_image {
            width: 250px;
            height: 250px;
        }

        .person_name h1 {
            font-size: 23px;
        }

        .person_designation h4 {
            font-size: 18px;
        }
    }

    @media (max-width:768px) {
        .person_name h1 {
            padding: 10px 0 0 0;
        }
    }
</style>
@endsection

@section('content')
<div class="chairperson_section">
    <div class="container">
        <div class="row m-0 py-5">
            @if(!empty($user))
            <div class="col-lg-6 col-md-6 col-12">
                <div class="person_image">
                    <img src="{{ asset('/storage/user/'.$user->image)}}" alt="" width="100%" height="100%">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="person_name">
                    <h1 class="text-center">{{ $user->name}}</h1>
                </div>
                <div class="person_designation">
                    <h4 class="text-center">{{$user->designation}}</h4>
                </div><br>
                <div class="person_designation">
                    <h4 class="text-center"><i class="fa fa-envelope mr-1"></i>{{$user->email}}</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection