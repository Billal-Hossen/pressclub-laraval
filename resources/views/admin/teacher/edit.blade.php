@extends('admin.master')
@section('title', "Teacher Edit | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title">Teacher Edit</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.executives.index')}}">Teacher List</a></li>
        <li class="active">Teacher Edit</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Teacher edit</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.teachers.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Executives Member</label>
                <input type="text" name="name" value="{{$data->name ? $data->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" id="ex1" placeholder="Enter Executives Member Name">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="designation">Executives Member</label>
                <input type="text" name="designation" value="{{$data->designation ? $data->designation : old('designation') }}" class="form-control @error('designation') is-invalid @enderror" id="ex1" placeholder="Enter Executives Member designation">
            </div>
            @error('designation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="institute">Executives Member</label>
                <input type="text" name="institute" value="{{$data->institute ? $data->institute : old('institute') }}" class="form-control @error('institute') is-invalid @enderror" id="ex1" placeholder="Enter Executives Member institute">
            </div>
            @error('institute')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group" style="width: 30%;">
                <img src="{{asset($data->image)}}" alt="" class="img-responsive" style="width: 50%; height: 4%;">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="status">Status</label>
                <br>
                @php
                if(old('status')){
                    $status = old('status');
                }else{
                    $status = $data->status;
                }
                @endphp

                <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio1" value="1" name="status" @if($status==1) {{'checked'}}@endif>
                    <label for="inlineRadio1">Active</label>
                </div>
                <div class="radio radio-info radio-inline">
                    <input type="radio" id="inlineRadio1" value="0" name="status"@if($status==0) {{'checked'}}@endif>
                    <label for="inlineRadio1">Inactive</label>
                </div>
            </div>
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.teachers.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
