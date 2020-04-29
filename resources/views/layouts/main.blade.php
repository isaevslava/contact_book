<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Book</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('home') }}">Import Contacts</a>
    </nav>
</header>
<main id="app">
    @yield('content')
</main>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
