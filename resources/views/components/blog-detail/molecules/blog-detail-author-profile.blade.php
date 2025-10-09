<div class="p-6">
    <div class="text-center">
        @php
            $alreadyFollowing = $isFollowingAuthor ?? false;
            $followerCount = optional($blog->user->authorProfile)->follower ?? $blog->user->followers()->count();
        @endphp
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
                {{ $followerCount }} Followers
            </span>
        </div>
        @guest
            <a href="{{ route('login') }}">
                <button class="btn-primary px-4 py-2 rounded-xl font-medium w-full">
                    Login first to follow author
                </button>
            </a>
        @endguest

        @auth
            @if ($alreadyFollowing)
                <form action="{{ route('authors.follow', $blog->user_id) }}" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="action" value="unfollow">
                    <button type="submit"
                        class="btn-glass px-4 py-2 rounded-xl font-medium w-full text-white hover:text-white/80 transition">
                        Unfollow Author
                    </button>
                </form>
            @else
                <form action="{{ route('authors.follow', $blog->user_id) }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="btn-primary px-4 py-2 rounded-xl font-medium w-full">
                        Follow Author
                    </button>
                </form>
            @endif
        @endauth


    </div>
</div>
