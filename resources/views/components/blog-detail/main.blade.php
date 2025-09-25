<main class="relative z-10 pb-16 py-20">
    <section class="pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button - Full Width -->
            <x-blog-back-button />

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Article Header -->
                <x-blog-article :post="$post" />

                <!-- Sidebar - 1/3 width -->
                <x-blog-sidebar :post="$post" />
            </div>

            <!-- Related Posts (Full Width) -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-white mb-8">Related Articles</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($relatedPosts as $relatedPost)
                        <div class="card overflow-hidden group">
                            <div class="relative overflow-hidden">
                                {{-- Ganti thumbnail dan alt dari related post --}}
                                <img src="{{ $relatedPost->thumbnail_url }}" alt="{{ $relatedPost->title }}"
                                    class="w-full h-40 object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute top-3 left-3">
                                    <span
                                        class="px-2 py-1 rounded-full bg-gradient-to-r from-purple-500/80 to-pink-500/80 backdrop-blur-md text-white text-xs font-semibold">
                                        {{-- Ganti nama kategori dari related post --}}
                                        {{ $relatedPost->category?->name ?? 'Uncategorized' }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-5">
                                {{-- Ganti title dan link ke detail related post --}}
                                <a href="{{ route('blog.show', $relatedPost->slug) }}"> {{-- Tambahkan link ke post terkait --}}
                                    <h3
                                        class="text-lg font-bold text-white mb-2 line-clamp-2 group-hover:text-purple-300 transition-colors">
                                        {{ $relatedPost->title }}
                                    </h3>
                                </a>
                                <div class="flex items-center justify-between text-white/50 text-xs">
                                    {{-- Ganti tanggal dari related post --}}
                                    <span>{{ $relatedPost->created_at->format('M j, Y') }}</span>
                                    <span>{{ $relatedPost->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-white/50 col-span-full">No related articles found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</main>
