@extends('layout')

@section('title')
New Category
@endsection

@section('main')

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    @endif

    <form action='{{url("/category/store")}}' method="post">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Category</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    @endsection

    