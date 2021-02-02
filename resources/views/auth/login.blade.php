@extends('layout')

@section('title')
Login
@endsection

@section('main')

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    @endif

<form action="{{ url('/login') }}" method= "post">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" name="email" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Password</label>
    <input type="password" name="password" class="form-control" id="inputAddress" >
  </div>
  <button type="submit" class="btn btn-primary">login</button>
</form>

    @endsection

    