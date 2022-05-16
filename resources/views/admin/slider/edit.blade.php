@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('slider.index')}}">Banner</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
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
                <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                        
                            <!-- slider image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="featured_image">Banner Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('featured_image') is-invalid @enderror" id="customFileLang" lang="en">
                                        <label class="custom-file-label" for="customFileLang">{{ $slider->image}}</label>
                                    </div>
                                    @error('featured_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- slider link -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">Banner Link</label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="Please Enter Slider link" value="{{ $slider->link }}">
                                    @error('link')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- slider Title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slider_title">Banner Title</label>
                                    <input type="text" class="form-control @error('slider_title') is-invalid @enderror" name="slider_title" value="{{ $slider->slider_title }}" placeholder="Please Enter Slider Title" />
                                    @error('slider_title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <!-- Slug Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug-text" placeholder="Please Enter slug" value="{{ $slider->slug }}">
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- short_description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description">Banner Description</label>
                                    <textarea rows="4" cols="" class="form-control @error('short_description') is-invalid @enderror" name="short_description" placeholder="Please enter Short Description" >{{ $slider->short_description }}</textarea>
                                    @error('short_description')
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
                                        <input type="text" class="form-control" name="meta_title" id="metaTitle" placeholder="Please Enter Meta title" value="{{ $slider->meta_title }}">
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
                                        <input type="text" class="form-control" name="meta_keyword" id="metaKeyword" placeholder="Please Enter Meta keyword" value="{{ $slider->meta_keyword }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="meta_description" id="metaDescription" placeholder="Please Enter Meta description">{{ $slider->meta_description }}</textarea>
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
                                        <input type="text" class="form-control" name="og_title" id="ogTitle" placeholder="Please Enter OG title" value="{{ $slider->og_title }}">
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
                                        <input type="file" class="form-control" accept="image/*" name="og_image" id="ogImage" placeholder="Please Enter OG image" value="{{ $slider->og_image }}">
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
                                        <input type="text" class="form-control" name="og_image_alt" id="ogImageAlt" placeholder="Please Enter OG image alt" value="{{ $slider->og_image_alt }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="og_description" id="ogDescription" placeholder="Please Enter OG description">{{ $slider->og_description }}</textarea>
                                    </div>
                                </div>    
                                <!-- OG description -->
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Banner</button>
                        <a href="{{ route('slider.index') }}" class="btn btn-outline-primary"> Cancel </a>
                    </div>

                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection