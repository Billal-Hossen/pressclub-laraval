@extends('admin.master')
@section('title', "Setting Edit | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Settings</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.settings.index')}}">Settings</a></li>
        <li class="active">Setting edit</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Setting Update</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.settings.update', $data->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="facebook_page">Facebook Page</label>
                <input type="text" name="facebook_page" value="{{$data->facebook_page ? $data->facebook_page : old('facebook_page') }}" class="form-control @error('facebook_page') is-invalid @enderror" id="ex1" placeholder="Enter facebook page link">
            </div>
            @error('facebook_page')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="google_map">Google Map</label>
                <input type="text" name="google_map" value="{{$data->google_map ? $data->google_map : old('google_map') }}" class="form-control @error('google_map') is-invalid @enderror" id="ex1" placeholder="Enter google map link">
            </div>
            @error('google_map')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.settings.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
