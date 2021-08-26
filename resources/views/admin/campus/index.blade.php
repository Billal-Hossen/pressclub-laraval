@extends('admin.master')
@section('title', "Campus Information | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Campus Information List</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active">Campus Information List</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Campus Information List</h3>
    </div>
    <div class="panel-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#SL</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $key=>$data)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->title}}</td>
                <td>{{Str::limit(strip_tags($data->description), 20)}}</td>
                <td style="width: 30%"><img src="{{asset($data->image)}}" alt="" class="img-responsive" style="width: 50%; height: 100px;"></td>
                <td>{{$data->status ? 'Active':'Inactive'}}</td>
                <td>
                    <a href="{{route('admin.campus.edit', $data->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger" type="button" onclick="deleteCampus({{$data->id}})">
                        <i class="fa fa-trash-o"></i>
                    </button>
                    <form id="delete_from_{{$data->id}}" style="display: none" action="{{route('admin.campus.destroy', $data->id)}}" method="post">
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
        function deleteCampus(id)
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
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
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
