<x-layouts.author-layout title="Author Dashboard">
    <section class="space-y-10">
        <div class="glass-strong rounded-3xl border border-white/10 p-8 relative overflow-hidden">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-purple-500/5 to-transparent pointer-events-none">
            </div>
            <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-white/60 mb-3">Author workspace</p>
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                        Welcome back{{ $user ? ', ' . $user->name : '' }}
                    </h1>
                    <p class="text-white/70 max-w-2xl">
                        Draft, refine, and publish with clarity. Your tools for writing and personal brand live in one
                        calm space.
                    </p>
                </div>
                <a href="{{ route('author.blogs.create') }}"
                    class="inline-flex items-center space-x-3 btn-primary px-5 py-3 rounded-2xl text-white font-semibold shadow-lg">
                    <x-heroicon-o-pencil-square class="w-5 h-5" />
                    <span>Start a new article</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
            @foreach ($articleActions as $action)
                <div
                    class="glass-strong rounded-2xl border border-white/10 p-6 flex flex-col justify-between hover:border-white/20 transition">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-3 rounded-xl bg-gradient-to-br {{ $action['accent'] }} bg-opacity-20">
                            @svg($action['icon'], 'w-6 h-6 text-white/80')
                        </div>
                    </div>
                    <div class="space-y-3">
                        <h2 class="text-lg font-semibold text-white">{{ $action['title'] }}</h2>
                        <p class="text-sm text-white/60 leading-relaxed">{{ $action['description'] }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ $action['route'] }}"
                            class="inline-flex items-center space-x-2 text-sm font-medium text-white/80 hover:text-white transition">
                            <span>Open</span>
                            <x-heroicon-o-arrow-up-right class="w-4 h-4" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="glass-strong rounded-3xl border border-white/10 p-6 lg:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-white">Highlighted Article</h2>
                    <a href="{{ route('author.blogs.index') }}">
                        <button class="btn-glass text-xs px-3 py-1 rounded-xl cursor-pointer">
                            Manage Articles
                        </button>
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse ($published as $article)
                        <div
                            class="rounded-2xl border border-white/10 px-5 py-4 hover:border-white/25 transition flex flex-col gap-3">

                            {{-- TITLE --}}
                            <div>
                                <p class="text-white font-medium leading-snug">
                                    {{ $article['title'] }}
                                </p>
                            </div>

                            {{-- ICON STATS --}}
                            <div class="flex flex-wrap items-center gap-4 text-xs text-white/50">
                                <span class="flex items-center gap-1">
                                    <x-heroicon-o-eye class="w-4 h-4" />
                                    {{ $article['views'] }} views
                                </span>
                                <span class="flex items-center gap-1">
                                    <x-heroicon-o-heart class="w-4 h-4" />
                                    {{ $article['likes_count'] }} likes
                                </span>
                                <span class="flex items-center gap-1">
                                    <x-heroicon-o-chat-bubble-left class="w-4 h-4" />
                                    {{ $article['comments_count'] }} comments
                                </span>
                            </div>

                            {{-- DATE --}}
                            <p class="text-xs text-white/50">
                                Published {{ $article['created_at']->format('d M Y') }}
                            </p>
                        </div>
                    @empty
                        <p class="text-white/60 text-sm">Publish your first story to unlock insights.</p>
                    @endforelse
                </div>
            </div>


            <div class="glass-strong rounded-3xl border border-white/10 p-6">
                <h2 class="text-xl font-semibold text-white mb-6">Profile quick links</h2>
                <div class="space-y-3">
                    @foreach ($profileLinks as $link)
                        <a href="{{ $link['route'] }}"
                            class="flex items-center space-x-3 rounded-2xl border border-white/10 px-4 py-3 hover:border-white/25 transition">
                            <div class="p-2 rounded-xl bg-white/5 text-white">
                                @svg($link['icon'], 'w-5 h-5')
                            </div>
                            <span class="text-sm text-white/80">{{ $link['label'] }}</span>
                            <x-heroicon-o-arrow-up-right class="w-4 h-4 text-white/40 ml-auto" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    </x-layouts.admin-layout>
