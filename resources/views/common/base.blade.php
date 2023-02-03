<!DOCTYPE html>
<html lang="es">

<head>
    <title>Voluntariado Magtel - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo asset('css/reset.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/base.css'); ?>" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" href="<?php echo asset('images/favicon.png'); ?>" />

    @yield('library')
</head>

<body>
    <header>
        @include('common.header')
    </header>
    <div id="main">
        @yield('content')
    </div>
    <footer>
        @include('common.footer')
    </footer>
</body>

</html>
