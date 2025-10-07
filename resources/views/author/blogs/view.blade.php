<x-layouts.author-layout :title="'View Article - ' . $blog->title">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">{{ $blog->title }}</h1>
                <p class="text-white/60 text-sm">A closer look at your published story and how readers interact with it.</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('author.blogs.index') }}"
                    class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">Back to articles</a>
                <a href="{{ route('author.blogs.edit', $blog->id) }}"
                    class="inline-flex items-center space-x-2 btn-primary px-4 py-2 rounded-xl text-sm font-semibold shadow-lg">
                    <x-heroicon-o-pencil-square class="w-5 h-5" />
                    <span>Edit article</span>
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="px-4 py-3 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-sm text-emerald-100">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <div class="glass-strong rounded-3xl border border-white/10 overflow-hidden xl:col-span-2">
                @if ($blog->thumbnail_url)
                    <div class="relative">
                        <img src="{{ $blog->thumbnail_url }}" alt="{{ $blog->title }} thumbnail"
                            class="w-full h-72 object-cover" loading="lazy">
                        <span class="absolute inset-x-6 bottom-4 px-3 py-1 rounded-full bg-black/60 text-xs text-white/70 uppercase tracking-wide">
                            {{ optional($blog->category)->name ?? 'Uncategorized' }}
                        </span>
                    </div>
                @endif

                <div class="p-6 md:p-8 space-y-6">
                    <div class="space-y-2 text-white/70 text-sm">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5">
                                <x-heroicon-o-tag class="w-4 h-4" />
                                <span>{{ optional($blog->category)->name ?? 'Uncategorized' }}</span>
                            </span>
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 text-white/50">
                                <x-heroicon-o-link class="w-4 h-4" />
                                <span>/{{ $blog->slug }}</span>
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-white/50">
                            <p>Published {{ optional($blog->created_at)->format('M d, Y') ?? '—' }}</p>
                            <p>Last updated {{ optional($blog->updated_at)->diffForHumans() ?? '—' }}</p>
                        </div>
                    </div>

                    <p class="text-white/70 leading-relaxed">{{ $blog->excerpt }}</p>

                    <div class="prose prose-invert max-w-none text-white/80 space-y-4">
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-5">
                    <h2 class="text-sm font-semibold text-white/70 uppercase tracking-wide">Engagement overview</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-1 gap-4">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-white/50 text-xs uppercase tracking-wide">Views</div>
                            <div class="mt-2 text-2xl font-semibold text-white">{{ number_format($blog->views) }}</div>
                            <p class="mt-1 text-xs text-white/40">Total impressions across the platform.</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-white/50 text-xs uppercase tracking-wide">Likes</div>
                            <div class="mt-2 text-2xl font-semibold text-white">{{ number_format($blog->likes_count) }}</div>
                            <p class="mt-1 text-xs text-white/40">Readers who saved or loved this article.</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="text-white/50 text-xs uppercase tracking-wide">Comments</div>
                            <div class="mt-2 text-2xl font-semibold text-white">{{ number_format($blog->comments_count) }}</div>
                            <p class="mt-1 text-xs text-white/40">Conversations sparked by your story.</p>
                        </div>
                    </div>
                </div>

                <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-4">
                    <h2 class="text-sm font-semibold text-white/70 uppercase tracking-wide">Metadata</h2>
                    <dl class="space-y-3 text-sm text-white/60">
                        <div>
                            <dt class="text-white/40 uppercase tracking-wide text-xs">Author</dt>
                            <dd class="text-white/80">{{ optional($blog->user)->name ?? 'Unknown author' }}</dd>
                        </div>
                        <div>
                            <dt class="text-white/40 uppercase tracking-wide text-xs">Slug</dt>
                            <dd class="text-white/80">/{{ $blog->slug }}</dd>
                        </div>
                        <div>
                            <dt class="text-white/40 uppercase tracking-wide text-xs">Created</dt>
                            <dd class="text-white/80">{{ optional($blog->created_at)->format('M d, Y g:i A') ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-white/40 uppercase tracking-wide text-xs">Updated</dt>
                            <dd class="text-white/80">{{ optional($blog->updated_at)->format('M d, Y g:i A') ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-white/40 uppercase tracking-wide text-xs">Thumbnail URL</dt>
                            <dd class="text-white/80 break-all">{{ $blog->thumbnail_url ?: 'No image uploaded' }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-4">
                    <h2 class="text-sm font-semibold text-white/70 uppercase tracking-wide">Next actions</h2>
                    <div class="space-y-2 text-sm text-white/60">
                        <p>Ready to share? View the public article page to ensure everything renders perfectly.</p>
                        <a href="{{ route('blog.show', $blog->slug) }}" target="_blank"
                            class="inline-flex items-center gap-2 text-primary-300 hover:text-primary-200 transition text-sm font-semibold">
                            <x-heroicon-o-arrow-top-right-on-square class="w-4 h-4" />
                            <span>Open public view</span>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</x-layouts.author-layout>
