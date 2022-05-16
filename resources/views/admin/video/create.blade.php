@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('video.index')}}">Video</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Video</li>
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
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <!-- Select Category -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="">Category</label>
                                    <select class="form-control" name="category_id" id="category">
                                        @foreach($categories as $category)
                                            <option  value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{ $category->name }}</option> 
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Album Video -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video">Choose Video:</label>
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input @error('video') is-invalid @enderror" id="customFileLang" lang="en">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                        @error('video')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Slug -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Please Enter Slug" value="{{ old('slug') }}">
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Link -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" placeholder="Please enter link" value="{{ old('link') }}">
                                    @error('link')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short-des">Short Description</label>
                                    <textarea name="short_des" id="short_des" cols="" rows="5" placeholder="Please enter Short Description" class="form-control @error('short_des') is-invalid @enderror"></textarea>
                                    @error('short_des')
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
                                    <input type="text" class="form-control" name="meta_title" id="metaTitle" placeholder="Please Enter Meta title" value="{{ old('meta_title') }}">
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
                                    <input type="text" class="form-control" name="meta_keyword" id="metaKeyword" placeholder="Please Enter Meta keyword" value="{{ old('meta_keyword') }}">
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
                                    <textarea type="text" class="form-control" rows="5" name="meta_description" id="metaDescription" placeholder="Please Enter Meta description">{{ old('meta_description') }}</textarea>
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
                                    <input type="text" class="form-control" name="og_title" id="ogTitle" placeholder="Please Enter OG title" value="{{ old('og_title') }}">
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
                                    <input type="file" class="form-control" accept="image/*" name="og_image" id="ogImage" placeholder="Please Enter OG image" value="{{ old('og_image') }}">
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
                                    <input type="text" class="form-control" name="og_image_alt" id="ogImageAlt" placeholder="Please Enter OG image alt" value="{{ old('og_image_alt') }}">
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
                                    <textarea type="text" class="form-control" rows="5" name="og_description" id="ogDescription" placeholder="Please Enter OG description">{{ old('og_description') }}</textarea>
                                </div>
                            </div>    
                            <!-- OG description -->
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add Video</button>
                        <a href="{{ route('video.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection
