@extends('admin.master')
@section('title', "Contact | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Contacts</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active">Contacts</li>
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
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $key=>$data)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->message}}</td>
                <td>
                    @if($data->status)
                        <a href="#" class="btn btn-success">Done</a>
                    @else
                        <button class="btn btn-warning" type="button" onclick="contactUpdate({{$data->id}})">
                            <i class="fa fa-edit"></i>
                        </button>
                        <form id="update_from_{{$data->id}}" style="display: none" action="{{route('admin.contacts.update', $data->id)}}" method="post">
                            @csrf
                            @method('put')
                        </form>
                    @endif

                        <button class="btn btn-danger" type="button" onclick="deleteContact({{$data->id}})">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        <form id="delete_from_{{$data->id}}" style="display: none" action="{{route('admin.contacts.destroy', $data->id)}}" method="post">
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
        function contactUpdate(id)
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
                text: "You won't be Update!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Update it!',
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

        function deleteContact(id)
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
                text: "You won't be Delete Contact!",
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

