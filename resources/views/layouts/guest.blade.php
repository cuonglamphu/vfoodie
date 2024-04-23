<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link href="../styles/main.css" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

<div
    class="min-h-screen flex flex-row sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 justify-content-center sm:justify-content-center">
    <div class="col-8 flex justify-center flex-col flex-md-row content-center  ">
        <div class="col-12 col-sm-6 flex justify-center flex-col content-center  mx-auto mx-md-2" style="width: 15rem">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
            <x-slogan></x-slogan>
        </div>

        <div
            class="col-12  col-sm-6 mt-6 px-6 py-4 bg-white bg-green-500 shadow-md overflow-hidden sm:rounded-lg w-full sm:max-w-md mx-auto mx-md-2 z-1">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>:
