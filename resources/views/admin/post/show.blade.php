@extends('admin.master')
@section('title', "Post Details | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title text-uppercase">Post Details</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.posts.index')}}">Post</a></li>
        <li class="active">Post Details</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Post Details</h3>
    </div>
    <div class="panel-body">
        <form role="form">

            <div class="form-group">
                <label for="title">Title</label>
                <p>{{$data->title}}</p>
            </div>

            <div class="form-group">
                <label>Category</label>
                <p>{{$data->category_id}}</p>
            </div>


            <div class="form-group">
                <label for="is_featured">Is Featured</label>
                <div class="checkbox checkbox-success">
                    <input id="checkbox3" {{$data->is_featured == 1 ? 'checked':''}} name="is_featured" value="one" type="checkbox">
                    <label for="checkbox3"> Yes </label>
                </div>
            </div>

            <div class="form-group">
                <label for="tag_id">Tag</label>
                <p>{{$data->tag_id}}</p>
            </div>


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

            <div class="form-group" style="width: 30%;">
                <img src="{{asset($data->image)}}" alt="" class="img-responsive" style="width: 50%; height: 4%;">
                <label for="checkbox3"> Image </label>
            </div>


            <div class="form-group">
                <label for="description">Post description</label>
                <div class="form-line">
                   <p>{{strip_tags($data->description)}}</p>
                </div>
            </div>
            <a href="{{route('admin.posts.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
            <a href="{{route('admin.posts.edit', $data->id)}}" class="btn btn-primary waves-effect waves-light">Edit</a>
        </form>
    </div>
@endsection



