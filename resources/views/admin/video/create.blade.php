@extends('admin.master')
@section('title', "Video Create | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Video Gallery Create</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.videos.index')}}">Video Gallery</a></li>
        <li class="active">Video Gallery Create</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Video Gallery Create</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.videos.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="link">Video Link</label>
                <input type="text" name="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" placeholder="Enter Video Link">
            </div>
            @error('link')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="video_title">Video title</label>
                <input type="text" name="video_title" value="{{ old('video_title') }}" class="form-control @error('video_title') is-invalid @enderror" placeholder="Enter Video Title">
            </div>
            @error('video_title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="link_id">Video link Id</label>
                <input type="text" name="link_id" value="{{ old('link_id') }}" class="form-control @error('link_id') is-invalid @enderror" placeholder="Enter link Id">
            </div>
            @error('link_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="status">Status</label>
                <br>
                @php
                if (old('status')){
                    $status = old('status');
                }else {
                        $status = 1;
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

            <div class="form-group">
                <label for="small_image">Image</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.videos.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
