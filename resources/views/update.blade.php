@extends('layout.master')
@section('title','index')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('update',$library->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="Title" class="form-label">Title</label>
      <input type="text" class="form-control" name="Title" value="{{$library->Title}}">
    </div>
    <div class="mb-3">
        <label for="Author" class="form-label">Author</label>
        <input type="text" class="form-control" name="Author" value="{{$library->Author}}">
      </div>
      <div class="mb-3">
        <label for="Pages" class="form-label">Pages</label>
        <input type="text" class="form-control" name="Pages" value="{{$library->Pages}}">
      </div>
      <div class="mb-3">
        <label for="Year" class="form-label">Year</label>
        <input type="text" class="form-control" name="Year" value="{{$library->Year}}">
      </div>
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</form>
@endsection
