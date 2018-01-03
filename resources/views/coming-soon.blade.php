@extends('layouts.public')

@section('content')
<!--
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
@endif
-->
  <div class="container has-text-centered">
    <form method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="column is-6 is-offset-3">
        <h1 class="title">
          Traxplore - Coming Soon
        </h1>
        <!--<h2 class="subtitle"></h2>-->
        <div class="box">
          <div class="field is-grouped">
            <p class="control is-expanded">
              <input class="input" type="text" name="email" placeholder="Enter your email">
            </p>
            <p class="control">
              <button class="button is-info">Notify Me</button>
            </p>
          </div>
            @if( $errors -> any() )
              <p class="help is-danger">{{ $errors -> first() }}</p>
            @elseif( session('success') )
              <p class="help is-success">Thank you very much for your interest. We will inform you as soon as the app goes live!</p>
            @endif
        </div>
      </div>
    </form>
  </div>
@endsection('content')