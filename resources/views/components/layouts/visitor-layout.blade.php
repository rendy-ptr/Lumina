@props(['title' => 'Visitor Dashboard'])

@php
    $user = auth()->user();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | Lumina Visitor</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="min-h-screen text-white">
    <div class="animated-bg"></div>

    <div class="relative z-10 min-h-screen flex flex-col">

        <main class="flex-1 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
