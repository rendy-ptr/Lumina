<div id="mobileMenu"
    class="lg:hidden fixed inset-x-4 top-24 mobile-menu rounded-2xl p-6 transform -translate-y-4 opacity-0 invisible transition-all duration-300">
    <div class="space-y-4">
        @foreach ($menus as $menu)
            <a href="{{ $menu['url'] }}"
                class="block py-3 px-4 rounded-xl {{ $menu['active'] ? 'bg-white/10' : 'hover:bg-white/5' }} transition-colors">
                <span class="font-medium">{{ $menu['name'] }}</span>
            </a>
        @endforeach
        <hr class="border-white/10">

        @if ($user)
            <div class="flex items-center space-x-3 py-3 px-4">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-9 h-9 rounded-lg">
                <div>
                    <div class="font-medium text-white">{{ $user->name }}</div>
                    <div class="text-sm text-gray-400">{{ $user->email }}</div>
                </div>
            </div>
            <div class="space-y-3 px-4 mb-4">
                @if ($user->role === 'visitor')
                    <a href="#"
                        class="block w-full btn-glass py-3 rounded-xl text-sm font-medium text-center text-gray-200 border border-white/10 hover:bg-white/10 transition">
                        Manage Account
                    </a>
                @elseif ($user->role === 'author')
                    <a href="{{ route('author.dashboard') }}"
                        class="block w-full btn-primary py-3 rounded-xl text-sm font-semibold text-center text-white hover:shadow-lg transition">
                        Dashboard
                    </a>
                    <a href="{{ route('author.profile.edit') }}"
                        class="block w-full btn-glass py-3 rounded-xl text-sm font-medium text-center text-gray-200 border border-white/10 hover:bg-white/10 transition">
                        Profile Settings
                    </a>
                @endif
            </div>
            <form method="POST" action="{{ route('logout') }}" class="px-4">
                @csrf
                <button type="submit"
                    class="w-full btn-glass py-3 rounded-xl text-sm font-medium text-red-400 border border-red-400/30 hover:bg-red-500/10 transition">
                    Sign Out
                </button>
            </form>
        @else
            <div class="space-y-3 px-4">
                <a href="{{ route('login') }}"
                    class="w-full btn-primary py-3 rounded-xl text-sm font-semibold text-center text-white block">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="w-full btn-glass py-3 rounded-xl text-sm font-semibold text-center text-gray-200 border border-white/10 block">
                    Create account
                </a>
            </div>
        @endif
    </div>
</div>
