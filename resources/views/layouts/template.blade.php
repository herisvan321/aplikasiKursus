<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kursus Bahasa inggris</title>
    @include("layouts.include.linkheader")
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include("layouts.include.navbar")
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ asset('/assets/index3.html') }}" class="brand-link">
                <img src="{{ asset('/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>
            @include("layouts.include.sidebar")
        </aside>
        <div class="content-wrapper">

            @include("pages.include.pesan")
            @yield('content')
        </div>

        @include("layouts.include.footer")
    </div>
    <!-- ./wrapper -->
    @include("layouts.include.linkfooter")
</body>

</html>
