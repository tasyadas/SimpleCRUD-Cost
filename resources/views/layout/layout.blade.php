<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="css/style.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> --}}
</head>
<body>

<nav>
    <ul>
      {{-- cek jika login tampilkan menu logout home dan pengeluaran --}}
      @if (\Auth::check())
        <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              Logout
            </a>
        </li>
        <li>
        <a href="{{ route('home') }}">Home</a>
        </li>
        <li>
        <a href="{{ route('pengeluaran')}}">Pengeluaran</a>
        </li>
      {{-- jika tidak tampilkan home --}}
      @else
      <li>
          <a href="/">Home</a>
      </li>
      <li>
      <a href="{{ route('login') }}">Login</a>
      </li>
      @endif
    </ul>
</nav>

<div class="container">
  {{-- <div class="putar"></div> --}}
  {{-- <div class="putar2"><img src="/img/logo2.png"></div> --}}
</div>
@yield('content')

    

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
</body>
</html>

{{-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Tasya</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pengeluaran">Pengeluaran</a>
      </li>
    </ul>
  </nav> --}}