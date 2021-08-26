@extends('admin.master')
@section('title', "Slider Create | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Sliders Create</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.sliders.index')}}">Sliders</a></li>
        <li class="active">Slider Create</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Sliders Create</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Slider Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter slider title">
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="description">Slider description</label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror" placeholder="Enter slider description">
            </div>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" placeholder="Enter slider link">
            </div>
            @error('link')
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

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.images.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
