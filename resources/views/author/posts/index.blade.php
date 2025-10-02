<x-layouts.author-layout title="My Articles">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Articles overview</h1>
                <p class="text-white/60 text-sm">Draft, publish, and manage your writing from one focused space.</p>
            </div>
            <a href="{{ route('author.posts.create') }}"
                class="inline-flex items-center space-x-2 btn-primary px-4 py-2 rounded-xl text-sm font-semibold shadow-lg">
                <x-heroicon-o-pencil-square class="w-5 h-5" />
                <span>New article</span>
            </a>
        </div>

        <div class="glass-strong rounded-3xl border border-white/10 overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <span class="text-white/80 text-sm">Showing {{ $posts->count() }} entries</span>
                </div>
                <div class="flex items-center space-x-2 text-xs text-white/50">
                    <span class="px-3 py-1 rounded-full bg-white/5">Draft</span>
                    <span class="px-3 py-1 rounded-full bg-white/5">Scheduled</span>
                    <span class="px-3 py-1 rounded-full bg-white/5">Published</span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-white/10 text-sm">
                    <thead class="text-white/60 uppercase tracking-wide text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">Title</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Last updated</th>
                            <th class="px-6 py-3 text-left">Performance</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @forelse ($posts as $post)
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-6 py-4">
                                    <p class="text-white font-medium">{{ $post['title'] }}</p>
                                    <p class="text-white/50 text-xs mt-1 line-clamp-1">{{ $post['summary'] }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusColors = [
                                            'draft' => 'bg-white/10 text-white/70',
                                            'scheduled' => 'bg-amber-500/20 text-amber-200',
                                            'published' => 'bg-emerald-500/20 text-emerald-200',
                                        ];
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColors[$post['status']] ?? 'bg-white/10 text-white/70' }}">
                                        {{ ucfirst($post['status']) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-white/60 text-sm">{{ $post['updated_human'] }}</td>
                                <td class="px-6 py-4 text-white/60 text-sm">{{ $post['reads'] }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('author.posts.edit', $post['id']) }}"
                                            class="btn-glass px-3 py-2 rounded-xl text-xs text-white/80 hover:text-white transition">Edit</a>
                                        <button type="button"
                                            class="btn-glass px-3 py-2 rounded-xl text-xs text-red-300 hover:text-red-200 transition">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-white/50 text-sm">
                                    No articles yet. Start a new one to build momentum.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layouts.admin-layout>
