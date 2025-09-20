@props(['href', 'active' => false])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'nav-item ' . ($active ? 'active' : '')]) }}>
    <span class="text-sm font-medium">{{ $slot }}</span>
</a>
