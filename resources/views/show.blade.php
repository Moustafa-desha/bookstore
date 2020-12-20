@extends('layouts/app')
@section('title')
BOOK INFO|{{$book->name}}
@endsection
@section('content')
<a href="{{url('books/edit',$book->id)}}">Edit</a></br>
<a href="{{url('books/delete',$book->id)}}">Delete</a>


<h1>{{$book->name}}</h1>
<h5>{{$book->desc}}</h5>

@foreach($book->categories as $category)
{{$category->name}}|
@endforeach
@endsection