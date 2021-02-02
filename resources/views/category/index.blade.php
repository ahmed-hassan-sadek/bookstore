@extends('layout')

@section('title')
All Category
@endsection

@section('main')


<h1>All category</h1>
@auth
<a class="btn btn-primary" href="{{ url('category/create') }}">create</a><hr>
@endauth
    @foreach($categoryies as $category)

        <h3>
            <a class="primary" href='{{url("/category/show/{$category->id}")}}'>
                {{ $category->name}}
            </a>
        </h3>
        @auth
        <a href='{{url("category/edit/{$category->id}")}}' class="btn btn-sm btn-info">Edit</a>
        <a href='{{url("category/delete/{$category->id}")}}' class="btn btn-sm btn-danger">delete</a>
        @endauth
        <hr>
    @endforeach

    {{$categoryies->links()}}



@endsection