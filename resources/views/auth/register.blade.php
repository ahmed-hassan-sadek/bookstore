@extends('layout')

@section('title')
Register
@endsection

@section('main')

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    @endif

<form action="{{ url('/register') }}" method= "post">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">name</label>
      <input type="text" name="name" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" name="email" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Password</label>
    <input type="password" name="password" class="form-control" id="inputAddress" >
  </div>
  <div class="form-group">
    <label for="inputAddress">Password confirmation</label>
    <input type="password" name="password_confirmation" class="form-control" id="inputAddress" >
  <!-- </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  <button type="submit" class="btn btn-primary">register</button>
</form>

    @endsection

    