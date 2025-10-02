<x-layouts.author-layout :title="'Edit: ' . ($post['title'] ?? 'Article')">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Edit article</h1>
                <p class="text-white/60 text-sm">Refine your story and keep readers engaged.</p>
            </div>
            <a href="{{ route('author.posts.index') }}" class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">
                Back to articles
            </a>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <form action="#" method="POST" class="glass-strong rounded-3xl border border-white/10 p-6 space-y-5 xl:col-span-2">
                @csrf
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Title</label>
                    <input type="text" name="title" value="{{ old('title', $post['title']) }}"
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Short description</label>
                    <textarea name="summary" rows="3"
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">{{ old('summary', $post['summary']) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Content</label>
                    <textarea name="content" rows="12"
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">{{ old('content', $post['content']) }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Status</label>
                        <select name="status"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                            <option value="draft" {{ old('status', $post['status']) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="scheduled" {{ old('status', $post['status']) === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                            <option value="published" {{ old('status', $post['status']) === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Last updated</label>
                        <div class="px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white/70 text-sm">
                            {{ $post['updated_human'] }}
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Reads</label>
                        <div class="px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white/70 text-sm">
                            {{ $post['reads'] }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="text-xs text-white/50">
                        Saved {{ $post['updated_human'] }} · Unsaved edits are not stored
                    </div>
                    <div class="flex items-center space-x-3">
                        <button type="button"
                            class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">Save draft</button>
                        <button type="submit"
                            class="btn-primary px-4 py-2 rounded-xl text-sm font-semibold text-white shadow-lg">Update article</button>
                    </div>
                </div>
            </form>

            <aside class="glass-strong rounded-3xl border border-white/10 p-6 space-y-5">
                <div>
                    <h2 class="text-lg font-semibold text-white">Publishing checklist</h2>
                    <p class="text-white/60 text-sm">Make sure your story is ready for readers.</p>
                </div>
                <ul class="space-y-3 text-sm text-white/70">
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-light-bulb class="w-5 h-5 text-amber-300 mt-0.5" />
                        <span>Does the title clearly communicate the outcome?</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-eye class="w-5 h-5 text-emerald-300 mt-0.5" />
                        <span>Read once more for tone and clarity before publishing.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-clock class="w-5 h-5 text-blue-300 mt-0.5" />
                        <span>Schedule during peak reader times for better engagement.</span>
                    </li>
                </ul>
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm text-white/60">
                    Tip: Ask a teammate to review your story before you share it widely.
                </div>
            </aside>
        </div>
    </section>
</x-layouts.admin-layout>
