@extends('layout.master')
@section('title','index')
@section('content')
<table class="table table-bordered table-hover">
    <thead>
      <tr>
        {{-- <th scope="col">id</th> --}}
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Pages</th>
        <th scope="col">Year</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($libraries as $library)
          <tr>
            {{-- <th scope="row">{{$library->id}}</th> --}}
            <td>{{$library->Title}}</td>
            <td>{{$library->Author}}</td>
            <td>{{$library->Pages}}</td>
            <td>{{$library->Year}}</td>
            <td>
                <a href="{{route('edit',$library->id)}}" class="btn btn-success">Edit</a>
                <form action="{{route('delete',$library->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
