@extends('admin.master')
@section('title', "Settings | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Settings</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active">Settings</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Settings Tables</h3>
    </div>
    <div class="panel-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#SL</th>
                <th>Facebook Page</th>
                <th>Google Map</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td class="w-50">{{$data->facebook_page}}</td>
                <td class="w-50">{{$data->google_map}}</td>
                <td>
                    <a href="{{route('admin.settings.edit', $data->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection

