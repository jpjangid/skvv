@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboards</a></li>
          <li class="breadcrumb-item active" aria-current="{{ url('admin/users') }}">Users</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
    @if(in_array('user.create', userpermissions()))  
      <a href="{{ route('users.create')}}" class="btn btn-neutral">+ Add User</a>
    @endif
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
                            <table class="table align-items-center" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">User</th>
                                        <th scope="col" class="sort" data-sort="budget">Detail</th>
                                        <th scope="col" class="sort" data-sort="status">Role</th>
                                        <!-- <th scope="col">Users</th>
                                        <th scope="col" class="sort" data-sort="completion">Completion</th> -->
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($users as $user)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                @if(!empty($user->image))
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="{{ asset('storage/user/'.$user->image) }}" height="100%">
                                                </a>
                                                @else
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="{{ asset('assets/img/theme/bootstrap.jpg')}}">
                                                </a>
                                                @endif
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{ $user->name}}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            <ul style="list-style-type:none;">
                                                <li><a href="email:{{ $user->email}}">{{ $user->email }}</a></li>
                                                <li><a href="tel:{{ $user->mobile }}">{{ $user->mobile }}</a></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i>
                                            <span class="status">{{ $user->role }}</span>
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                                                    <a class="dropdown-item" href="{{ route('users.edit',$user->id)}}">Edit</a>
                                                    <a class="dropdown-item" href="#" onclick="deleteData({{ $user->id }})" data-toggle="modal" data-target="#modal-sm">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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
                                    <h4 class="modal-title">Delete User</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @if(isset($user))
                                <div class="modal-body">
                                    <p>This process can not be undone. Are you sure you want to delete this department?</p>
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
                let url = 'admin/users/'+id;
                url = `{{ url('${url}') }}`;
                $('#formDelete').attr('action',url);
            }
        }
    </script>

@endsection