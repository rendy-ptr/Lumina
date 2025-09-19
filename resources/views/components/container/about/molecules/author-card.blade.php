@props(['name', 'role', 'bio', 'image', 'articles' => 0, 'joined' => '2024', 'quote' => null])

<div class="card p-6 group hover:shadow-xl transition-shadow duration-500 flex flex-col h-full">
    <div class="text-center">
        <div
            class="w-24 h-24 rounded-full overflow-hidden border-2 border-white/20 mb-4 mx-auto group-hover:border-purple-500/50 transition-colors">
            <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover"
                onerror="this.src='https://picsum.photos/200/200?random=fallback'" />
        </div>
        <h3 class="text-xl font-bold text-white mb-1">{{ $name }}</h3>
        <p class="text-purple-300 font-medium mb-3">{{ $role }}</p>

        <!-- Bio -->
        <p class="text-gray-300 text-sm leading-relaxed mb-4 flex-grow">{{ $bio }}</p>

        <!-- Stats -->
        <div class="flex justify-center items-center gap-4 text-xs text-gray-400 mb-4">
            <span>📝 {{ $articles }} Articles</span>
            <span>📅 Since {{ $joined }}</span>
        </div>

        <!-- Quote (opsional) -->
        @if ($quote)
            <blockquote class="text-gray-400 text-xs italic mb-2 border-l-2 border-purple-500 pl-3 mx-4">
                “{{ $quote }}”
            </blockquote>
        @endif
    </div>
</div>
