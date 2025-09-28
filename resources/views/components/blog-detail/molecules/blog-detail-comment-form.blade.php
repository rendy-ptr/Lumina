<div class="border-t border-white/10 pt-4">
    <h4 class="text-sm font-semibold text-white mb-3">Leave a Comment</h4>
    {{-- Ganti form statis dengan form yang bisa mengirim data --}}
    <form action="{{ route('comments.store', $blog->slug) }}" method="POST" class="space-y-3">
        @csrf
        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
        <div class="grid grid-cols-1 gap-3">
            <textarea name="content" placeholder="Write your comment here..."
                class="px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white placeholder-white/40 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 h-24 resize-none">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn-primary px-4 py-2 rounded-lg font-medium text-sm w-full">
            Post Comment
        </button>
    </form>
</div>
