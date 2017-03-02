<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vue 2.0 Testing</title>

    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">

    <script>
		window.Laravel = { csrfToken: '{{ csrf_token() }}' };
    </script>
</head>
<body>
{{--<h1>Home</h1>--}}
{{--<p>--}}
{{--<router-link to="/">Home</router-link>--}}
{{--<router-link to="/blog">Login</router-link>--}}
{{--<router-link to="/about">Admin</router-link>--}}
{{--</p>--}}
{{--<router-view></router-view>--}}
<div id="app"></div>

<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>