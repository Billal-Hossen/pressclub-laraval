@extends('admin.master')
@section('title', "About Us Edit | Tech news")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">About Us</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.about.index')}}">About Us</a></li>
        <li class="active">About Us Update</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">About Us Update</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.about.update', $data->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="phone">Phone No.</label>
                <input type="text" name="phone" value="{{$data->phone ? $data->phone : old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="ex1" placeholder="Enter phone Number">
            </div>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{$data->email ? $data->email : old('email') }}" class="form-control @error('email') is-invalid @enderror" id="ex1" placeholder="Enter email">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{$data->address ? $data->address : old('address') }}" class="form-control @error('address') is-invalid @enderror" id="ex1" placeholder="Enter address">
            </div>
            @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="about_us">About Us</label>
                <input type="text" name="about_us" value="{{$data->about_us ? $data->about_us : old('about_us') }}" class="form-control @error('about_us') is-invalid @enderror" id="ex1" placeholder="Enter About Us">
            </div>
            @error('about_us')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.social.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection
