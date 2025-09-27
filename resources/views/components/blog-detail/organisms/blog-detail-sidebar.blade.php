<div class="lg:w-1/3">
    <div class="card mb-8">
        <x-blog-detail.molecules.author-profile :post="$post" />
    </div>

    <!-- Comments Section -->
    <div class="card mb-8">
        <div class="p-6">
            <h3 class="text-lg font-bold text-white mb-4"> Comments
                ({{ $post->comments->count() }})</h3>

            <!-- Comments List -->
            <x-blog-detail.molecules.comments-list :post="$post" />

            <!-- Comment Form -->
            <x-blog-detail.molecules.comment-form :post="$post" />
        </div>
    </div>
</div>
