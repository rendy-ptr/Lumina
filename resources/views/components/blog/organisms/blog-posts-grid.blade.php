<section class="pb-20">
    <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($posts as $post)
                <article class="card overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}"
                            class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">

                        <div class="absolute top-4 left-4">
                            <span
                                class="px-3 py-1 rounded-full bg-gradient-to-r from-purple-500/80 to-pink-500/80 backdrop-blur-md text-white text-xs font-semibold">
                                {{ $post->category->name }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3
                            class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-purple-300 transition-colors">
                            {{ $post->title }}
                        </h3>

                        <p class="text-white/70 text-sm mb-6 line-clamp-3">
                            {{ $post->excerpt }}
                        </p>

                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $post->author->avatar_url }}" alt="{{ $post->author->name }}"
                                    class="w-10 h-10 rounded-full border-2 border-white/20">
                                <div>
                                    <p class="text-white font-medium text-sm text-left">
                                        {{ $post->author->name }}
                                    </p>
                                    <p class="text-white/50 text-xs text-left">
                                        {{ $post->created_at->format('F j, Y') }}
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
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <a href="/blog/{{ $post->id }}"
                                class="btn-primary px-4 py-2 rounded-xl text-white font-medium text-sm hover:shadow-lg transition-all">
                                Read More
                            </a>

                            <div class="flex items-center space-x-2">
                                <!-- Like Feature -->
                                <button
                                    class="like-btn flex items-center space-x-1 text-white/50 hover:text-red-400 transition-colors"
                                    data-post-id="{{ $post->id ?? $loop->index }}" data-liked="false">
                                    <x-heroicon-o-heart class="w-5 h-5" />
                                    <span class="like-count text-sm">{{ $post->likes_count }}</span>
                                </button>

                                <button
                                    class="share-btn btn-glass px-3 py-2 rounded-xl text-white hover:text-purple-300 transition-colors"
                                    data-url="{{ url('/posts/' . $post->id) }}">
                                    <x-heroicon-o-share class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <p class="text-center text-white/60">Belum ada artikel.</p>
            @endforelse
        </div>
    </div>
</section>
