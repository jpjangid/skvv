@extends('admin.layouts.app')

@section('title','Edit User Permissions')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Edit User Permissions</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
          <li class="breadcrumb-item"><a href="#">User Permissions</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit User Permissions</li>
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
                <form class="form" action="{{ url('admin/userpermissions/update',$id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <table class="table table-separate" style="border: 0px !important;">
                            <thead>
                                <tr>
                                    <td style="border-bottom: 0px !important" colspan="3">Select All Permissions</td>
                                    <input type="hidden" id="user_id" value="{{$id}}">
                                    <input type="hidden" id="role_id" value="{{$role_id}}">
                                    <td style="border-bottom: 0px !important"><input type="checkbox" class="permission_id form-control-input" value="all"></label></td>
                                    <td style="border-bottom: 0px !important" colspan="3">Delete All Permissions</td>
                                    <td style="border-bottom: 0px !important"><input type="checkbox" class="permission_id form-control-input" value="unselectall"></label></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($names as $name)
                                <tr>
                                    @if($name->title != 'Role' && $name->title != 'Permission')
                                        <td style="border-bottom: 0px !important">{{$name->title}}</td>
                                    @endif
                                    @foreach($permissions as $permission)
                                        @if($permission->title == $name->title)
                                            @if($permission->title != 'Role' && $permission->title != 'Permission')
                                                @if(strpos($permission->name, 'index') !== false)
                                                    <td style="border-bottom: 0px !important">
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>List
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}></label>
                                                    </td>
                                                @endif
                                                @if(strpos($permission->name, 'create') !== false)
                                                    <td style="border-bottom: 0px !important">
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>Add</label>
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}>
                                                    </td>
                                                @endif
                                                @if(strpos($permission->name, 'edit') !== false)
                                                    <td style="border-bottom: 0px !important" >
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>Edit</label>
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}>
                                                    </td>
                                                @endif
                                                @if(strpos($permission->name, 'show') !== false)
                                                    <td style="border-bottom: 0px !important" >
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>View</label>
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}>
                                                    </td>
                                                @endif
                                                @if(strpos($permission->name, 'destroy') !== false)
                                                    <td style="border-bottom: 0px !important" >
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>Delete</label>
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}>
                                                    </td>
                                                @endif
                                                @if(strpos($permission->name, 'pdf') !== false)
                                                    <td style="border-bottom: 0px !important" >
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>PDF</label>
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}>
                                                    </td>
                                                @endif
                                                @if(strpos($permission->name, 'notification') !== false)
                                                    <td style="border-bottom: 0px !important" >
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>Notification</label>
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}>
                                                    </td>
                                                @endif
                                                @if(strpos($permission->name, 'export') !== false)
                                                    <td style="border-bottom: 0px !important" >
                                                        <input type="hidden" id="user_id" value="{{$id}}">
                                                        <input type="hidden" id="role_id" value="{{$role_id}}">
                                                        <label>Download Excel</label>
                                                        <input type="checkbox" class="permission_id form-control-input" value="{{$permission->id}}" {{in_array($permission->id,$data) == '1' ? 'checked' : ''}}>
                                                    </td>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.permission_id').on('change', function(){
        var permission_id = this.value;
        var user_id = $('#user_id').val();
        var role_id = $('#role_id').val();
        $.ajax({
            url:"{{url('admin/userpermissions/store')}}",
            type: "POST",
            data: {
                permission_id: permission_id,
                user_id: user_id,
                role_id: role_id,
                _token: '{{csrf_token()}}' 
            },
            dataType : 'json',
            success: function(data){
                if(data['msg'] == 'success'){
                    swal({
                        title: 'Success!',
                        text: "Permission Added!",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                        }).then((result) => {
                        if (result) {
                            location.reload();
                        }
                    })
                }else{
                    swal({
                        title: 'Danger!',
                        text: "Permission Deleted!",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                        }).then((result) => {
                        if (result) {
                            location.reload();
                        }
                    })
                }
            }
        });
    });
</script>
@endsection