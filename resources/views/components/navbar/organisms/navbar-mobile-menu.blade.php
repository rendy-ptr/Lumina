@props(['menus' => []])

<div id="mobileMenu"
    class="lg:hidden fixed inset-x-4 top-24 mobile-menu rounded-2xl p-6 transform -translate-y-4 opacity-0 invisible transition-all duration-300">
    <div class="space-y-4">
        @foreach ($menus as $menu)
            <a href="{{ $menu['url'] }}"
                class="block py-3 px-4 rounded-xl {{ $menu['active'] ? 'bg-white/10' : 'hover:bg-white/5' }} transition-colors">
                <span class="font-medium">{{ $menu['name'] }}</span>
            </a>
        @endforeach
        <hr class="border-white/10">
        <div class="flex items-center space-x-3 py-3 px-4">
            <img src="{{ 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80' }}"
                alt="Profile" class="w-8 h-8 rounded-lg">
            <div>
                <div class="font-medium">{{ 'Guest User' }}</div>
                <div class="text-sm text-gray-400">{{ 'guest@example.com' }}</div>
            </div>
        </div>
    </div>
</div>
