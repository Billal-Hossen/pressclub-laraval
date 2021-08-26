@extends('admin.master')
@section('title', "Video Gallery Edit | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title">VIDEO EDIT</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.videos.index')}}">Video Gallery</a></li>
        <li class="active">Video Gallery Edit</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Video Gallery Edit</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.videos.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group" style="width: 40%;">
                <img src="{{asset($data->image)}}" alt="" class="img-responsive" style="width: 60%; height: 5%;">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" value="{{$data->link}}" class="form-control @error('link') is-invalid @enderror">
            </div>
            @error('link')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="video_title">Video Title</label>
                <input type="text" name="video_title" value="{{$data->video_title}}" class="form-control @error('video_title') is-invalid @enderror">
            </div>
            @error('video_title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="link_id">Link Id</label>
                <input type="text" name="link_id" value="{{$data->link_id}}" class="form-control @error('link_id') is-invalid @enderror">
            </div>
            @error('link_id')
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
            <a href="{{route('admin.videos.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
