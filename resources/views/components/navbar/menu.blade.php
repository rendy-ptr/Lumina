@props(['menus' => []])

<div class="hidden lg:flex items-center space-x-2">
    @foreach ($menus as $menu)
        <x-navbar-item :href="$menu['url']" :active="$menu['active']">
            {{ $menu['name'] }}
        </x-navbar-item>
    @endforeach
</div>
