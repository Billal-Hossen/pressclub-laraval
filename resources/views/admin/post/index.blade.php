@extends('admin.master')
@section('title', "Posts | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Posts</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active text-uppercase">Posts</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Posts Tables</h3>
    </div>
    <div class="panel-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#SL</th>
                <th>Title</th>
                <th>Description</th>
                <th>User</th>
                <th>Total View</th>
                <th>Total Comment</th>
                <th>Image</th>
                <th>Tag</th>
                <th>Featured</th>
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
                <td>{{$data->user->name}}</td>
                <td>{{$data->total_view}}</td>
                <td>{{$data->total_comment}}</td>
                <td style="width: 30%"><img src="{{asset($data->image)}}" alt="" class="img-responsive" style="width: 50%; height: 100px;"></td>
                <td>{{$data->tag->name}}</td>
                <td>{{$data->is_featured == 1 ? 'Yes' : 'No'}}</td>
                <td>{{$data->status ? 'Active':'Inactive'}}</td>
                <td>
                    <a href="{{route('admin.posts.edit', $data->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{route('admin.posts.show', $data->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    <button class="btn btn-danger" type="button" onclick="deletePost({{$data->id}})">
                        <i class="fa fa-trash-o"></i>
                    </button>
                    <form id="delete_from_{{$data->id}}" style="display: none" action="{{route('admin.posts.destroy', $data->id)}}" method="post">
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
        function deletePost(id)
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
