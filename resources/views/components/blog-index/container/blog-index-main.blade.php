<main class="relative z-10 pb-16 py-20">

    <!-- Header Section -->
    <x-blog-index.organisms.blog-index-hero :categories="$categories" />

    <!-- Blog Posts Grid -->
    <x-blog-index.organisms.blog-index-posts-grid :blogs="$blogs" />

    <x-blog-index.organisms.blog-index-pagination :blogs="$blogs" />

</main>
