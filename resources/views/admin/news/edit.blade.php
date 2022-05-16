@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="{{ route('news.index')}}">News</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add News & Events</li>
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
                <form action="{{ url('admin/news/events/update',$news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row">

                            <!-- Select Category -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="">Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="news" {{ $news->cat == "news" ? 'selected' : '' }}>News</option> 
                                        <option value="event" {{ $news->cat == "event" ? 'selected' : '' }}>Events</option> 
                                        <option value="recruitment" {{ $news->cat == "recruitment" ? 'selected' : '' }}>Recruitment</option> 
                                        <option value="award" {{ $news->cat == "award" ? 'selected' : '' }}>Award Achievements</option>
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Select Department -->
                            <div class="col-md-6">
                                <div class="form-group">  
                                    <label for="">Department</label>
                                    <select class="form-control" name="department_id" id="department_id">
                                        <option value="" selected>Select Department</option>
                                        @foreach($deparments as $department)
                                            <option  value="{{ $department->id }}" {{ $news->deptid == $department->id ? "selected" : "" }}>{{ $department->name }}</option> 
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             <!-- slug -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Please enter category slug" value="{{ $news->slug }}">
                                    @error('slug')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Heading -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ $news->heading }}" placeholder="Please enter heading">
                                    @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Choose Image:</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFileLang" lang="en">
                                        <label class="custom-file-label" for="customFileLang">Select file</label>
                                        @error('image')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Document -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pdf">Choose Document:</label>
                                    <div class="custom-file">
                                        <input type="file" name="document" class="custom-file-input @error('document') is-invalid @enderror" id="exampleInputFile" lang="en">
                                        <label class="custom-file-label" for="exampleInputFile">Select File</label>
                                        @error('document')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Link -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" placeholder="Please enter link" value="{{ $news->link_url }}">
                                    @error('link')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Short Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_des">Short Description</label>
                                    <textarea name="short_des" id="short_des" cols="" rows="5" placeholder="Please enter Short Description" class="form-control @error('short_des') is-invalid @enderror">{{ $news->desc }}</textarea>
                                    @error('short_des')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- display date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Display Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker @error('display_date') is-invalid @enderror" name="display_date" placeholder="Select date" type="text" value="{{ $news->display_date }}">
                                        @error('display_date')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- display date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker @error('last_date') is-invalid @enderror" name="last_date"  placeholder="Select date" type="text" value="{{ $news->last_date }}">
                                        @error('last_date')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
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
                                        <input type="text" class="form-control" name="meta_title" id="metaTitle" placeholder="Please Enter Meta title" value="{{ $news->meta_title }}">
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
                                        <input type="text" class="form-control" name="meta_keyword" id="metaKeyword" placeholder="Please Enter Meta keyword" value="{{ $news->meta_keyword }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="meta_description" id="metaDescription" placeholder="Please Enter Meta description">{{ $news->meta_description }}</textarea>
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
                                        <input type="text" class="form-control" name="og_title" id="ogTitle" placeholder="Please Enter OG title" value="{{ $news->og_title }}">
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
                                        <input type="file" class="form-control" accept="image/*" name="og_image" id="ogImage" placeholder="Please Enter OG image" value="{{ $news->og_image }}">
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
                                        <input type="text" class="form-control" name="og_image_alt" id="ogImageAlt" placeholder="Please Enter OG image alt" value="{{ $news->og_image_alt }}">
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
                                        <textarea type="text" class="form-control" rows="5" name="og_description" id="ogDescription" placeholder="Please Enter OG description">{{ $news->og_description }}</textarea>
                                    </div>
                                </div>    
                                <!-- OG description -->
                            </div>
                            <!-- Og section -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update News</button>
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
<script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>   
@endsection
