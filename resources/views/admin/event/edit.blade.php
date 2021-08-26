@extends('admin.master')
@section('title', "Event Edit | JU Press Club")
@section('pageTitle')
    <h4 class="pull-left page-title">Event Edit</h4>
    <ol class="breadcrumb pull-right">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.events.index')}}">Event List</a></li>
        <li class="active">Event Edit</li>
    </ol>
@endsection

@section('mainContent')
    <div class="panel-heading">
        <h3 class="panel-title text-uppercase">Event edit</h3>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.events.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="title">Campus Information Title</label>
                <input type="text" name="title" value="{{$data->title ? $data->title : old('title') }}" class="form-control @error('title') is-invalid @enderror" id="ex1" placeholder="Enter Campus Information Title">
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="place">Campus Information place</label>
                <input type="text" name="place" value="{{$data->place ? $data->place : old('place') }}" class="form-control @error('place') is-invalid @enderror" id="ex1" placeholder="Enter Campus Information place">
            </div>
            @error('place')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="date">Campus Information date</label>
                <input type="date" name="date" value="{{$data->date ? $data->date : old('date') }}" class="form-control @error('date') is-invalid @enderror" id="ex1" placeholder="Enter Campus Information date">
            </div>
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="time">Campus Information time</label>
                <input type="time" name="time" value="{{$data->time ? $data->time : old('time') }}" class="form-control @error('time') is-invalid @enderror" id="ex1" placeholder="Enter Campus Information time">
            </div>
            @error('time')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group" style="width: 30%;">
                <img src="{{asset($data->image)}}" alt="" class="img-responsive" style="width: 50%; height: 4%;">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="description">Event description</label>
                <div class="form-line">
                    <textarea id="tinymce" class="form-control @error('description') is-invalid @enderror" name="description">
                        {{$data->description}}
                    </textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
            <a href="{{route('admin.events.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{asset('assets/admin/plugins/tinymce/tinymce.js')}}"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset("assets/admin/plugins/tinymce")}}';
        });
    </script>
@endpush
