<div
    {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 rounded-full card mb-8 animate-scale-in']) }}>
    <span class="w-2 h-2 bg-green-400 rounded-full mr-3 animate-pulse"></span>
    <span class="text-sm text-gray-300">{{ $slot }}</span>
</div>
