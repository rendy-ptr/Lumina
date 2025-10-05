<x-layouts.author-layout title="Author Profile">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Your public profile</h1>
                <p class="text-white/60 text-sm">Preview how readers see you across Lumina and keep everything polished.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('author.dashboard') }}"
                    class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">
                    Back to dashboard
                </a>
                <a href="{{ route('author.profile.edit') }}"
                    class="btn-primary px-5 py-2 rounded-xl text-sm font-semibold text-white shadow-lg">
                    Edit profile
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-6">
                <div class="flex flex-col items-center text-center space-y-4">
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}"
                        class="w-28 h-28 rounded-2xl object-cover border border-white/20 shadow-lg">
                    <div class="space-y-1">
                        <p class="text-lg font-semibold text-white">{{ $user->name }}</p>
                        <p class="text-sm text-white/50">{{ $profile->job_title ?? 'job title not filled in yet' }}</p>
                        <p class="text-xs text-white/40">Joined {{ $user->created_at->format('F Y') }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3 text-center">
                    @foreach ($stats as $stat)
                        <div class="rounded-2xl border border-white/10 bg-white/5 px-3 py-3">
                            <p class="text-base font-semibold text-white">{{ $stat['value'] }}</p>
                            <p class="text-xs text-white/50">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5 space-y-2">
                    <h3 class="text-sm font-medium text-white/80 uppercase tracking-[0.22em]">Bio Profile</h3>
                    <p class="text-md text-white font-medium">
                        {{ $profile?->bio ?? 'bio not filled in yet' }}</p>
                </div>
            </div>

            <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-6 lg:col-span-2">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5 space-y-2">
                    <h3 class="text-sm font-medium text-white/80 uppercase tracking-[0.22em]">Signature quote</h3>
                    <p class="text-lg text-white font-medium">
                        &ldquo;{{ $profile->quote ?? 'quote not filled in yet' }}&rdquo;</p>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-5 space-y-3">
                        <h3 class="text-sm font-semibold text-white/80">Contact</h3>
                        <ul class="space-y-2 text-sm text-white/70">
                            @foreach ($socialLinks as $link)
                                <li class="flex items-center gap-3">
                                    <x-dynamic-component :component="$link['icon']" class="w-5 h-5 text-white/60" />
                                    @if ($link['url'])
                                        <a href="{{ $link['url'] }}" target="_blank" rel="noopener"
                                            class="hover:text-white transition">{{ $link['label'] }} : {{ $link['url']}}</a>
                                    @else
                                        <span class="text-white/40">Add your {{ $link['label'] }} link</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.author-layout>
