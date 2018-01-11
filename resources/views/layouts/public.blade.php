<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <!-- Styles -->
    <style>
      html, body
      {
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }
    </style>
  </head>
  <body class="hasBackground">
    <nav class="navbar is-transparent">
      <div class="navbar-brand">
        <a class="navbar-item" href="">
          <strong>treXplore.me</strong>
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="">
            Home
          </a>
        </div>
      </div>
    </nav>
    @yield('content')
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
  </body>
</html>