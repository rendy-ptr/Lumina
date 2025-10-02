<x-layouts.app-layout title="Login - Lumina">
    <main class="relative z-10 py-20">
        <section class="pt-20">
            <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-2 items-center">
                    <div class="space-y-6">
                        <span
                            class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider bg-white/5 border border-white/10 text-gradient">
                            Welcome Back
                        </span>
                        <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight">
                            Sign in to continue exploring <span class="text-gradient">Lumina</span>
                        </h1>
                        <p class="text-gray-400 text-lg max-w-xl">
                            Access curated stories, track your favorite authors, and personalize your reading
                            experience with thoughtfully designed tools.
                        </p>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="card rounded-2xl p-5 border border-white/10">
                                <h3 class="text-white font-semibold text-lg mb-2">Curated insights</h3>
                                <p class="text-sm text-gray-400">Save articles to revisit later and follow topics that
                                    matter to you.</p>
                            </div>
                            <div class="card rounded-2xl p-5 border border-white/10">
                                <h3 class="text-white font-semibold text-lg mb-2">Tailored feeds</h3>
                                <p class="text-sm text-gray-400">Create a reading list that adapts to your interests
                                    over
                                    time.</p>
                            </div>
                        </div>
                    </div>

                    <div class="glass-strong rounded-3xl p-8 border border-white/10 shadow-2xl">
                        <h2 class="text-2xl font-semibold text-white mb-6">Login to your account</h2>

                        @if (session('status'))
                            <div class="mb-6 rounded-2xl border border-emerald-500/40 bg-emerald-500/10 p-4 text-sm text-emerald-200">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div
                                class="mb-6 rounded-2xl border border-red-500/40 bg-red-500/10 p-4 text-sm text-red-200">
                                <ul class="space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login.attempt') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="space-y-2">
                                <label for="email" class="block text-left text-sm font-medium text-gray-300">Email address</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus
                                    class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" />
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <label for="password" class="block text-left text-sm font-medium text-gray-300">Password</label>
                                    <a href="#" class="text-xs text-gray-400 hover:text-white transition">Forgot
                                        password?</a>
                                </div>
                                <input type="password" name="password" id="password" required
                                    autocomplete="current-password"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" />
                            </div>

                            <label class="flex items-center gap-3 text-sm text-gray-300">
                                <input type="checkbox" name="remember"
                                    class="w-4 h-4 rounded border-white/20 bg-white/10 text-blue-500 focus:ring-blue-500">
                                Remember me on this device
                            </label>

                            <button type="submit"
                                class="btn-primary w-full py-3 rounded-2xl font-semibold text-white text-base flex items-center justify-center gap-2">
                                <span>Sign In</span>
                                <x-heroicon-o-arrow-right class="w-5 h-5" />
                            </button>
                        </form>

                        <p class="mt-8 text-sm text-gray-400 text-center">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-semibold text-gradient">Create one now</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.app-layout>

