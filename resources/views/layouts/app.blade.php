<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>{{ config('app.name', 'Yayasan Baitush Sholihin') }}</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('logoyayasan.ico') }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        <script src="https://unpkg.com/feather-icons"></script>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/feather-icons"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div>
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <a href="https://wa.me/+6282130639827" target="_blank" class="btn btn-success btn-floating position-fixed" id="btn-help" style="bottom: 20px; right: 20px;">
                <i class="bi bi-whatsapp"></i>
            </a>
            @include('layouts.footer')
        </div>
    </body>
</html>
