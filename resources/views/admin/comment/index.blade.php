@extends('admin.master')
@section('title', "Contact | Tech news")
@section('pageTitle')
    <h4 class="pull-left page-title">Contacts</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active text-uppercase">Contacts</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Contacts Tables</h3>
    </div>
    <div class="panel-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#SL</th>
                <th>User Id</th>
                <th>Post Id</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $key=>$data)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->user->name}}</td>
                <td>{{$data->post_id}}</td>
                <td>{{$data->comment}}</td>
                <td>
                    @if($data->status == "0")
                        <button class="btn btn-info" type="button" onclick="statusUpdate({{$data->id}})">
                            Show
                        </button>
                        <form id="update_from_{{$data->id}}" style="display: none" action="{{route('admin.comments.update', $data->id)}}" method="post">
                            @csrf
                            @method('put')
                        </form>
                    @else
                        <button class="btn btn-success" type="button" onclick="statusUpdate({{$data->id}})">
                            Hide
                        </button>
                        <form id="update_from_{{$data->id}}" style="display: none" action="{{route('admin.comments.update', $data->id)}}" method="post">
                            @csrf
                            @method('put')
                        </form>

                    @endif
                        <button class="btn btn-danger" type="button" onclick="deleteComment({{$data->id}})">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        <form id="delete_from_{{$data->id}}" style="display: none" action="{{route('admin.comments.destroy', $data->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@push('js')
    <script type="text/javascript">
        function statusUpdate(id)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be Update Comment status!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Do it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('update_from_'+id).submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        };
        function deleteComment(id)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be Delete this Comment!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete_from_'+id).submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush

