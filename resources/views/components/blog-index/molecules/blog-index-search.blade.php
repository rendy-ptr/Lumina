<form action="{{ route('blog.index') }}" method="GET" class="relative">
    <input type="text" name="search" placeholder="Search title articles..." value="{{ request('search') }}"
        class="w-80 px-6 py-3 pl-12 rounded-xl bg-white/10 backdrop-blur-md border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
    @svg('zondicon-search', 'absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-white/50')
</form>
