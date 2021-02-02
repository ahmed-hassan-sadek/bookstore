@extends('layout')

@section('title')
Show Book
@endsection

@section('main')

    <h1>{{$book->name}}</h1>
    <p>{{ $book->Category->name}}</p>
    <p>{{$book->desc}}</p>
    <p> <b>created at ::</b> {{$book->created_at}}</p>
    <hr>
    <a href='{{url("/books")}}'>home</a>
@endsection