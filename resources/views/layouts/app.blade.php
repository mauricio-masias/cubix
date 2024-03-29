<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cubix CMS') }}</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    </head>
<body>
    <div id="app">
        @include('nav')


        @yield('content')
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
