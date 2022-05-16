@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('addmissionexam.index')}}">Addmission</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Addmission & Exam</li>
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
                <!-- form start -->
                <form action="{{ route('alumnispeak.update',$alumnispeak->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <!-- Slug Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" placeholder="Please Enter Name" value="{{ $alumnispeak->name }}">
                                    @error('name')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Slug Designation -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" id="" placeholder="Please Enter Designation" value="{{ $alumnispeak->designation }}">
                                    @error('designation')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Meta description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control" rows="3" name="description" id="Description" placeholder="Please Enter Description">{{ $alumnispeak->description }}</textarea>
                                </div>
                            </div>    
                             <!-- alumni Image -->
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="alumni_image" id="alumni_image" placeholder="Please Enter  image" value="{{ $alumnispeak->alumni_image }}">
                                    @error('alumni_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>    
                            <!-- Slug Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug-text" placeholder="Please Enter slug" value="{{ $alumnispeak->slug }}">
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Meta section -->
                        <div class="row">
                            <h3 class="col-md-12">Meta Section</h3>
                            <!-- Meta title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id="metaTitle" placeholder="Please Enter Meta title" value="{{ $alumnispeak->meta_title }}">
                                    @error('meta_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>    
                            <!-- Meta title -->
                            <!-- Meta keywords -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Meta Keyword</label>
                                    <input type="text" class="form-control" name="meta_keyword" id="metaKeyword" placeholder="Please Enter Meta keyword" value="{{ $alumnispeak->meta_keyword }}">
                                    @error('meta_keyword')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>    
                            <!-- Meta keywords -->
                            <!-- Meta description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" class="form-control" rows="5" name="meta_description" id="metaDescription" placeholder="Please Enter Meta description">{{ $alumnispeak->meta_description }}</textarea>
                                </div>
                            </div>    
                            <!-- Meta description -->
                            
                        </div>
                        <!-- Meta section -->
                        <hr>
                        <!-- Og section -->
                        <div class="row">
                            <h3 class="col-md-12">OG Section</h3>
                            <!-- OG title -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">OG Title</label>
                                    <input type="text" class="form-control" name="og_title" id="ogTitle" placeholder="Please Enter OG title" value="{{ $alumnispeak->og_title }}">
                                    @error('og_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>    
                            <!-- OG title -->
                            <!-- OG Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">OG Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="og_image" id="ogImage" placeholder="Please Enter OG image" value="{{ $alumnispeak->og_image }}">
                                    @error('og_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>    
                            <!-- OG Image -->
                            <!-- OG Image Alt -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">OG Image Alt</label>
                                    <input type="text" class="form-control" name="og_image_alt" id="ogImageAlt" placeholder="Please Enter OG image alt" value="{{ $alumnispeak->og_image_alt }}">
                                    @error('og_image_alt')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>    
                            <!-- OG Image Alt -->
                            <!-- OG description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">OG Description</label>
                                    <textarea type="text" class="form-control" rows="5" name="og_description" id="ogDescription" placeholder="Please Enter OG description">{{ $alumnispeak->og_description }}</textarea>
                                </div>
                            </div>    
                            <!-- OG description -->
                            
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('addmissionexam.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
{{-- <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>  --}}

@endsection
