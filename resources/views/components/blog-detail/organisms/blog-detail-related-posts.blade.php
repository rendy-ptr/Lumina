<div class="mt-12">
    <h2 class="text-2xl font-bold text-white mb-8">Related Articles by {{ $blog->user->name }}</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($relatedBlogs as $relatedBlog)
            <div class="card overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ $relatedBlog->thumbnail_url }}" alt="{{ $relatedBlog->title }}"
                        class="w-full h-40 object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute top-3 left-3">
                        <span
                            class="px-2 py-1 rounded-full bg-gradient-to-r from-purple-500/80 to-pink-500/80 backdrop-blur-md text-white text-xs font-semibold">
                            {{ $relatedBlog->category?->name }}
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <a href="{{ route('blog.show', $relatedBlog->slug) }}">
                        <h3
                            class="text-lg font-bold text-white mb-2 line-clamp-2 group-hover:text-purple-300 transition-colors">
                            {{ $relatedBlog->title }}
                        </h3>
                    </a>
                    <div class="flex items-center justify-between text-white/50 text-xs">
                        <span>{{ $relatedBlog->created_at->format('M j, Y') }}</span>
                        <span>{{ $relatedBlog->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-white/50 col-span-full">No related articles found.</p>
        @endforelse
    </div>
</div>
