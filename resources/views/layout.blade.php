<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore | @yield("title")</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    @yield("style")
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      @auth
      <form action="{{ url('/logout') }}" method="post">
      @csrf
        <input class="btn btn-info" type="submit" value="Logout">
      </form>
      @endauth
      </li>
      @guest
      <li class="nav-item active">
        <a class="btn btn-info" href="{{ url('/login') }}">Login</a>
      </li>
      <li class="nav-item active">
        <a class="btn btn-info" href="{{ url('/register') }}">Register</a>
      </li>
      @endguest
    </ul>
  </div>
</nav>

<div class="container py-5">
    @yield('main')
</div>


<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
@yield("script")
</body>
</html>