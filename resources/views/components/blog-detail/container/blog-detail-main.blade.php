<main class="relative z-10 pb-16 py-20">
    <section class="pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Back Button - Full Width -->
            <x-blog-detail.molecules.blog-detail-back-button />

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Article Header -->
                <x-blog-detail.organisms.blog-detail-article :blog="$blog" />

                <!-- Sidebar - 1/3 width -->
                <x-blog-detail.organisms.blog-detail-sidebar :blog="$blog" />
            </div>

            <!-- Related Posts (Full Width) -->
            <x-blog-detail.organisms.blog-detail-related-blogs :relatedBlogs="$relatedBlogs" :blog="$blog" />
        </div>
    </section>
</main>
