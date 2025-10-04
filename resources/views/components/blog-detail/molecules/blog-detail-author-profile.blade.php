<div class="p-6">
    <div class="text-center">
        <img src="{{ $blog->user->avatar_url }}" alt="{{ $blog->user->name }}"
            class="w-20 h-20 rounded-full border-2 border-white/20 mx-auto mb-4">
        <h3 class="text-xl font-bold text-white mb-2">{{ $blog->user->name }}</h3>
        <p class="text-white/70 mb-4 text-sm">
            {{ $blog->user->authorProfile->bio }}
        </p>
        <div class="flex flex-wrap justify-center gap-2 mb-4">
            <span class="px-2 py-1 bg-white/10 rounded-full text-white/80 text-xs">
                {{ $blog->user->blogs()->count() }} Articles
            </span>
            <span class="px-2 py-1 bg-white/10 rounded-full text-white/80 text-xs">
                {{ $blog->user->authorProfile->follower }} Followers
            </span>
        </div>
        <button class="btn-primary px-4 py-2 rounded-xl font-medium w-full">
            Follow Author
        </button>
    </div>
</div>
