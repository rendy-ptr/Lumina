<div class="px-8 pb-8">
    <h1 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
        {{ $blog->title }}
    </h1>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 pb-6 border-b border-white/10">
        <div class="flex items-center space-x-4">
            <img src="{{ $blog->user->authorProfile->avatar_url }}" alt="{{ $blog->user->name }}"
                class="w-12 h-12 rounded-full border-2 border-white/20">
            <div>
                <p class="text-white font-semibold">
                    {{ $blog->user->name }}
                </p>
                <div class="flex items-center space-x-2 text-white/50 text-sm">
                    <span>{{ $blog->created_at->format('F j, Y') }}</span>
                    <span>•</span>
                    <span>{{ $blog->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <!-- Like Button -->
            <button
                class="like-btn flex items-center space-x-2 px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-all"
                data-post-id="{{ $blog->id }}" data-liked="false">
                <x-heroicon-o-heart class="w-5 h-5 text-white/50 group-hover:text-red-400" />
                <span class="like-count text-white/70">{{ $blog->likes_count }}</span>
            </button>

            <!-- Share Button -->
            <button class="share-btn btn-glass px-4 py-2 rounded-xl flex items-center space-x-2">
                <x-heroicon-o-share class="w-5 h-5" />
                <span class="hidden sm:inline">Share</span>
            </button>
        </div>
    </div>

    <!-- Article Content -->
    <div
        class="prose prose-invert max-w-none prose-headings:text-white prose-p:text-white/80 prose-a:text-purple-400 hover:prose-a:text-purple-300 prose-strong:text-white prose-em:text-white/90 prose-li:text-white/80 prose-img:rounded-2xl prose-img:shadow-xl">
        {{-- Ganti dengan excerpt dari post --}}
        <p class="text-xl text-white/90 font-medium mb-8 leading-relaxed">
            {{ $blog->excerpt }}
        </p>

        <div class="space-y-6 text-white/80 leading-relaxed">
            {!! $blog->content !!}
        </div>
    </div>
</div>
