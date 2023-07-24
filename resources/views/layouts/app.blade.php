<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @yield('extra-css')
    <!-- End Styles -->

    <title>Personal Blog</title>
</head>
<body>
    <!-- Header -->
    @include('includes.header')
    <!-- End Header -->

    <div class="wrapper">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('extra-js')
    <!-- End Scripts -->
</body>
</html>
