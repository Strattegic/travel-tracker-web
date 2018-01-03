<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>traXplore - traveling safe</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <!-- <div id="map" style="height: 50%; width: 100%;"></div> -->
        <section class="hero is-info is-fullheight">
            <div class="hero-body">
                @yield('content')
            </div>
        </section>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>