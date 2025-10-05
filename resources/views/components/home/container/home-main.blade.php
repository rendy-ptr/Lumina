<main class="relative z-10 pb-16 py-20">
    <!-- Hero Section -->
    <x-home.organisms.home-hero />

    <!-- Featured Posts Section -->
    <x-home.organisms.home-featured-post :featuredPost="$featuredPost" :otherTopPosts="$otherTopPosts" />

    <!-- Categories Section -->
    <x-home.organisms.home-category :categories="$categories" />
</main>
