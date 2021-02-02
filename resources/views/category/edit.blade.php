@extends('layout')

@section('title')
Edit Category
@endsection

@section('main')

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    @endif
    <form action='{{url("/category/update/{$edit->id}")}}' method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name Category</label>
            <input name="name" type="text" value="{{$edit->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection