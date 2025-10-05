<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach ($categories as $category)
        <a href="{{ route('blog.index', ['category' => $category->slug]) }}">
            <div
                class="card p-8 text-center group cursor-pointer transition-transform duration-300 bg-white/5 border border-white/10 rounded-3xl">

                <div
                    class="w-16 h-16 mx-auto mb-6 bg-gradient-to-r {{ $category->from_color }} {{ $category->to_color }} rounded-2xl flex items-center justify-center shadow-md">
                    <x-dynamic-component :component="$category->icon" class="w-8 h-8 text-white" />
                </div>

                {{-- Nama kategori --}}
                <h3 class="text-xl font-bold text-white mb-3 group-hover:text-purple-300 transition-colors">
                    {{ $category->name }}
                </h3>

                {{-- Deskripsi kategori --}}
                <p class="text-white/70 text-sm mb-4">
                    {{ $category->description }}
                </p>

                {{-- Jumlah artikel --}}

                <span class="text-purple-400 text-sm font-semibold">
                    {{ $category->blogs_count ?? 0 }} Articles
                </span>
            </div>
        </a>
    @endforeach
</div>
