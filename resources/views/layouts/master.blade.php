<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">

    <title>Eshop</title>

    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>

<body style="">

<div class="container mx-auto">
    @include('layouts.header')
</div>

<main role="main" class="container px-8 mx-auto xl:px-5 max-w-screen-lg py-5 lg:py-8 mb-10">
    @yield('content')
</main>

@include('layouts.footer')

</body>
</html>
