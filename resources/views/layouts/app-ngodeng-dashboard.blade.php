<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- META --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Pohang">
    <meta name="description" content="AAAAAAAAA">
    <meta name="keywords" content="laravel, web, application">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- TITLE --}}
    <title>NGODENG&mdash;@yield('title')</title>

    {{-- FAVICON --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- FONTS
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&display=swap">
    --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;1,400;1,600&display=swap">

    {{-- STYLESHEET --}}
    {{-- ONLINE
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" integrity="sha256-7jUS+MWeqkFdmW9ozkZ7mPagz+QmMbsBlt+Q3MsE+FU=" crossorigin="anonymous" referrerpolicy="no-referrer">
    --}}

    {{-- OFFLINE
    --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.0.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ngodeng-panel.css') }}">

    {{-- SCRIPTS --}}
    {{-- ONLINE
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" defer="" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" defer="" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js" defer="" integrity="sha256-2Dbg51yxfa7qZ8CSKqsNxHtph8UHdgbzxXF9ANtyJHo=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    --}}

    {{-- OFFLINE
    --}}
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer=""></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}" defer=""></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>
    <script src="{{ asset('js/bootstrap-5.3.0.bundle.min.js') }}" defer=""></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}" defer=""></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" defer=""></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}" defer=""></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}" defer=""></script>
    <script src="{{ asset('js/responsive.bootstrap5.js') }}" defer=""></script>
    <script src="{{ asset('js/dataTables.editor.min.js') }}" defer=""></script>
    <script src="{{ asset('js/select2.min.js') }}" defer=""></script>
    <script src="{{ asset('js/mixitup.min.js') }}" defer=""></script>
    <script src="{{ asset('js/chart.min.js') }}" defer=""></script>
    <script src="{{ asset('js/ngodeng-panel.js') }}" defer=""></script>

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body id="body-pd">
    @include('components.loader')
    @include('components.modal')
    @include('components.modal-body-only')
    @include('sweetalert::alert')
    @include('pages.ngodeng.sidebar')
    @yield('content')
    @include('pages.ngodeng.scripts')
</body>
</html>