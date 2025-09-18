@props(['stats' => []])

<div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
    @foreach ($stats as $index => $stat)
        <div class="text-center animate-scale-in" style="animation-delay: {{ 0.1 * ($index + 1) }}s">
            <div class="text-3xl font-bold text-gradient">{{ $stat['value'] }}</div>
            <div class="text-sm text-gray-400 mt-1">{{ $stat['label'] }}</div>
        </div>
    @endforeach
</div>
