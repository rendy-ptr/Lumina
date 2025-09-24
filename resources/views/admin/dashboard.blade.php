<x-layouts.admin-layout title="Dashboard - Lumina Blog">

    <div class="py-6">
        <!-- Welcome Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Good morning, Admin! ☀️</h1>
                    <p class="text-white/80">Here's what's happening with your blog today.</p>
                </div>
                <div class="text-right hidden md:block">
                    <p class="text-white/60 text-sm">{{ now()->format('l, F j, Y') }}</p>
                    <p class="text-white/80 text-lg font-medium">{{ now()->format('g:i A') }}</p>
                </div>
            </div>
        </div>

        <!-- Stats Overview - Enhanced Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Posts Card -->
            <div class="card-improved group">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-blue-500/20 to-purple-500/20">
                            <x-heroicon-o-document-text class="w-6 h-6 text-blue-400" />
                        </div>
                        <div class="text-right">
                            <p class="text-white/70 text-sm">Posts</p>
                            <h3 class="text-2xl font-bold text-white">24</h3>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-white/10">
                        <span class="text-green-400 text-sm font-medium flex items-center">
                            <x-heroicon-o-arrow-trending-up class="w-4 h-4 mr-1" />
                            +3 this month
                        </span>
                        <a href="{{ route('admin.posts.index') }}"
                            class="text-blue-400 hover:text-blue-300 text-sm font-medium">
                            View
                        </a>
                    </div>
                </div>
            </div>

            <!-- Views Card -->
            <div class="card-improved group">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-green-500/20 to-teal-500/20">
                            <x-heroicon-o-eye class="w-6 h-6 text-green-400" />
                        </div>
                        <div class="text-right">
                            <p class="text-white/70 text-sm">Total Views</p>
                            <h3 class="text-2xl font-bold text-white">1,248</h3>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-white/10">
                        <span class="text-green-400 text-sm font-medium flex items-center">
                            <x-heroicon-o-arrow-trending-up class="w-4 h-4 mr-1" />
                            +156 this month
                        </span>
                        <span class="text-white/60 text-sm">Avg: 52/post</span>
                    </div>
                </div>
            </div>

            <!-- Comments Card -->
            <div class="card-improved group">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-yellow-500/20 to-orange-500/20">
                            <x-heroicon-o-chat-bubble-left-right class="w-6 h-6 text-yellow-400" />
                        </div>
                        <div class="text-right">
                            <p class="text-white/70 text-sm">Comments</p>
                            <h3 class="text-2xl font-bold text-white">89</h3>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-white/10">
                        <span class="text-red-400 text-sm font-medium flex items-center">
                            <x-heroicon-o-exclamation-circle class="w-4 h-4 mr-1" />
                            5 pending
                        </span>
                        <a href="{{ route('admin.comments.index') }}"
                            class="text-yellow-400 hover:text-yellow-300 text-sm font-medium">
                            Review
                        </a>
                    </div>
                </div>
            </div>

            <!-- Engagement Card -->
            <div class="card-improved group">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-purple-500/20 to-pink-500/20">
                            <x-heroicon-o-heart class="w-6 h-6 text-purple-400" />
                        </div>
                        <div class="text-right">
                            <p class="text-white/70 text-sm">Engagement</p>
                            <h3 class="text-2xl font-bold text-white">4.2%</h3>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-white/10">
                        <span class="text-green-400 text-sm font-medium flex items-center">
                            <x-heroicon-o-arrow-trending-up class="w-4 h-4 mr-1" />
                            ↑ 0.3%
                        </span>
                        <span class="text-white/60 text-sm">Avg: 8.7%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Recent Posts -->
                <div class="card-improved">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white">Recent Posts</h2>
                            <a href="{{ route('admin.posts.index') }}"
                                class="text-purple-400 hover:text-purple-300 text-sm font-medium flex items-center">
                                View All
                                <x-heroicon-o-arrow-right class="w-4 h-4 ml-1" />
                            </a>
                        </div>

                        <div class="space-y-4">
                            @foreach ($recentPosts as $post)
                                <div
                                    class="flex items-center space-x-4 p-4 rounded-xl hover:bg-white/5 transition-colors group">
                                    <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}"
                                        class="w-16 h-16 rounded-xl object-cover flex-shrink-0 group-hover:scale-105 transition-transform">
                                    <div class="flex-1 min-w-0">
                                        <h3
                                            class="text-white font-semibold text-sm line-clamp-1 group-hover:text-purple-300 transition-colors">
                                            {{ $post->title }}</h3>
                                        <p class="text-white/60 text-xs mt-1">{{ $post->author->name }} •
                                            {{ $post->created_at->format('M j, Y') }}</p>
                                        <div class="flex items-center space-x-4 mt-2">
                                            <span class="text-white/50 text-xs flex items-center">
                                                <x-heroicon-o-eye class="w-3 h-3 mr-1" />
                                                {{ $post->views_count ?? 124 }}
                                            </span>
                                            <span class="text-white/50 text-xs flex items-center">
                                                <x-heroicon-o-chat-bubble-left-right class="w-3 h-3 mr-1" />
                                                {{ $post->comments_count ?? 8 }}
                                            </span>
                                            <span
                                                class="px-2 py-0.5 bg-purple-500/20 text-purple-300 rounded-full text-xs">
                                                {{ $post->category->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="p-2 text-white/70 hover:text-blue-400 hover:bg-white/10 rounded-lg transition-colors">
                                            <x-heroicon-o-pencil class="w-4 h-4" />
                                        </a>
                                        <button
                                            class="p-2 text-white/70 hover:text-red-400 hover:bg-white/10 rounded-lg transition-colors">
                                            <x-heroicon-o-trash class="w-4 h-4" />
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Chart Placeholder -->
                <div class="card-improved">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white">Performance Overview</h2>
                            <div class="flex space-x-2">
                                <button
                                    class="px-3 py-1 bg-purple-500/20 text-purple-300 text-xs rounded-lg">7D</button>
                                <button
                                    class="px-3 py-1 bg-white/10 text-white/70 text-xs rounded-lg hover:bg-white/20">30D</button>
                            </div>
                        </div>
                        <div
                            class="h-64 flex items-center justify-center bg-gradient-to-br from-white/5 to-white/10 rounded-xl">
                            <div class="text-center">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full p-4 mx-auto mb-4">
                                    <x-heroicon-o-chart-bar class="w-8 h-8 text-white" />
                                </div>
                                <p class="text-white/60">Analytics chart will be displayed here</p>
                                <p class="text-white/40 text-sm mt-1">Track your blog performance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-8">
                <!-- Quick Actions -->
                <div class="card-improved">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-white mb-6">Quick Actions</h2>
                        <div class="grid grid-cols-1 gap-4">
                            <a href="{{ route('admin.posts.create') }}"
                                class="flex items-center space-x-4 p-4 bg-gradient-to-r from-blue-500/10 to-purple-500/10 hover:from-blue-500/20 hover:to-purple-500/20 rounded-xl transition-all group border border-white/10">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl p-3 group-hover:scale-105 transition-transform">
                                    <x-heroicon-o-plus class="w-6 h-6 text-white" />
                                </div>
                                <div>
                                    <p class="text-white font-semibold">New Post</p>
                                    <p class="text-white/70 text-sm">Create a blog post</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.settings.index') }}"
                                class="flex items-center space-x-4 p-4 bg-gradient-to-r from-green-500/10 to-teal-500/10 hover:from-green-500/20 hover:to-teal-500/20 rounded-xl transition-all group border border-white/10">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl p-3 group-hover:scale-105 transition-transform">
                                    <x-heroicon-o-cog-6-tooth class="w-6 h-6 text-white" />
                                </div>
                                <div>
                                    <p class="text-white font-semibold">Settings</p>
                                    <p class="text-white/70 text-sm">Manage blog settings</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.categories.index') }}"
                                class="flex items-center space-x-4 p-4 bg-gradient-to-r from-yellow-500/10 to-orange-500/10 hover:from-yellow-500/20 hover:to-orange-500/20 rounded-xl transition-all group border border-white/10">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl p-3 group-hover:scale-105 transition-transform">
                                    <x-heroicon-o-tag class="w-6 h-6 text-white" />
                                </div>
                                <div>
                                    <p class="text-white font-semibold">Categories</p>
                                    <p class="text-white/70 text-sm">Manage post tags</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card-improved">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-white">Recent Activity</h2>
                            <span class="px-2 py-1 bg-purple-500/20 text-purple-300 text-xs rounded-full">Live</span>
                        </div>
                        <div class="space-y-4">
                            @foreach ($recentActivities as $activity)
                                <div
                                    class="flex items-start space-x-3 p-3 rounded-lg hover:bg-white/5 transition-colors">
                                    <div
                                        class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                        @if ($activity->type === 'post')
                                            <div
                                                class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                                                <x-heroicon-o-document-text class="w-4 h-4 text-blue-400" />
                                            </div>
                                        @elseif($activity->type === 'comment')
                                            <div
                                                class="w-8 h-8 bg-yellow-500/20 rounded-full flex items-center justify-center">
                                                <x-heroicon-o-chat-bubble-left-right class="w-4 h-4 text-yellow-400" />
                                            </div>
                                        @elseif($activity->type === 'settings')
                                            <div
                                                class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                                                <x-heroicon-o-cog-6-tooth class="w-4 h-4 text-green-400" />
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-white text-sm leading-tight">{{ $activity->message }}</p>
                                        <p class="text-white/50 text-xs mt-1">
                                            {{ $activity->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="card-improved">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-white mb-6">Quick Stats</h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-white/70 text-sm">Published Posts</span>
                                <span class="text-white font-semibold">24</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-white/70 text-sm">Draft Posts</span>
                                <span class="text-yellow-400 font-semibold">3</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-white/70 text-sm">Active Comments</span>
                                <span class="text-white font-semibold">89</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-white/70 text-sm">Categories</span>
                                <span class="text-white font-semibold">8</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.admin-layout>
