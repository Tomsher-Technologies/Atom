<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} - {{ $title ?? '' }}</title>
    <link rel="icon" type="image/svg" href="{{ asset('adminassets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ adminAsset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/bootstrap-float-label.min.css') }}" />
    @stack('header')
    <link rel="stylesheet" href="{{ adminAsset('css/main.css') }}" />
</head>

<body class="{{ $body_class ?? '' }}">
    <div class="fixed-background"></div>
    <main>
        @yield('content')
    </main>

    <script src="{{ adminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ adminAsset('js/dore.script.js') }}"></script>
    @stack('footer')
    <script src="{{ adminAsset('js/scripts.js') }}"></script>
</body>

</html>
