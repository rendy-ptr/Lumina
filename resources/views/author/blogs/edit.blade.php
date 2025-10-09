<x-layouts.author-layout :title="'Edit: ' . $blog->title">
    <section class="space-y-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-white">Update your article</h1>
                <p class="text-white/60 text-sm">Refresh the story, adjust the visuals, and publish when you are ready.</p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('author.blogs.view', $blog->slug) }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm text-white/70 transition hover:bg-white/10 hover:text-white">
                    <x-heroicon-o-eye class="h-4 w-4" />
                    Preview article
                </a>
                <a href="{{ route('author.blogs.index') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm text-white/70 transition hover:bg-white/10 hover:text-white">
                    <x-heroicon-o-arrow-uturn-left class="h-4 w-4" />
                    Back to articles
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-2xl border border-red-500/40 bg-red-500/10 px-5 py-4 text-sm text-red-200">
                <p class="font-semibold">We spotted a few things to fix:</p>
                <ul class="mt-2 list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
            <form action="{{ route('author.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
                class="glass-strong xl:col-span-2 space-y-6 rounded-3xl border border-white/10 px-6 py-6">
                @csrf
                @method('PATCH')

                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-white/70">Title<span class="text-red-400">*</span></label>
                    <input type="text" name="title" id="title" maxlength="255" required
                        value="{{ old('title', $blog->title) }}"
                        class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    @error('title')
                        <p class="text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="space-y-2">
                        <label for="slug-display" class="font-medium text-white/70 text-sm">Slug</label>
                        <input type="hidden" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}">
                        <input type="text" id="slug-display" value="{{ old('slug', $blog->slug) }}" disabled
                            class="w-full cursor-not-allowed rounded-2xl border border-white/10 bg-white/10 px-4 py-3 text-white placeholder-white/40 opacity-80" />
                        <p class="text-xs text-white/50">Slug updates automatically based on the title.</p>
                        @error('slug')
                            <p class="text-xs text-red-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="category_id" class="block text-sm font-medium text-white/70">Category<span class="text-red-400">*</span></label>
                        <select name="category_id" id="category_id" @if ($categories->isEmpty()) disabled @endif
                            class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                            <option value="" disabled {{ old('category_id', $blog->category_id) ? '' : 'selected' }}
                                style="background-color: rgba(15, 23, 42, 0.92); color: #f8fafc;">
                                Select a category
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $blog->category_id) == $category->id)
                                    style="background-color: rgba(15, 23, 42, 0.92); color: #f8fafc;">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($categories->isEmpty())
                            <p class="text-xs text-amber-300">No categories available yet. Ask an administrator to add one.</p>
                        @endif
                        @error('category_id')
                            <p class="text-xs text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="excerpt" class="block text-sm font-medium text-white/70">Excerpt<span class="text-red-400">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="3" required
                        class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-3">
                    <label for="thumbnail" class="block text-sm font-medium text-white/70">Thumbnail</label>
                    <div class="flex flex-col gap-4 md:flex-row md:items-start">
                        <div class="flex-1 space-y-2">
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                                class="block w-full rounded-2xl border border-dashed border-white/20 bg-white/5 px-4 py-3 text-sm text-white placeholder-white/40 focus:border-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                            <p class="text-xs text-white/50">Upload a new image to replace the current thumbnail.</p>
                            @error('thumbnail')
                                <p class="text-xs text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        @if ($blog->thumbnail_url)
                            <div class="w-full md:w-40">
                                <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5">
                                    <img src="{{ $blog->thumbnail_url }}" alt="Current thumbnail"
                                        class="h-24 w-full object-cover" />
                                </div>
                                <p class="mt-2 text-xs text-white/60">Current image</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="content" class="block text-sm font-medium text-white/70">Content<span class="text-red-400">*</span></label>
                    <textarea name="content" id="content" rows="16" required
                        class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                        <p class="text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <div class="text-xs text-white/50">
                        Last saved {{ optional($blog->updated_at)->diffForHumans() ?? 'just now' }} | Unsaved edits are not stored.
                    </div>
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-purple-500 via-violet-500 to-indigo-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:shadow-purple-500/30 focus:outline-none focus:ring-2 focus:ring-purple-300">
                        <x-heroicon-o-cloud-arrow-up class="h-4 w-4" />
                        Save changes
                    </button>
                </div>
            </form>

            <aside class="glass-strong space-y-5 rounded-3xl border border-white/10 px-6 py-6">
                <div>
                    <h2 class="text-lg font-semibold text-white">Performance snapshot</h2>
                    <p class="text-sm text-white/60">Quick numbers from your latest publish.</p>
                </div>
                <dl class="grid grid-cols-1 gap-4 text-sm text-white/70 sm:grid-cols-2">
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                        <dt class="text-xs uppercase tracking-wide text-white/50">Views</dt>
                        <dd class="mt-1 text-lg font-semibold text-white">{{ number_format($blog->views) }}</dd>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                        <dt class="text-xs uppercase tracking-wide text-white/50">Likes</dt>
                        <dd class="mt-1 text-lg font-semibold text-white">{{ number_format($blog->likes_count) }}</dd>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                        <dt class="text-xs uppercase tracking-wide text-white/50">Comments</dt>
                        <dd class="mt-1 text-lg font-semibold text-white">{{ number_format($blog->comments_count) }}</dd>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                        <dt class="text-xs uppercase tracking-wide text-white/50">Published</dt>
                        <dd class="mt-1 text-sm text-white">{{ optional($blog->created_at)->format('M d, Y') ?? 'Unknown' }}</dd>
                    </div>
                </dl>
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm text-white/60">
                    Tip: ask a teammate to review your story before you share it widely.
                </div>
            </aside>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const titleInput = document.getElementById('title');
            const slugHiddenInput = document.getElementById('slug');
            const slugDisplayInput = document.getElementById('slug-display');

            if (!titleInput || !slugHiddenInput || !slugDisplayInput) {
                return;
            }

            const slugify = (value) =>
                value
                    .toString()
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .replace(/[^\w\s-]/g, '')
                    .trim()
                    .replace(/[\s_-]+/g, '-')
                    .toLowerCase();

            const updateSlug = () => {
                const generated = slugify(titleInput.value);
                if (!generated) {
                    return;
                }
                slugHiddenInput.value = generated;
                slugDisplayInput.value = generated;
            };

            if (!slugHiddenInput.value) {
                updateSlug();
            }

            titleInput.addEventListener('input', updateSlug);
        });
    </script>
</x-layouts.author-layout>
