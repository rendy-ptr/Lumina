<x-layouts.app-layout title="Lumina — Detail Blog Post">

    <main class="relative z-10 pb-16 py-20">
        <section class="pt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Back Button - Full Width -->
                <div class="mb-8">
                    <a href="{{ url('/blog') }}"
                        class="inline-flex items-center space-x-2 text-purple-400 hover:text-purple-300 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span>Back to Blog</span>
                    </a>
                </div>

                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Main Content - 2/3 width -->
                    <div class="lg:w-2/3">
                        <!-- Article Header -->
                        <article class="card mb-8">
                            <!-- Featured Image -->
                            <div class="relative overflow-hidden rounded-t-2xl mb-8">
                                <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}"
                                    class="w-full h-80 object-cover">

                                <!-- Category Badge -->
                                <div class="absolute top-6 left-6">
                                    <span
                                        class="px-4 py-2 rounded-full bg-gradient-to-r from-purple-500/90 to-pink-500/90 backdrop-blur-md text-white text-sm font-semibold">
                                        {{ $post->category->name }}
                                    </span>
                                </div>
                            </div>

                            <!-- Article Meta -->
                            <div class="px-8 pb-8">
                                <h1 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                                    {{ $post->title }}
                                </h1>

                                <div
                                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 pb-6 border-b border-white/10">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $post->author->avatar_url }}" alt="{{ $post->author->name }}"
                                            class="w-12 h-12 rounded-full border-2 border-white/20">
                                        <div>
                                            <p class="text-white font-semibold">
                                                {{ $post->author->name }}
                                            </p>
                                            <div class="flex items-center space-x-2 text-white/50 text-sm">
                                                <span>{{ $post->created_at->format('F j, Y') }}</span>
                                                <span>•</span>
                                                <span>{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-3">
                                        <!-- Like Button -->
                                        <button
                                            class="like-btn flex items-center space-x-2 px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 transition-all"
                                            data-post-id="{{ $post->id }}" data-liked="false">
                                            <x-heroicon-o-heart
                                                class="w-5 h-5 text-white/50 group-hover:text-red-400" />
                                            <span class="like-count text-white/70">{{ $post->likes_count }}</span>
                                        </button>

                                        <!-- Share Button -->
                                        <button
                                            class="share-btn btn-glass px-4 py-2 rounded-xl flex items-center space-x-2">
                                            <x-heroicon-o-share class="w-5 h-5" />
                                            <span class="hidden sm:inline">Share</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Article Content -->
                                <div
                                    class="prose prose-invert max-w-none prose-headings:text-white prose-p:text-white/80 prose-a:text-purple-400 hover:prose-a:text-purple-300 prose-strong:text-white prose-em:text-white/90 prose-li:text-white/80 prose-img:rounded-2xl prose-img:shadow-xl">
                                    <p class="text-xl text-white/90 font-medium mb-8 leading-relaxed">
                                        {{ $post->excerpt }}
                                    </p>

                                    <div class="space-y-6 text-white/80 leading-relaxed">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>

                                        <h2 class="text-2xl font-bold text-white mt-12 mb-6">Introduction</h2>
                                        <p>
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                            eu
                                            fugiat
                                            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                            culpa
                                            qui
                                            officia deserunt mollit anim id est laborum.
                                        </p>

                                        <blockquote
                                            class="border-l-4 border-purple-500 pl-6 py-2 my-8 bg-white/5 rounded-r-lg">
                                            <p class="text-white/90 italic">
                                                "The only way to do great work is to love what you do. If you haven't
                                                found
                                                it yet,
                                                keep looking. Don't settle."
                                            </p>
                                            <cite class="text-white/60 text-sm mt-2 block">— Steve Jobs</cite>
                                        </blockquote>

                                        <h2 class="text-2xl font-bold text-white mt-12 mb-6">Key Insights</h2>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque
                                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
                                            et
                                            quasi
                                            architecto beatae vitae dicta sunt explicabo.
                                        </p>

                                        <ul class="list-disc list-inside space-y-2 mt-6">
                                            <li>First key insight about work-life balance</li>
                                            <li>Second important strategy for professionals</li>
                                            <li>Third approach to maintain productivity</li>
                                            <li>Fourth method for sustainable success</li>
                                        </ul>

                                        <h2 class="text-2xl font-bold text-white mt-12 mb-6">Conclusion</h2>
                                        <p>
                                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                            praesentium
                                            voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi
                                            sint
                                            occaecati cupiditate non provident.
                                        </p>

                                        <p class="mt-8">
                                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                            sed
                                            quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Sidebar - 1/3 width -->
                    <div class="lg:w-1/3">
                        <!-- Author Card -->
                        <div class="card mb-8">
                            <div class="p-6">
                                <div class="text-center">
                                    <img src="{{ $post->author->avatar_url }}" alt="{{ $post->author->name }}"
                                        class="w-20 h-20 rounded-full border-2 border-white/20 mx-auto mb-4">
                                    <h3 class="text-xl font-bold text-white mb-2">{{ $post->author->name }}</h3>
                                    <p class="text-white/70 mb-4 text-sm">
                                        Professional writer and content creator focused on lifestyle and productivity
                                        topics.
                                    </p>
                                    <div class="flex flex-wrap justify-center gap-2 mb-4">
                                        <span class="px-2 py-1 bg-white/10 rounded-full text-white/80 text-xs">127
                                            Articles</span>
                                        <span class="px-2 py-1 bg-white/10 rounded-full text-white/80 text-xs">2.5K
                                            Followers</span>
                                    </div>
                                    <button class="btn-primary px-4 py-2 rounded-xl font-medium w-full">
                                        Follow Author
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="card mb-8">
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-white mb-4">Comments ({{ count($comments) }})</h3>

                                <!-- Comments List -->
                                <div class="space-y-4 mb-6 max-h-80 overflow-y-auto pr-2">
                                    @foreach ($comments as $comment)
                                        <div class="flex space-x-3">
                                            <img src="{{ $comment->author->avatar_url }}"
                                                alt="{{ $comment->author->name }}"
                                                class="w-10 h-10 rounded-full border-2 border-white/20 flex-shrink-0">
                                            <div class="flex-1 min-w-0">
                                                <div class="bg-white/5 rounded-lg p-3">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <h5 class="font-medium text-white text-sm truncate">
                                                            {{ $comment->author->name }}</h5>
                                                        <span
                                                            class="text-white/50 text-xs whitespace-nowrap">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="text-white/80 text-sm leading-relaxed">
                                                        {{ $comment->content }}</p>
                                                </div>
                                                <div class="flex items-center space-x-3 mt-2">
                                                    <button
                                                        class="text-white/50 hover:text-purple-400 text-xs flex items-center space-x-1 transition-colors">
                                                        <x-heroicon-o-arrow-up-tray class="w-3 h-3" />
                                                        <span>Reply</span>
                                                    </button>
                                                    <button
                                                        class="text-white/50 hover:text-red-400 text-xs flex items-center space-x-1 transition-colors">
                                                        <x-heroicon-o-heart class="w-3 h-3" />
                                                        <span>{{ $comment->likes_count }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Comment Form -->
                                <div class="border-t border-white/10 pt-4">
                                    <h4 class="text-sm font-semibold text-white mb-3">Leave a Comment</h4>
                                    <form class="space-y-3">
                                        <div class="grid grid-cols-1 gap-3">
                                            <textarea placeholder="Write your comment here..."
                                                class="px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/40 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 h-24 resize-none"></textarea>
                                        </div>
                                        <button class="btn-primary px-4 py-2 rounded-lg font-medium text-sm w-full">
                                            Post Comment
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Posts (Full Width) -->
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-white mb-8">Related Articles</h2>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($relatedPosts as $relatedPost)
                            <div class="card overflow-hidden group">
                                <div class="relative overflow-hidden">
                                    <img src="{{ $relatedPost->thumbnail_url }}" alt="{{ $relatedPost->title }}"
                                        class="w-full h-40 object-cover transition-transform duration-500 group-hover:scale-105">
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="px-2 py-1 rounded-full bg-gradient-to-r from-purple-500/80 to-pink-500/80 backdrop-blur-md text-white text-xs font-semibold">
                                            {{ $relatedPost->category->name }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3
                                        class="text-lg font-bold text-white mb-2 line-clamp-2 group-hover:text-purple-300 transition-colors">
                                        {{ $relatedPost->title }}
                                    </h3>
                                    <div class="flex items-center justify-between text-white/50 text-xs">
                                        <span>{{ $relatedPost->created_at->format('M j, Y') }}</span>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-layouts.app-layout>
