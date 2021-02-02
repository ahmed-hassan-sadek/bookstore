@extends('layout')

@section('main')
<h1>All Category {{$word}}</h1>
    @foreach($search as $category)
        <h3>{{ $category->name}}</h3>
        <a class="btn btn-primary" href='{{url("/category")}}'>home</a>
        <hr>
    @endforeach

@endsection