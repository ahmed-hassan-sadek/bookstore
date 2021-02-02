@extends('layout')

@section('title')
New Book
@endsection

@section('main')

    @if($errors->any())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    @endif

    <form action='{{url("/books/store")}}' method="post"enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name Book</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Descripation</label>
    <textarea name="desc" class="form-control" id="exampleInputPassword1" cols="30" rows="10"></textarea>
  </div>
  <div class="form-group">
  <label for="exampleFormControlSelect2">select category</label><br>
    <select class="form-select" aria-label="Default select example" name="category_id">
      @foreach($category as $item)
      <option value="{{$item->id}}">{{$item->name}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    @endsection

    