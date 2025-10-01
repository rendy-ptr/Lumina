<nav class="fixed top-0 left-0 right-0 z-50 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-strong rounded-2xl px-6 py-4 animate-fade-in">
            <div class="flex items-center justify-between">
                <x-navbar.molecules.logo />
                <x-navbar.organisms.menu />
                <x-navbar.molecules.profile />

                <!-- Mobile Menu Button -->
                <button id="menuToggle" class="lg:hidden btn-glass w-10 h-10 rounded-xl flex items-center justify-center">
                    @svg('zondicon-menu', 'w-5 h-5')
                </button>
            </div>
        </div>
    </div>

    <x-navbar.organisms.mobile-menu />
</nav>