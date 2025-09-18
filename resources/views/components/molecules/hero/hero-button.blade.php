@props(['type' => 'primary', 'icon' => null])

<button
    {{ $attributes->merge([
        'class' =>
            $type === 'primary'
                ? 'btn-primary px-8 py-4 rounded-2xl font-semibold text-white flex items-center space-x-2 group'
                : 'btn-glass px-8 py-4 rounded-2xl font-semibold text-white flex items-center space-x-2',
    ]) }}>
    <div class="flex items-center space-x-2">
        {{ $slot }}
    </div>
</button>
