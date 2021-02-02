@extends('layout')

@section('title')
Show Category
@endsection

@section('main')

    <h1>{{$category->name}}</h1>
    <p> <b>created at ::</b> {{$category->created_at}}</p>
    <hr>

    @foreach($category->books as $book)
    <a href='{{ url("/books/show/{$book->id}") }}'><p>{{ $book->name }}</p></a>
    @endforeach
    <a class="btn btn-primary" href='{{url("/category")}}'>home</a>
@endsection