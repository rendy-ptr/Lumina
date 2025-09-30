<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title }} </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="min-h-screen pt-16">
    <!-- Animated Background -->
    <div class="animated-bg"></div>

    <!-- Navigation -->
    <x-navbar.shared.main />

    {{ $slot }}

    <!-- Footer -->
    <x-footer.shared.main />

    <!-- Scroll to Top Button -->
    <x-shared.scroll-to-top />


</body>

</html>
