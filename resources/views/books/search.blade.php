@extends('layout')

@section('main')
<h1>All books {{$word}}</h1>
    @foreach($search as $book)
        <h3>{{ $book->name}}</h3>
        <p>{{ $book->desc}}</p>
        <hr>
    @endforeach

@endsection