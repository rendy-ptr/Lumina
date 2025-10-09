<x-layouts.author-layout title="My Articles">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Articles overview</h1>
                <p class="text-white/60 text-sm">Manage every published story, keep an eye on momentum, and iterate
                    quickly.</p>
            </div>
            <a href="{{ route('author.blogs.create') }}"
                class="inline-flex items-center space-x-2 btn-primary px-4 py-2 rounded-xl text-sm font-semibold shadow-lg">
                <x-heroicon-o-pencil-square class="w-5 h-5" />
                <span>New article</span>
            </a>
        </div>

        @if (session('status'))
            <div class="px-4 py-3 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 text-sm text-emerald-100">
                {{ session('status') }}
            </div>
        @endif

        <div class="glass-strong rounded-3xl border border-white/10 overflow-hidden">
            <div
                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 px-6 py-4 border-b border-white/10">
                <div class="text-white/80 text-sm">
                    Showing {{ $articleCount }} Article <br>
                    <span class="text-white/50">{{ number_format($totalViews) }} total views /
                        {{ number_format($totalLikes) }} likes / {{ number_format($totalComments) }} comments</span>
                </div>
                <div class="flex items-center divide-x divide-white/10 rounded-2xl overflow-hidden">
                    <div class="px-4 py-2 text-xs text-white/70 bg-white/5">Newest first</div>
                    <div class="px-4 py-2 text-xs text-white/40">Sort tools coming soon</div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-white/10 text-sm">
                    <thead class="text-white/60 uppercase tracking-wide text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">Article</th>
                            <th class="px-6 py-3 text-left">Category / Slug</th>
                            <th class="px-6 py-3 text-left">Engagement</th>
                            <th class="px-6 py-3 text-left">Timeline</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @forelse ($published as $blog)
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-start gap-3">
                                        <div class="h-14 w-14 rounded-xl overflow-hidden bg-white/5 flex-shrink-0">
                                            @if ($blog->thumbnail_url)
                                                <img src="{{ $blog->thumbnail_url }}"
                                                    alt="{{ $blog->title }} thumbnail"
                                                    class="h-full w-full object-cover" loading="lazy">
                                            @else
                                                <div
                                                    class="h-full w-full flex items-center justify-center text-white/30 text-xs uppercase tracking-wide">
                                                    No Image
                                                </div>
                                            @endif
                                        </div>
                                        <div class="space-y-1">
                                            <a href="{{ route('author.blogs.view', $blog->slug) }}"
                                                class="text-white font-medium hover:text-primary-300 transition">
                                                {{ $blog->title }}
                                            </a>
                                            <p class="text-white/50 text-xs line-clamp-2">
                                                {{ $blog->excerpt }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-white/70">
                                    <p class="text-sm font-medium text-white/80">{{ optional($blog->category)->name }}
                                    </p>
                                    <p class="text-xs text-white/40">/{{ $blog->slug }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4 text-xs text-white/60">
                                        <span class="inline-flex items-center gap-1"><x-heroicon-o-hand-thumb-up
                                                class="w-4 h-4" />{{ number_format($blog->likes_count) }}</span>
                                        <span
                                            class="inline-flex items-center gap-1"><x-heroicon-o-chat-bubble-left-ellipsis
                                                class="w-4 h-4" />{{ number_format($blog->comments_count) }}</span>
                                        <span class="inline-flex items-center gap-1"><x-heroicon-o-chart-bar
                                                class="w-4 h-4" />{{ number_format($blog->views) }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-white/60 text-xs">
                                    <p>Published {{ optional($blog->created_at)->format('M d, Y') }}</p>
                                    <p class="text-white/40">Updated {{ optional($blog->updated_at)->diffForHumans() }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('author.blogs.edit', $blog->id) }}"
                                            class="btn-glass px-3 py-2 rounded-xl text-xs text-white/80 hover:text-white transition">Edit</a>
                                        <form action="{{ route('author.blogs.destroy', $blog->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this article?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn-glass px-3 py-2 rounded-xl text-xs text-red-300 hover:text-red-200 transition">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="max-w-sm mx-auto space-y-3 text-white/60">
                                        <div
                                            class="h-12 w-12 rounded-full bg-white/5 flex items-center justify-center mx-auto">
                                            <x-heroicon-o-document-text class="w-6 h-6 text-white/40" />
                                        </div>
                                        <p class="text-sm">You have not published any articles yet. Use the button above
                                            to share your first story.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layouts.author-layout>
