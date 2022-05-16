@extends('admin.layouts.app')

@section('title','Roles Permisson')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Roles Permission</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboards</a></li>
          <li class="breadcrumb-item active" aria-current="{{ url('admin/role/permissions') }}">Permission</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-6 col-5 text-right">
    
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
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="status">Role</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i>
                                            <span class="status">{{ $role->name }}</span>
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            Action
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                @if(in_array('roles.edit', userpermissions()))  
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ url('admin/rolepermission/edit',$role->id) }}">Edit</a>
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
@endsection
