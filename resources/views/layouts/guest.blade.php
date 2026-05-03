<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ !empty($siteCompany?->logo) ? asset($siteCompany->logo) : asset('favicon.ico') }}">
        <link rel="shortcut icon" href="{{ !empty($siteCompany?->logo) ? asset($siteCompany->logo) : asset('favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ !empty($siteCompany?->logo) ? asset($siteCompany->logo) : asset('favicon.ico') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-8 sm:pt-10 px-4 bg-[radial-gradient(circle_at_top,_#e2e8f0_0%,_#f8fafc_40%,_#f1f5f9_100%)]">
            <div>
                <a href="/">
                    <x-application-logo class="w-16 h-16 fill-current text-slate-600" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white/95 shadow-xl border border-slate-200 overflow-hidden rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
