<div class="card mb-12 overflow-hidden group">
    <div class="md:flex">
        <div class="md:w-1/2 relative overflow-hidden">
            <img src={{ $featuredPost->thumbnail_url }} alt={{ $featuredPost->title }}
                class="w-full h-64 md:h-96 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
        </div>
        <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <span class="text-purple-400 text-sm font-semibold mb-3">FEATURED</span>
            <h3 class="text-2xl md:text-3xl font-bold text-white mb-4 leading-tight">
                {{ $featuredPost->title }}
            </h3>
            <p class="text-white/70 mb-6 leading-relaxed">
                {{ $featuredPost->excerpt }}
            </p>
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <img src={{ $featuredPost->user->avatar_url }} alt={{ $featuredPost->user->name }}
                        class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-white font-medium">{{ $featuredPost->user->name }}</p>
                        <p class="text-white/50 text-sm"> {{ $featuredPost->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
                <a href="{{ route('blog.show', $featuredPost->slug) }}">
                    <button
                        class="btn-glass px-4 py-2 rounded-xl text-sm text-white hover:text-purple-300 cursor-pointer">
                        Read More →
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
