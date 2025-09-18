<header class="pt-32 pb-20 hero-gradient">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center animate-slide-up">
            {{-- Badge --}}
            <x-molecules.hero.hero-badge>
                A modern space to share ideas, stories, and reflections with the world
            </x-molecules.hero.hero-badge>

            {{-- Judul --}}
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black mb-8 leading-tight">
                <span class="text-gradient">Lumina Shine Through Stories</span>
            </h1>

            {{-- Deskripsi --}}
            <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-12 leading-relaxed">
                Welcome to Lumina where your stories light the way.
                Every thought, reflection, and memory becomes a spark that reaches hearts
                and inspires minds. Share your journey and let your words illuminate the world.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                <x-molecules.hero.hero-button type="primary">
                    <span>Get Started</span>
                    <x-heroicon-o-arrow-small-right class="w-6 h-6 text-white" />
                </x-molecules.hero.hero-button>

                <x-molecules.hero.hero-button type="secondary">
                    <x-eva-github-outline class="w-6 h-6 text-white" />
                    <span>Github Repository</span>
                </x-molecules.hero.hero-button>

            </div>

            {{-- Stats --}}
            @php
                $heroStats = [
                    ['value' => '10K+', 'label' => 'Active Users'],
                    ['value' => '50K+', 'label' => 'Posts Created'],
                    ['value' => '99.9%', 'label' => 'Uptime'],
                    ['value' => '24/7', 'label' => 'Support'],
                ];
            @endphp
            <x-molecules.hero.hero-stats :stats="$heroStats" />
        </div>
    </div>
</header>
