<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="asset('assets/img/apple-icon.png')">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        @yield('title', 'Voter')
    </title>

    <!-- Voter Styles -->
    @notifyCss
    @livewireStyles
    @votterStyles
</head>

<body class="g-sidenav-show  bg-gray-100">

    {{-- @include('notify::components.notify') --}}

    <!-- ========== Start sidebar ========== -->
    @include('pages.user.layouts.dashboard.sidebar')
    <!-- ========== End sidebar ========== -->


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <!-- ========== Start navbar ========== -->
        @include('pages.user.layouts.dashboard.navbar')
        <!-- ========== End navbar ========== -->

        <div class="container-fluid py-4 px-5">

            {{-- Content --}}

            @yield('content')

            <!-- ========== Start Footer ========== -->
            @include('pages.user.layouts.dashboard.footer')
            <!-- ========== End Footer ========== -->

        </div>
    </main>
    <!-- ========== Start page-setting ========== -->
    @include('pages.user.layouts.dashboard.page-setting')
    <!-- ========== End page-setting ========== -->

    <x-notify::notify />

    <!--   Core JS Files   -->
    @votterJs
    @notifyJs

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    @livewireScripts
</body>

</html>
