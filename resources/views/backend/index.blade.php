<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}backEndSource/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/') }}backEndSource/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}backEndSource/dist/css/adminlte.min.css">

    @yield('css_page')

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('/') }}backEndSource/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        @include('backend.layouts.nav')

        @include('backend.layouts.sidebar')
        @yield('content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('/') }}backEndSource/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('/') }}backEndSource/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('/') }}backEndSource/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('/') }}backEndSource/dist/js/adminlte.js"></script>

        <!-- PAGE {{ asset('/') }}backEndSource/PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('/') }}backEndSource/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="{{ asset('/') }}backEndSource/plugins/raphael/raphael.min.js"></script>
        <script src="{{ asset('/') }}backEndSource/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="{{ asset('/') }}backEndSource/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="{{ asset('/') }}backEndSource/plugins/chart.js/Chart.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('/') }}backEndSource/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('/') }}backEndSource/dist/js/pages/dashboard2.js"></script>
        @yield('js_page')
</body>

</html>
