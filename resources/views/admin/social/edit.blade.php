@extends('admin.master')
@section('title', "Social Media Link Edit | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Social Media Link</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.social.index')}}">Social Media Link</a></li>
        <li class="active">Social Media Link Update</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Social Media Link Update</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.social.update', $data->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="facebook">Facebook Link</label>
                <input type="text" name="facebook" value="{{$data->facebook ? $data->facebook : old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror" id="ex1" placeholder="Enter Facebook link">
            </div>
            @error('facebook')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="youtube">Youtube Link</label>
                <input type="text" name="youtube" value="{{$data->youtube ? $data->youtube : old('youtube') }}" class="form-control @error('youtube') is-invalid @enderror" id="ex1" placeholder="Enter Youtube Link">
            </div>
            @error('youtube')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="twitter">Twitter Link</label>
                <input type="text" name="twitter" value="{{$data->twitter ? $data->twitter : old('twitter') }}" class="form-control @error('twitter') is-invalid @enderror" id="ex1" placeholder="Enter Twitter Link">
            </div>
            @error('twitter')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="pinterest">Pinterest Link</label>
                <input type="text" name="pinterest" value="{{$data->pinterest ? $data->pinterest : old('pinterest') }}" class="form-control @error('pinterest') is-invalid @enderror" id="ex1" placeholder="Enter Pinterest Link">
            </div>
            @error('pinterest')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="facebook_page">Facebook Page</label>
                <input type="text" name="facebook_page" value="{{$data->facebook_page ? $data->facebook_page : old('facebook_page') }}" class="form-control @error('facebook_page') is-invalid @enderror" id="ex1" placeholder="Enter Facebook Page Link">
            </div>
            @error('facebook_page')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="linkedin">Linkedin Link</label>
                <input type="text" name="linkedin" value="{{$data->linkedin ? $data->linkedin : old('linkedin') }}" class="form-control @error('linkedin') is-invalid @enderror" id="ex1" placeholder="Enter Linkedin Link">
            </div>
            @error('linkedin')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.social.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
