@extends('admin.master')
@section('title', "Follower | JU Press club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">follower number</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active text-uppercase">follower</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">follower number Tables</h3>
    </div>
    <div class="panel-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#SL</th>
                <th>Facebook</th>
                <th>Youtube</th>
                <th>Twitter</th>
                <th>Pinterest</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>{{$data->facebook}}</td>
                <td>{{$data->youtube}}</td>
                <td>{{$data->twitter}}</td>
                <td>{{$data->pinterest}}</td>
                <td>
                    <a href="{{route('admin.follower.edit', $data->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection

