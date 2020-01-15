<html>
    <head>
        <title>Passerine</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            body {
                padding: 1em;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Passerine</a>
                @yield('navbar-nav')
            </nav>
        </div>
        <div class="container">
            @yield('body')
        </div>
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
        @yield('javascript')
    </body>
</html>


<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
  </nav>
-->
