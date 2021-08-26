@extends('admin.master')
@section('title', "User Create | Tech news")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">User Create</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.users.index')}}">User</a></li>
        <li class="active">User Create</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">User Create</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.users.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter user name">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" autocomplete="off" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter user email">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @php
                if (old('role')){
                    $r = old('role');
                }else {
                    $r = '';
                }
            @endphp

            <div class="form-group">
                <label>Roele Select</label>
                <div>
                    <select class="form-control" for="role" name="role_id">
                        <option value="">-- Select One --</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" {{$role->id == $r ? 'selected': ''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('role_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" autocomplete="off" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Enter user password">
            </div>
            @error('password')
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
