<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
</head>
<body class="bg-white">
        @include('inc.nav')

    <div class="md:px-80">
            @yield('content')
    </div>

</body>
</html>