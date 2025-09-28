@if ($blogs->hasPages())
    <div class="flex flex-col items-center mt-12 space-y-4 animate-[fadeIn_0.6s_ease]">

        {{-- Pagination --}}
        <div class="flex items-center space-x-2">
            {{-- Tombol Previous --}}
            @if ($blogs->onFirstPage())
                <span
                    class="px-4 py-2 rounded-xl bg-[var(--glass-bg)] border border-[var(--glass-border)] text-gray-400 cursor-not-allowed">
                    ‹
                </span>
            @else
                <a href="{{ $blogs->previousPageUrl() }}"
                    class="px-4 py-2 rounded-xl btn-glass hover:btn-primary transition-all duration-300">
                    ‹
                </a>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($blogs->links()->elements[0] as $page => $url)
                @if ($page == $blogs->currentPage())
                    <span
                        class="px-4 py-2 rounded-xl gradient-active font-semibold shadow-md animate-[scaleIn_0.3s_ease]">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                        class="px-4 py-2 rounded-xl btn-glass gradient-hover transition-all duration-300">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($blogs->hasMorePages())
                <a href="{{ $blogs->nextPageUrl() }}"
                    class="px-4 py-2 rounded-xl btn-glass hover:btn-primary transition-all duration-300">
                    ›
                </a>
            @else
                <span
                    class="px-4 py-2 rounded-xl bg-[var(--glass-bg)] border border-[var(--glass-border)] text-gray-400 cursor-not-allowed">
                    ›
                </span>
            @endif
        </div>

        {{-- Keterangan Pagination --}}
        <div class="text-sm text-gray-400">
            Menampilkan <span class="text-white font-semibold">{{ $blogs->firstItem() }}</span>
            sampai <span class="text-white font-semibold">{{ $blogs->lastItem() }}</span>
            dari <span class="text-white font-semibold">{{ $blogs->total() }}</span> artikel
        </div>

    </div>
@endif
