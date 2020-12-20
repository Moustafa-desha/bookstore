@extends('layouts/app')
@section('title')
Create | Book
@endsection
@section('content')
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<form method="post" action="{{url('books/store')}}">
   @csrf
    <input type="text" name="name" value="{{old('name')}}" placeholder="Name"/>
    <br>
    <input type="text" name="desc" value="{{old('desc')}}" placeholder="desc"/>
    <br>
     @foreach ($categories as $category)
       <input type="checkbox"  name="categories[]" value="{{$category->id}}">
       {{$category->name}}|

     @endforeach
     <br>
    <input type="submit" value="Add"/>

    
</form>
@endsection
