<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Explore <span class="text-gradient">Topics</span>
            </h2>
            <p class="text-lg text-white/70 max-w-2xl mx-auto">
                Dive deep into subjects that matter to you
            </p>
        </div>

        <x-home.molecules.home-category-lists :categories="$categories" />
    </div>
</section>
