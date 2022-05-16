@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('page.index')}}">Pages</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Page</li>
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
                <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <!-- Page Title -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Page Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Please Enter Page title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- slug -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug')}}" placeholder="Please enter slug of page" />
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Page Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="summernote" rows="5" class="form-control @error('description') is-invalid @enderror" name="description"  value="{{ old('description') }}">
                                        {{ old('description') }}   
                                    </textarea>
                                    @error('description')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- page image -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="featured_image">Page Featured Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="featured_image" class="custom-file-input @error('featured_image') is-invalid @enderror" id="customFileLang" lang="en">
                                        <label class="custom-file-label" for="customFileLang">Choose file</label>
                                    </div>
                                    @error('featured_image')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- keywords -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{ old('keywords')}}" placeholder="Please Enter keywords" />
                                    @error('keywords')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- tags -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags')}}" placeholder="Please Enter Tags" />
                                    @error('tags')
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
                        <button type="submit" class="btn btn-primary">Add Page</button>
                        <a href="{{ route('page.index') }}" class="btn btn-outline-primary"> Cancel </a>
                    </div>

                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection