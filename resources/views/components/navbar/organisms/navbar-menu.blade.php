<div class="hidden lg:flex items-center space-x-2">
    @foreach ($menus as $menu)
        <x-navbar.molecules.item :href="$menu['url']" :active="$menu['active']">
            {{ $menu['name'] }}
        </x-navbar.molecules.item>
    @endforeach
</div>
