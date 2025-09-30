<div class="mt-12">
    <h2 class="text-2xl font-bold text-white mb-8">Related Articles by {{ $blog->user->name }}</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($relatedBlogs->take(3) as $relatedBlog)
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
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <img src="{{ $relatedBlog->user->authorProfile->avatar_url }}"
                                alt="{{ $relatedBlog->user->name }}"
                                class="w-10 h-10 rounded-full border-2 border-white/20">
                            <div>
                                <p class="text-white font-medium text-sm text-left">
                                    {{ $relatedBlog->user->name }}
                                </p>
                                <p class="text-white/50 text-xs text-left">
                                    {{ $relatedBlog->created_at->format('F j, Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1 text-white/50 text-xs">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-white/50 text-xs">
                                {{ $relatedBlog->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-white/50 col-span-full">No related articles found.</p>
        @endforelse
    </div>
    <div class="mt-12 flex justify-center items-center">
        <a href="{{ route('blog.byAuthor', $blog->user->id) }}">
            <button class="btn-primary px-4 py-2 rounded-xl font-medium">
                Read More Related Articles By {{ $blog->user->name }}
            </button>
        </a>
    </div>
</div>
