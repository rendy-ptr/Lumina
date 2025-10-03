@props(['title' => 'Author Workspace'])

@php
    $user = auth()->user();
    $avatar = $user?->profile_photo_url
        ?? $user?->visitorProfile?->avatar_url
        ?? $user?->authorProfile?->avatar_url
        ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name);
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | Lumina Author</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="min-h-screen text-white">
    <div class="animated-bg"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <header class="glass-strong border-b border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('author.dashboard') }}" class="flex items-center space-x-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-blue-500 shadow-lg">
                            <x-heroicon-o-pencil class="w-5 h-5 text-white" />
                        </span>
                        <div>
                            <p class="text-sm uppercase tracking-[0.3em] text-white/50">Author</p>
                            <h1 class="text-base font-semibold text-white">Lumina Studio</h1>
                        </div>
                    </a>
                    <nav class="hidden md:flex items-center space-x-3 text-sm">
                        <a href="{{ route('author.dashboard') }}"
                            class="px-4 py-2 rounded-xl transition {{ request()->routeIs('author.dashboard') ? 'bg-white/10 text-white' : 'text-white/70 hover:text-white hover:bg-white/5' }}">Dashboard</a>
                        <a href="{{ route('author.posts.index') }}"
                            class="px-4 py-2 rounded-xl transition {{ request()->routeIs('author.posts.*') ? 'bg-white/10 text-white' : 'text-white/70 hover:text-white hover:bg-white/5' }}">Articles</a>
                        <a href="{{ route('author.profile.edit') }}"
                            class="px-4 py-2 rounded-xl transition {{ request()->routeIs('author.profile.*') ? 'bg-white/10 text-white' : 'text-white/70 hover:text-white hover:bg-white/5' }}">Profile</a>
                    </nav>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="#"
                        class="hidden sm:inline-flex items-center space-x-2 px-3 py-2 rounded-xl text-xs font-medium text-white/70 hover:text-white hover:bg-white/10 transition">
                        <x-heroicon-o-sparkles class="w-4 h-4" />
                        <span>Creator resources</span>
                    </a>
                    <div class="flex items-center space-x-3 bg-white/5 border border-white/10 rounded-2xl px-3 py-2">
                        <img src="{{ $avatar }}" alt="{{ $user->name ?? 'Author' }}" class="w-9 h-9 rounded-xl object-cover">
                        <div>
                            <p class="text-sm font-medium text-white">{{ $user->name ?? 'Author' }}</p>
                            <p class="text-xs text-white/50">{{ $user->email ?? 'author@example.com' }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="ml-2 inline-flex items-center justify-center w-8 h-8 rounded-xl text-white/60 hover:text-white hover:bg-white/10 transition">
                                <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5" />
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 w-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                {{ $slot }}
            </div>
        </main>

        <footer class="py-6 text-center text-xs text-white/40">
            &copy; {{ date('Y') }} Lumina Author Studio. Keep sharing your voice.
        </footer>
    </div>
</body>

</html>
