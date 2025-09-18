@props(['menus' => []])

<div class="hidden lg:flex items-center space-x-2">
    @foreach ($menus as $menu)
        <x-molecules.navbar.nav-item :href="$menu['url']" :active="$menu['active']">
            {{ $menu['name'] }}
        </x-molecules.navbar.nav-item>
    @endforeach
</div>
