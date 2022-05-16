@extends('admin.layouts.app')

@section('breadcrumb')
  <div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin')}}">Dashboards</a></li>
          <li class="breadcrumb-item active" aria-current="{{ route('enquiry.index') }}">Enquiries</li>
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
                            <table class="table align-items-center myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="number">S.No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile No.</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($enquires as $enquire)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $enquire->name }}</td>
                                        <td>{{ $enquire->email }}</td>
                                        <td>{{ $enquire->mobile }}</td>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" name="status" class="custom-control-input js-switch" data-id="{{ $enquire->id }}" id="customSwitch{{ $i }}" {{ $enquire->status == 1 ? 'checked' : "" }}>
                                                <label class="custom-control-label {{$enquire->status == 0 ? "text-warning" : "text-success"}}" for="customSwitch{{ $i }}">{{ $enquire->status == 0 ? "Pending" : "Completed" }}</label>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('enquiry.show',['enquiry' => $enquire->id]) }}">View</a>
                                                    <a class="dropdown-item" href="#" onclick="deleteData({{ $enquire->id }})" data-toggle="modal" data-target="#modal-sm">Delete</a>
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
                                    <h4 class="modal-title">Delete Enquiry</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>This process can not be undone. Are you sure you want to delete this enquiry?</p>
                                </div>
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

            $(document).on('change','.js-switch',function () {
                alert("hello");
            });     

        } );
        function deleteData(id) {
            $('#fromDelete').attr('action','');
            if(id != "") {
                let url = 'admin/enquiry/'+id;
                url = `{{ url('${url}') }}`;
                $('#formDelete').attr('action',url);
            }
        }
    </script>

    <!-- Change Status -->
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
        $(document).ready(function(){
            $('.js-switch').change(function () {
                alert("hello");
                let status = $(this).prop('checked') === true ? 1 : 0;
                let pageId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('pages.update.status') }}',
                    data: {'status': status, 'page_id': pageId},
                    success: function (data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@endsection
