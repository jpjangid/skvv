@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('enquiry.index')}}">Enquires</a></li>
          <li class="breadcrumb-item active" aria-current="page">Show Enquiry</li>
        </ol>
      </nav>
    </div>
  </div>
@endsection

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-12 col-md-12" style="background-color:white; border-radius:5px;">
                <div class="col-md-4 mb-2 mt-2">
                    <label for="name" class="font-weight-bold">Name :</label>
                    <span>{{ $enquiry->name }}</span>
                </div>
                <div class="col-md-4 mb-2 mt-2">
                    <label for="email" class="font-weight-bold">Email</label>
                    <span>{{ $enquiry->email }}</span>
                </div>
                <div class="col-md-4 mb-2 mt-2">
                    <label for="mobile" class="font-weight-bold">Mobile No</label>
                    <span>{{ $enquiry->mobile }}</span>
                </div>
                <div class="col-md-12 mb-2 mt-2">
                    <label for="message" class="font-weight-bold">Message</label>
                    <p class="text-justify">{{ $enquiry->message }}</p>
                </div>
                <div class="col-md-12 mb-2 text-right">
                    <a href="{{ route('enquiry.index') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
        </div>
@endsection