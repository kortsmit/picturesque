<!DOCTYPE html>
<html>

    <head>
        <title>Blog</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta id="csrf-token" value="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    </head>

    <body>
        <div id="app"></div>

        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
