<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coderockr</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <div id="app">
        @yield('content')
    </div>
    <script src="https://use.fontawesome.com/00046d1603.js"></script>
</body>

</html>