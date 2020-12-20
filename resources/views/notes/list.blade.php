@extends('layouts/app')
@section('title')
Note
@endsection
@section('content')
<form method="post" action="{{url('users/addnote')}}">
  @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Add Note</label>
    <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
  <button type="submit" class="btn btn-primary">ADD</button>
</form>


@foreach(Auth::user()->notes as $note)
<div class="alert alert-success" >{{$note->content}}</div>
@endforeach


@endsection