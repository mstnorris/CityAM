<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>City A.M.</title>

        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

        @stack('styles')

    </head>
    <body>

        @include('partials._navigation')

        @yield('content')

        @include('partials._footer')

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
