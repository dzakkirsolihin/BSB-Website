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
        <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@400;700&display=swap" rel="stylesheet"/>
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
        
        <!-- AOS CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        
        <!-- Animate CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Feather Icons -->
        <script src="https://unpkg.com/feather-icons"></script>
        
        <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 overflow-hidden">
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
            
            <!-- WhatsApp Button -->
            <a href="https://wa.me/+6282130639827" target="_blank" class="btn btn-success btn-floating position-fixed" id="btn-help" style="bottom: 20px; right: 20px;">
                <i class="bi bi-whatsapp"></i>
            </a>

            @include('layouts.footer')
        </div>

        <script>
            // Initialize AOS
            document.addEventListener('DOMContentLoaded', function() {
                AOS.init({
                    duration: 1000,
                    once: true,
                    disable: 'mobile' // Disable on mobile devices
                });
            });

            // Initialize Feather Icons
            feather.replace();
        </script>
    </body>
</html>