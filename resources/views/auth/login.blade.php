@extends('layout.layout')

@section('title','login')

@section('content')

<div class="form">
    <div class="form-panel one">
            <h1>Account Login</h1>
    </div>
      
    <div class="form-content">
      {{-- Aksi ke route 'login' --}}
        <form method="post" action="{{ route('login') }}">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" required="required"/>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" required="required"/>
            </div>
          
            <div class="form-group">
              <button type="submit" name="login">Log In</button>
            </div>
            <div class="form-group">
              <p>
              Not yet a member? <a href="{{ route('register') }}" style="text-decoration: none">Sign up</a>
              </p>
            </div>
        </form>
    </div>


@endsection