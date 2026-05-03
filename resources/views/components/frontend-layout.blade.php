<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
@props(['title', 'description', 'keywords'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ? $title . ' | ' . config('app.name', 'Global News') : config('app.name', 'Global News') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ !empty($siteCompany?->logo) ? asset($siteCompany->logo) : asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ !empty($siteCompany?->logo) ? asset($siteCompany->logo) : asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ !empty($siteCompany?->logo) ? asset($siteCompany->logo) : asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">
    
    <!-- Custom Scrollbar -->
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="font-sans antialiased bg-slate-50 text-slate-900 selection:bg-primary-600 selection:text-white">
    <x-frontend-header />

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-frontend-footer />

    <!-- Simple Scroll to Top -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-primary-600 text-white w-12 h-12 rounded-full shadow-2xl flex items-center justify-center opacity-0 translate-y-10 transition-all duration-300 hover:bg-primary-700 z-[100]">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Scroll to top functionality
        const scrollBtn = document.getElementById('scrollToTop');
        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollBtn.classList.remove('opacity-0', 'translate-y-10');
            } else {
                scrollBtn.classList.add('opacity-0', 'translate-y-10');
            }
        };
        scrollBtn.onclick = function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        // Context Menu Protection (Optional, but user had it)
        const disabledKeys = ["c", "C", "x", "J", "u", "I","s"];
        document.addEventListener("contextmenu", e => {
            // e.preventDefault();
        });
        document.addEventListener("keydown", e => {
            if((e.ctrlKey && disabledKeys.includes(e.key)) || e.key === "F12") {
                // e.preventDefault();
            }
        });
    </script>
</body>
</html>
