@extends('layouts/app')
@section('title')
Categories
@endsection
@section('content')
<form method="post" action="{{url('categories/addcategory')}}">
  @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
  <button type="submit" class="btn btn-primary">ADD</button>
</form>


@foreach($categories as $category)
<div class="alert alert-success" >{{$category->name}}</div>


@endforeach
@endsection