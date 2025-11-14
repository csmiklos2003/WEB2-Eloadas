<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>{{ config('app.name', 'WEB2') }}</title>

    <!-- Escape Velocity CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <noscript><link rel="stylesheet" href="{{ asset('css/noscript.css') }}"></noscript>

    <!-- Font Awesome (ikonokhoz, pl. Twitter, Facebook, stb.) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-TbSLZ5m0n0Xo5m6a6fqYUwBo+aR7bFQSMBzDo4klQW5Ek2+48P2vqIvTQZ4GmFTyU8f4w2F6dR1vTyd3D+4Kqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="is-preload">
    <!-- Header -->
    @include('layouts.navigation')

    <!-- Main content -->
    <div id="main">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Escape Velocity JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/browser.min.js') }}"></script>
    <script src="{{ asset('js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('js/util.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
