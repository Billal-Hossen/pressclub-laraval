@extends('admin.master')
@section('title', "Publication Edit | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title">Publication Edit</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.publications.index')}}">Publication List</a></li>
        <li class="active">Publication Edit</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Publication edit</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.publications.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="title">Publication title</label>
                <input type="text" name="title" value="{{$data->title ? $data->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" id="ex1" placeholder="Enter Publication List">
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="author">Publication author</label>
                <input type="text" name="author" value="{{$data->author ? $data->author : old('author') }}" class="form-control @error('author') is-invalid @enderror" id="ex1" placeholder="Enter Publication List">
            </div>
            @error('author')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="platform">Publication platform</label>
                <input type="text" name="platform" value="{{$data->platform ? $data->platform : old('platform') }}" class="form-control @error('platform') is-invalid @enderror" id="ex1" placeholder="Enter Publication List">
            </div>
            @error('platform')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group" style="width: 30%;">
                {{$data->image}}
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
            <a href="{{route('admin.publications.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
