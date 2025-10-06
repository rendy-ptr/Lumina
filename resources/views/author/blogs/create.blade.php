<x-layouts.author-layout title="Write Article">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Write a new article</h1>
                <p class="text-white/60 text-sm">Plan the structure, craft the story, and publish when you are ready.</p>
            </div>
            <a href="{{ route('author.blogs.index') }}"
                class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/5 px-4 py-2 text-sm text-white/70 transition hover:bg-white/10 hover:text-white">
                <x-heroicon-o-arrow-uturn-left class="h-4 w-4" />
                Back to articles
            </a>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-2xl border border-red-500/40 bg-red-500/10 px-5 py-4 text-sm text-red-200">
                <p class="font-semibold">We spotted a few things to fix:</p>
                <ul class="mt-2 space-y-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <form action="{{ route('author.blogs.store') }}" method="POST" enctype="multipart/form-data"
                class="glass-strong xl:col-span-2 space-y-6 rounded-3xl border border-white/10 px-6 py-6">
                @csrf

                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-white/70">Title<span
                            class="text-red-400">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" maxlength="255"
                        required placeholder="Design a calmer interface"
                        class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                    @error('title')
                        <p class="text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-sm">
                            <label for="slug" class="font-medium text-white/70">Slug</label>
                        </div>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" maxlength="255"
                            placeholder="designing-for-calm-interfaces"
                            class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                        <p class="text-xs text-white/50">Leave empty to auto-generate from the title.</p>
                        @error('slug')
                            <p class="text-xs text-red-300">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="category_id" class="block text-sm font-medium text-white/70">Category<span
                                class="text-red-400">*</span></label>
                        <select name="category_id" id="category_id" @if ($categories->isEmpty()) disabled @endif
                            class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}
                                style="background-color: rgba(15, 23, 42, 0.92); color: #f8fafc;">
                                Select a category
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)
                                    style="background-color: rgba(15, 23, 42, 0.92); color: #f8fafc;">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($categories->isEmpty())
                            <p class="text-xs text-amber-300">No categories available yet. Ask an administrator to add
                                one.</p>
                        @endif
                        @error('category_id')
                            <p class="text-xs text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="thumbnail" class="block text-sm font-medium text-white/70">Thumbnail<span
                            class="text-red-400">*</span></label>
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*" required class="hidden" />
                    <label for="thumbnail"
                        class="flex flex-col items-center justify-center gap-3 rounded-2xl border border-dashed border-white/20 bg-white/5 px-6 py-6 text-center text-white/70 transition hover:border-purple-400/60 hover:bg-white/10">
                        <x-heroicon-o-photo class="h-8 w-8 text-white/60" />
                        <div class="space-y-1">
                            <p class="text-sm font-medium text-white">Drop image here or click to upload</p>
                            <p id="thumbnail-filename" class="text-xs text-white/50">Recommended 1200x630px. PNG or JPG
                                up to 2MB.</p>
                        </div>
                    </label>
                    @error('thumbnail')
                        <p class="text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="excerpt" class="block text-sm font-medium text-white/70">Excerpt<span
                            class="text-red-400">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="4" required placeholder="Introduce the main idea in a few sentences"
                        class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500">{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="content" class="block text-sm font-medium text-white/70">Content<span
                            class="text-red-400">*</span></label>
                    <textarea name="content" id="content" rows="14" required placeholder="Start writing your story..."
                        class="w-full rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-xs text-red-300">{{ $message }}</p>
                    @enderror
                </div>

                <div
                    class="flex flex-col gap-3 rounded-2xl border border-dashed border-white/15 bg-white/5 px-4 py-4 text-xs text-white/60 md:flex-row md:items-center md:justify-between">
                    <p>Slug, likes, comments, and view counters are managed automatically after publishing.</p>
                    <p class="md:text-right">Remember to proofread and preview before submitting.</p>
                </div>

                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <div class="text-xs text-white/50">
                        Need a pause? You can come back to this form anytime from the Articles page.
                    </div>
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-purple-500 via-violet-500 to-indigo-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:shadow-purple-500/30 focus:outline-none focus:ring-2 focus:ring-purple-300">
                        <x-heroicon-o-paper-airplane class="h-4 w-4" />
                        Publish article
                    </button>
                </div>
            </form>

            <aside class="glass-strong space-y-5 rounded-3xl border border-white/10 px-6 py-6">
                <div>
                    <h2 class="text-lg font-semibold text-white">Publishing checklist</h2>
                    <p class="text-sm text-white/60">A quick reminder to ship your best work.</p>
                </div>
                <ul class="space-y-4 text-sm text-white/70">
                    <li class="flex gap-3">
                        <span
                            class="mt-0.5 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-white/10 text-sm text-indigo-200">1</span>
                        <div>
                            <p class="font-medium text-white">Lead with clarity</p>
                            <p class="text-xs text-white/60">Ensure the headline sets expectations and the intro hooks
                                the reader.</p>
                        </div>
                    </li>
                    <li class="flex gap-3">
                        <span
                            class="mt-0.5 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-white/10 text-sm text-indigo-200">2</span>
                        <div>
                            <p class="font-medium text-white">Structure the flow</p>
                            <p class="text-xs text-white/60">Break the content into digestible sections with
                                subheadings or bullet points.</p>
                        </div>
                    </li>
                    <li class="flex gap-3">
                        <span
                            class="mt-0.5 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-white/10 text-sm text-indigo-200">3</span>
                        <div>
                            <p class="font-medium text-white">Add depth</p>
                            <p class="text-xs text-white/60">Link to trusted sources, data, or past articles to
                                strengthen the narrative.</p>
                        </div>
                    </li>
                </ul>
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm text-white/60">
                    Tip: send the draft to a teammate for feedback before you hit publish.
                </div>
            </aside>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');
            const refreshButton = document.getElementById('slug-refresh');

            if (!titleInput || !slugInput) {
                return;
            }

            const slugify = (value) =>
                value
                .toString()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '')
                .replace(/-{2,}/g, '-');

            const updateSlug = () => {
                if (slugInput.dataset.userEdited === 'true') {
                    return;
                }
                slugInput.value = slugify(titleInput.value);
            };

            titleInput.addEventListener('input', updateSlug);
            slugInput.addEventListener('input', () => {
                slugInput.dataset.userEdited = 'true';
            });
            refreshButton?.addEventListener('click', (event) => {
                event.preventDefault();
                slugInput.dataset.userEdited = 'false';
                slugInput.value = slugify(titleInput.value);
            });

            const thumbnailInput = document.getElementById('thumbnail');
            const thumbnailLabel = document.getElementById('thumbnail-filename');
            const defaultThumbnailText = thumbnailLabel ? thumbnailLabel.textContent : '';

            if (thumbnailInput && thumbnailLabel) {
                thumbnailInput.addEventListener('change', () => {
                    const file = thumbnailInput.files && thumbnailInput.files[0];
                    if (file) {
                        const sizeKb = Math.max(1, Math.round(file.size / 1024));
                        thumbnailLabel.textContent = `${file.name} - ${sizeKb} KB`;
                    } else {
                        thumbnailLabel.textContent = defaultThumbnailText;
                    }
                });
            }

            updateSlug();
        });
    </script>
</x-layouts.author-layout>
