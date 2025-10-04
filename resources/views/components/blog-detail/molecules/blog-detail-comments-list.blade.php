<div class="space-y-4 mb-6 max-h-80 overflow-y-auto pr-2">
    @forelse ($blog->comments as $comment)
        <div class="flex space-x-3">
            <img src="{{ $comment->user->role === 'author'
                ? $comment->user->avatar_url
                : $comment->user->avatar_url }}"
                alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full border-2 border-white/20 flex-shrink-0">
            <div class="flex-1 min-w-0">
                <div class="bg-white/5 rounded-lg p-3">
                    <div class="flex items-center justify-between mb-1">
                        <div class="flex items-center space-x-2 min-w-0">
                            <h5 class="font-medium text-white text-sm truncate">
                                {{ $comment->user->name }}</h5>
                            <!-- Role Badge -->
                            @if ($comment->user->role === 'author')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-500/20 text-purple-300 border border-purple-500/30 flex-shrink-0">
                                    <x-heroicon-s-pencil-square class="w-3 h-3 mr-1" />
                                    Author
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-500/20 text-gray-300 border border-gray-500/30 flex-shrink-0">
                                    <x-heroicon-s-user class="w-3 h-3 mr-1" />
                                    Visitor
                                </span>
                            @endif
                        </div>
                    </div>
                    <p class="text-white/80 text-sm leading-relaxed">
                        {{ $comment->content }}</p>
                    <div class="flex justify-end">
                        <span class="text-white/50 text-xs whitespace-nowrap pt-2">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                <div class="flex items-center space-x-3 mt-2">
                    <button
                        class="text-white/50 hover:text-purple-400 text-xs flex items-center space-x-1 transition-colors">
                        <x-heroicon-o-arrow-up-tray class="w-3 h-3" />
                        <span>Reply</span>
                    </button>
                    <button
                        class="text-white/50 hover:text-red-400 text-xs flex items-center space-x-1 transition-colors">
                        <x-heroicon-o-heart class="w-3 h-3" />
                        <span>{{ $comment->likes_count }}</span>
                    </button>
                </div>
            </div>
        </div>
    @empty
        <p class="text-white/50 text-sm">No comments yet. Be the first to comment!</p>
    @endforelse
</div>
