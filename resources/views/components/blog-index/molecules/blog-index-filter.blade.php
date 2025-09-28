<div class="relative inline-block text-left">
    <button id="menu-button" type="button"
        class="btn-primary px-6 py-3 rounded-xl text-white font-medium text-sm flex items-center gap-2">
        @if (request('category'))
            {{ $categories->where('slug', request('category'))->first()->name ?? 'All Category' }}
        @else
            All Category
        @endif
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div id="dropdown-menu"
        class="glass absolute mt-3 w-64 rounded-xl shadow-lg z-20 hidden animate-[slideUp_0.3s_ease] overflow-hidden border border-[var(--glass-border)] backdrop-blur-md">
        <div class="flex flex-col p-2 gap-1">
            <a href="{{ route('blog.index') }}"
                class="px-4 py-2.5 text-sm text-white rounded-lg transition duration-300
          {{ !request('category') ? 'gradient-active font-semibold' : 'gradient-hover' }}">
                All Category
            </a>
            <!-- Categories -->
            @foreach ($categories as $category)
                <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                    class="px-4 py-2.5 text-sm text-white rounded-lg transition duration-300
               {{ request('category') === $category->slug ? 'gradient-active font-semibold' : 'gradient-hover' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

</div>
