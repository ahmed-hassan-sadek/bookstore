@extends('layout')

@section('title')
All Books
@endsection

@section('main')


<h1>All books</h1>
@auth
<a class="btn btn-primary" href="{{ url('books/create') }}">create</a><hr>
@endauth
    @foreach($books as $book)
    
    <img src='{{ asset("uploads/$book->image") }}' class="img-thumbnail"  width="100px" height="100px" >

        <h3>
            <a href='{{url("/books/show/{$book->id}")}}'>
                {{ $book->name}}
            </a>
        </h3>
        <p>{{ $book->Category->name}}</p>
        <p>{{ $book->desc}}</p>
        @auth
        <a href='{{url("books/edit/{$book->id}")}}' class="btn btn-sm btn-info">Edit</a>
        <a href='{{url("books/delete/{$book->id}")}}' class="btn btn-sm btn-danger">delete</a>
        @endauth
        <hr>
    @endforeach

    {{$books->links()}}



@endsection