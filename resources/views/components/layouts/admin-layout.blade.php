<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} - Lumina Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])

</head>

<body class="text-white min-h-screen">
    <!-- Animated Background -->
    <div class="animated-bg"></div>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 glass-strong  min-h-screen fixed inset-y-0 left-0 z-40">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 rounded-xl p-2 bg-gradient-to-br from-blue-500 to-purple-600 animate-glow">
                        <x-ri-gemini-line class="text-white w-6 h-6" />
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Lumina</h1>
                        <p class="text-purple-300 text-xs font-medium">Blog Platform</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center space-x-4 px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-purple-500/30 to-pink-500/30 text-white shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10' }} transition-all duration-200">
                        <x-heroicon-o-home class="w-5 h-5" />
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <a href="{{ route('admin.posts.index') }}"
                        class="flex items-center space-x-4 px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.posts.*') ? 'bg-gradient-to-r from-blue-500/30 to-purple-500/30 text-white shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10' }} transition-all duration-200">
                        <x-heroicon-o-document-text class="w-5 h-5" />
                        <span class="font-medium">Posts</span>
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center space-x-4 px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-green-500/30 to-teal-500/30 text-white shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10' }} transition-all duration-200">
                        <x-heroicon-o-tag class="w-5 h-5" />
                        <span class="font-medium">Categories</span>
                    </a>

                    <a href="{{ route('admin.comments.index') }}"
                        class="flex items-center space-x-4 px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.comments.*') ? 'bg-gradient-to-r from-yellow-500/30 to-orange-500/30 text-white shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10' }} transition-all duration-200">
                        <x-heroicon-o-chat-bubble-left-right class="w-5 h-5" />
                        <span class="font-medium">Comments</span>
                    </a>

                    <a href="{{ route('admin.settings.index') }}"
                        class="flex items-center space-x-4 px-4 py-3.5 rounded-xl {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-purple-500/30 to-pink-500/30 text-white shadow-md' : 'text-white/80 hover:text-white hover:bg-white/10' }} transition-all duration-200">
                        <x-heroicon-o-cog-6-tooth class="w-5 h-5" />
                        <span class="font-medium">Settings</span>
                    </a>
                </nav>
            </div>

            <!-- User Profile -->
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-white/15">
                <div class="flex items-center space-x-3">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face"
                        alt="Admin" class="w-10 h-10 rounded-full border-2 border-purple-400/50 shadow-sm">
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-semibold text-sm truncate">Admin User</p>
                        <p class="text-purple-300 text-xs">Administrator</p>
                    </div>
                    <button
                        class="p-2 text-white/60 hover:text-purple-400 rounded-lg hover:bg-white/10 transition-colors">
                        <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5" />
                    </button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <!-- Top Bar -->
            <header class="glass-strong sticky top-0 z-30">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button
                            class="lg:hidden p-2 rounded-lg hover:bg-white/10 text-white/80 hover:text-white transition-colors">
                            <x-heroicon-o-bars-3 class="w-6 h-6" />
                        </button>
                        <div class="relative">
                            <input type="text" placeholder="Search posts..."
                                class="pl-11 pr-4 py-2.5 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent w-72 backdrop-blur-sm transition-all">
                            <x-heroicon-o-magnifying-glass class="w-5 h-5 text-white/60 absolute left-4 top-3" />
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <button
                            class="p-2.5 rounded-lg hover:bg-white/10 text-white/80 hover:text-white transition-colors relative">
                            <x-heroicon-o-bell class="w-5 h-5" />
                            <span
                                class="absolute -top-1 -right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-gray-800"></span>
                        </button>

                        <a href="{{ route('home') }}"
                            class="p-2.5 rounded-lg hover:bg-white/10 text-white/80 hover:text-white transition-colors flex items-center space-x-2 group">
                            <x-heroicon-o-arrow-left class="w-5 h-5" />
                            <span class="text-sm font-medium hidden md:inline">Back to Site</span>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6 admin-content">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
