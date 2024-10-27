<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon.webp') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.webp') }}">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>

<body class="">
  @include('pages.user.layouts.auth.navbar')

  <main class="main-content  mt-0">
    <section>
      @yield('content')
    </section>
  </main>

  @include('pages.user.layouts.auth.footer')
</body>

</html>