@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboards</a></li>
          <li class="breadcrumb-item active" aria-current="{{ url('admin/video') }}">Video</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
      <a href="{{ route('video.create')}}" class="btn btn-neutral">+ Add Video</a>
    </div>
  </div>
@endsection

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-12 col-md-12" style="background-color:white; border-radius:5px;">
                <!-- <div class="card-body"> -->
                    <div class="table-responsive">
                        <div>
                            <table class="table align-items-center myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="number">S.No.</th>
                                        <!-- <th scope="col">College Name</th> -->
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Video</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        @if(!empty($video->category_id))
                                        <td>{{ $video->category->name }}</td>
                                        @else
                                        <td><i>N/A</i></td>
                                        @endif
                                        @if(!empty($video->video))
                                        <td> <iframe src="{{ asset('storage/video/'.$video->video) }}" alt="Video" width="500px" height="200px"></iframe></td>
                                        @else
                                        <td> <img src="https://via.placeholder.com/140x100" alt="Default Video Image" width="40px" height="auto"> </td>
                                        @endif
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('video.edit',['video' => $video->id]) }}">Edit</a>
                                                    <a class="dropdown-item" href="#" onclick="deleteData({{ $video->id }})" data-toggle="modal" data-target="#modal-sm">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- </div> -->
                
                <!-- delete modal -->
                <form action="" method="POST" id="formDelete">
                    @csrf
                    @method('DELETE')
                    <div class="modal fade" id="modal-sm">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete video</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @if(isset($video))
                                <div class="modal-body">
                                    <p>This process can not be undone. Are you sure you want to delete this video?</p>
                                </div>
                                @endif
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </form>
                <!-- end modal -->
            </div>
        </div>
@endsection

@section('js')

    <!-- Soft Delete -->
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        function deleteData(id) {
            $('#fromDelete').attr('action','');
            if(id != "") {
                let url = 'admin/video/'+id;
                url = `{{ url('${url}') }}`;
                $('#formDelete').attr('action',url);
            }
        }
    </script>

@endsection
