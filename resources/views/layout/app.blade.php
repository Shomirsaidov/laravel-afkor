<!DOCTYPE html>
<html lang="en">
<head>
    <meta property="og:title" content="Мир шитья Душанбе">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://sewing-world.shop">
    <meta property="og:image" content="https://sewing-world.shop/assets/shadowed_logo.png">
    <meta property="og:description" content="Первый интернет магазин в Таджикистане по продаже швейного оборудования и аксессуаров. Доставка по всей стране.">
    <meta property="og:site_name" content="sewing-world.shop">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/main2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')



</head>
<body class="bg-white">
    
    @include('inc.nav')

    <div class="px-4 lg:px-80 mt-20 pt-8">
            @yield('content')
    </div>

    @include('inc.footer')


</body>
</html>