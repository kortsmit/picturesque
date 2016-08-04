<!DOCTYPE html>
<html>

    <head>
        <title>Blog</title>

        <meta id="csrf-token" value="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    </head>

    <body>

        <div class="container">
            <div id="app"></div>
        </div>

        <script src="{{ elixir('js/app.js') }}"></script>

    </body>
</html>
