<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

    </head>
    <body class="min-h-screen bg-slate-100">
        <button id="theme-toggle" class="fixed top-4 right-4 z-20 rounded-full border border-slate-300 bg-slate-50 px-3 py-2 text-sm transition hover:bg-slate-100">🌙 Dark</button>
        @yield('content')
    </body>
</html>
