<div class="lg:w-1/3">
    @if (!auth()->check() || auth()->id() !== $blog->user_id)
        <div class="card mb-8">
            <x-blog-detail.molecules.blog-detail-author-profile :blog="$blog" :is-following-author="$isFollowingAuthor" />
        </div>
    @endif


    <!-- Comments Section -->
    <div class="card mb-8">
        <div class="p-6">
            <h3 class="text-lg font-bold text-white mb-4"> Comments
                ({{ $blog->comments->count() }})</h3>

            <!-- Comments List -->
            <x-blog-detail.molecules.blog-detail-comments-list :blog="$blog" />

            <!-- Comment Form -->
            <x-blog-detail.molecules.blog-detail-comment-form :blog="$blog" />
        </div>
    </div>
</div>
