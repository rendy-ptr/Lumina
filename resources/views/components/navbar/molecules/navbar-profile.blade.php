<div class="hidden lg:flex items-center space-x-4">
    @if ($user)
        <div class="relative group">
            <button type="button" class="flex items-center space-x-3 btn-glass px-4 py-2 rounded-xl">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}"
                    class="w-8 h-8 rounded-lg ring-2 ring-white/20">
                <span class="text-sm font-medium text-gray-300">{{ $user->name }}</span>
                <svg class="w-4 h-4 text-gray-400 group-hover:rotate-180 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
                class="absolute right-0 top-full mt-2 w-64 glass-strong rounded-xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                <div class="p-4 border-b border-white/10">
                    <div class="flex items-center space-x-3">
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-lg">
                        <div>
                            <h4 class="font-semibold text-white">{{ $user->name }}</h4>
                            <p class="text-sm text-gray-400">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="py-2 space-y-1">
                    @if ($user->role === 'visitor')
                        <a href="#"
                            class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/5 transition-colors group/item">
                            <x-heroicon-o-cog-6-tooth class="w-5 h-5 text-gray-400 group-hover/item:text-white" />
                            <span class="text-sm text-gray-300 group-hover/item:text-white">Manage Account</span>
                        </a>
                    @elseif ($user->role === 'author')
                        <a href="{{ route('author.dashboard') }}"
                            class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/5 transition-colors group/item">
                            <x-heroicon-o-squares-2x2 class="w-5 h-5 text-gray-400 group-hover/item:text-white" />
                            <span class="text-sm text-gray-300 group-hover/item:text-white">Dashboard</span>
                        </a>
                        <a href="{{ route('author.profile.edit') }}"
                            class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/5 transition-colors group/item">
                            <x-heroicon-o-user-circle class="w-5 h-5 text-gray-400 group-hover/item:text-white" />
                            <span class="text-sm text-gray-300 group-hover/item:text-white">Profile Settings</span>
                        </a>
                    @endif
                    <hr class="my-2 border-white/10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-500/10 transition-colors group/item">
                            <x-bx-exit class="w-5 h-5 text-red-400" />
                            <span class="text-sm text-red-400">Sign Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}"
            class="flex items-center gap-2 btn-glass px-4 py-2 rounded-xl text-sm font-medium text-gray-200 hover:bg-white/10 transition">
            <span>{{ __('Login') }}</span>
            <x-heroicon-o-arrow-right class="w-4 h-4" />
        </a>
    @endif
</div>
