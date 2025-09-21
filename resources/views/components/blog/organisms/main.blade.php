<main class="relative z-10 pb-16 py-20">
    @php
        use App\Data\MockBlogData;

        if (!isset($posts)) {
            $posts = MockBlogData::getPosts();
        }
    @endphp

    <!-- Header Section -->
    <x-blog-hero />

    <!-- Blog Posts Grid -->
    <x-blog-posts-grid :posts="$posts" />
</main>
