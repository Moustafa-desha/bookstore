@extends('layouts/app')
@section('title')
BOOKS | List
@endsection
@section('content')
<h1>First View</h1>
@foreach($books as $book)
<h3><a href="{{url('books/show',$book->id)}}">{{$book->name}}</a></h3>
<p>{{$book->desc}}</p>
<hr>
@endforeach

@endsection
