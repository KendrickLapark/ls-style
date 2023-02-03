<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Voluntariado Magtel - @yield('title')</title>
    <link rel="stylesheet" href="<?php echo asset('css/reset.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/baseDashboard.css'); ?>" type="text/css">
    <link rel="icon" type="image/png" href="<?php echo asset('images/favicon.png'); ?>" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('headlibraries')
</head>

<body>
    @include('dashboard.partials.leftBar')

    <section class="home-section">
        <nav>
            @include('dashboard.partials.header')
        </nav>

        <div class="home-content">
            @yield('content')
        </div>
    </section>

    <script type="text/javascript">
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        let img = document.getElementById("logoImg");

        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                img.src = <?php echo json_encode(asset('images/fm_blanco.png')); ?>;
                <?php session()->put('status', '1'); ?>
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                img.src = <?php echo json_encode(asset('images/logoNeg.jpg')); ?>;
                <?php session()->forget('status'); ?>
            }
        }
    </script>

</body>

</html>
