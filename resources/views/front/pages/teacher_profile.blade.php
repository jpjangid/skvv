@extends('front.layouts.app')

@section('title','Non Teaching')

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

    body {
        margin-top: 20px;
    }

    .card-style1 {
        box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
    }

    .border-0 {
        border: 0 !important;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0.25rem;
    }

    section {
        padding: 120px 0;
        overflow: hidden;
        background: #fff;

    }

    .mb-2-3,
    .my-2-3 {
        margin-bottom: 2.3rem;
    }

    .section-title {
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
        position: relative;
        display: inline-block;
    }

    .text-primary {
        color: #fff !important;
    }

    .text-secondary {
        color: #E9AB17 !important;
    }

    .font-weight-600 {
        font-weight: 600;
    }

    .display-26 {
        font-size: 1.3rem;
    }

    @media screen and (min-width: 992px) {
        .p-lg-7 {
            padding: 4rem;
        }
    }

    @media screen and (min-width: 768px) {
        .p-md-6 {
            padding: 3.5rem;
        }
    }

    @media screen and (min-width: 576px) {
        .p-sm-2-3 {
            padding: 2.3rem;
        }
    }

    .p-1-9 {
        padding: 1.9rem;
    }

    .bg-secondary {
        background: #E9AB17 !important;
    }

    @media screen and (min-width: 576px) {

        .pe-sm-6,
        .px-sm-6 {
            padding-right: 3.5rem;
        }
    }

    @media screen and (min-width: 576px) {

        .ps-sm-6,
        .px-sm-6 {
            padding-left: 3.5rem;
        }
    }

    .pe-1-9,
    .px-1-9 {
        padding-right: 1.9rem;
    }

    .ps-1-9,
    .px-1-9 {
        padding-left: 1.9rem;
    }

    .pb-1-9,
    .py-1-9 {
        padding-bottom: 1.9rem;
    }

    .pt-1-9,
    .py-1-9 {
        padding-top: 1.9rem;
    }

    .mb-1-9,
    .my-1-9 {
        margin-bottom: 1.9rem;
    }

    @media (min-width: 992px) {
        .d-lg-inline-block {
            display: inline-block !important;
        }
    }

    .rounded {
        border-radius: 0.25rem !important;
    }

    img#user_img {
        width: 50%;
        margin-left: 100px;
    }
</style>
@endsection

@section('content')
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="{{ asset('/storage/user/'.$users->image)}}" alt="..." id="user_img">
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0">{{$users->name}}</h3>
                                    <span class="text-primary">{{$faculty->teacher_role}}</span>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Department of:</span> {{$faculty->department->name}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Qualifications:</span> {{$faculty->qualifications}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Specializations:</span> {{$faculty->specializations}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Office Address:</span> {{$faculty->office_address}}</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Contact No.:</span>{{$users->mobile}} </li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> {{$users->email}}</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Research Interests :</span> {{$faculty->research_interests}}</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Published Books:</span> {{$faculty->published_books}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">About Me</span>
                    <p>Edith is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.</p>
                </div>
            </div> -->
            <!-- <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="mb-4 mb-sm-5">
                            <span class="section-title text-primary mb-3 mb-sm-4">Skill</span>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Driving range</div>
                                    <div class="col-6 text-end">80%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Short Game</div>
                                    <div class="col-6 text-end">90%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Side Bets</div>
                                    <div class="col-6 text-end">50%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Putting</div>
                                    <div class="col-6 text-end">60%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                        </div>
                        <div>
                            <span class="section-title text-primary mb-3 mb-sm-4">Education</span>
                            <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                            <p class="mb-1-9">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>

                        </div>
                    </div>
                </div>
            </div> -->
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