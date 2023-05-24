<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- META --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Pohang">
    <meta name="description" content="All I can say is this project was developed by using Laravel Framework, at least for now.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- TITLE --}}
    <title>{{ config('app.name', 'Laravel') }}&mdash;@yield('title')</title>

    {{-- FAVICON --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- FONTS --}}
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito"> --}}

    {{-- STYLESHEET --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="{{ asset('storage/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/predefined.css') }}">

    {{-- SCRIPTS --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" defer="" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" defer="" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="{{ asset('storage/js/jquery-3.6.0.min.js') }}" defer=""></script>
    <script src="{{ asset('storage/js/bootstrap.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('storage/js/predefined.js') }}" defer=""></script>

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    @include('sweetalert::alert')
    <div id="app">
        @include('components.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
