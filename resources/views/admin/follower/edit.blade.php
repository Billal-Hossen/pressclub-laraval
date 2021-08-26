@extends('admin.master')
@section('title', "tags Edit | Tech news")
@section('pageTitle')
    <h4 class="pull-left page-title">Follower Number Edit</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.follower.index')}}">Follower Number</a></li>
        <li class="active">Follower edit</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Follower Number Update</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.follower.update', $data->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="facebook">Facebook Follower</label>
                <input type="text" name="facebook" value="{{$data->facebook ? $data->facebook : old('facebook') }}" class="form-control @error('facebook') is-invalid @enderror" id="ex1" placeholder="Enter facebook follower Number">
            </div>
            @error('facebook')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="youtube">Youtube Follower</label>
                <input type="text" name="youtube" value="{{$data->youtube ? $data->youtube : old('youtube') }}" class="form-control @error('youtube') is-invalid @enderror" id="ex1" placeholder="Enter youtube follower Number">
            </div>
            @error('youtube')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="twitter">Twitter Follower</label>
                <input type="text" name="twitter" value="{{$data->twitter ? $data->twitter : old('twitter') }}" class="form-control @error('twitter') is-invalid @enderror" id="ex1" placeholder="Enter twitter follower Number">
            </div>
            @error('twitter')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="pinterest">Pinterest Follower</label>
                <input type="text" name="pinterest" value="{{$data->pinterest ? $data->pinterest : old('pinterest') }}" class="form-control @error('pinterest') is-invalid @enderror" id="ex1" placeholder="Enter pinterest follower Number">
            </div>
            @error('pinterest')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.follower.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
