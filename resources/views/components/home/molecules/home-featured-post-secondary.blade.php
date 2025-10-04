<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse ($otherTopPosts as $otherTopPost)
        <article class="card overflow-hidden group">
            <div class="relative overflow-hidden">
                <img src={{ $otherTopPost->thumbnail_url }} alt={{ $otherTopPost->title }}
                    class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute top-4 left-4">
                    <span
                        class="px-3 py-1 rounded-full bg-gradient-to-r from-blue-500/80 to-purple-500/80 backdrop-blur-md text-white text-xs font-semibold">
                        {{ $otherTopPost->category->name }}
                    </span>
                </div>
            </div>
            <div class="p-6">
                <a href="{{ route('blog.show', $otherTopPost->slug) }}" class="hover:cursor-pointer hover:underline">
                    <h3
                        class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-purple-300 transition-colors">
                        {{ $otherTopPost->title }}
                    </h3>
                </a>
                <p class="text-white/70 text-sm mb-4 line-clamp-3">
                    {{ $otherTopPost->excerpt }}
                </p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <img src={{ $otherTopPost->user->avatar_url }} alt="Author" class="w-8 h-8 rounded-full">
                        <span class="text-white/70 text-sm">{{ $otherTopPost->user->name }}</span>
                    </div>
                    <span class="text-white/50 text-xs">{{ $otherTopPost->created_at->format('F d, Y') }}</span>
                </div>
            </div>
        </article>
    @empty
        <p class="text-white">No other top posts available.</p>
    @endforelse
</div>
