<x-layouts.author-layout title="Write Article">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Write a new article</h1>
                <p class="text-white/60 text-sm">Capture your idea, set the tone, and publish when you\'re ready.</p>
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
                    <input type="text" name="title" placeholder="Enter article title"
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" />
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Short description</label>
                    <textarea name="summary" rows="3" placeholder="Introduce the key idea in a few sentences"
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"></textarea>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Content</label>
                    <textarea name="content" rows="12" placeholder="Start writing your story..."
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"></textarea>
                </div>

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <label class="flex items-center space-x-3 text-sm text-white/70">
                        <input type="checkbox" name="share_to_newsletter"
                            class="w-4 h-4 rounded border-white/20 bg-white/10 text-purple-500 focus:ring-purple-500">
                        <span>Share with newsletter subscribers</span>
                    </label>
                    <div class="flex items-center space-x-3">
                        <button type="button"
                            class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">Save draft</button>
                        <button type="submit"
                            class="btn-primary px-4 py-2 rounded-xl text-sm font-semibold text-white shadow-lg">Publish</button>
                    </div>
                </div>
            </form>

            <aside class="glass-strong rounded-3xl border border-white/10 p-6 space-y-5">
                <div>
                    <h2 class="text-lg font-semibold text-white">Writing tips</h2>
                    <p class="text-white/60 text-sm">A simple checklist to help you stay consistent.</p>
                </div>
                <ul class="space-y-3 text-sm text-white/70">
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-300 mt-0.5" />
                        <span>Write a strong opening that sets the intent.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-300 mt-0.5" />
                        <span>Organize your thoughts with short, clear sections.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-300 mt-0.5" />
                        <span>Add a reflective takeaway that readers can act on.</span>
                    </li>
                </ul>
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-sm text-white/60">
                    Need inspiration? Revisit your drafts or saved notes to reconnect with themes you care about most.
                </div>
            </aside>
        </div>
    </section>
</x-layouts.admin-layout>
