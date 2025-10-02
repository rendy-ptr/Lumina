<x-layouts.app-layout title="Register - Lumina">
    <main class="relative z-10 py-20">
        <section class="pt-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid gap-12 lg:grid-cols-2 items-center">
                    <div class="order-2 lg:order-1 glass-strong rounded-3xl p-8 border border-white/10 shadow-2xl">
                        <h2 class="text-2xl font-semibold text-white mb-6">Create your account</h2>

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

                        <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="space-y-2">
                                <label for="name" class="block text-left text-sm font-medium text-gray-300">Full
                                    name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    autocomplete="name"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" />
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="block text-left text-sm font-medium text-gray-300">Email
                                    address</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    autocomplete="email"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" />
                            </div>

                            <div class="space-y-3">
                                <span class="block text-left text-sm font-medium text-gray-300">Account type</span>
                                <div class="grid gap-3 sm:grid-cols-2">
                                    <label class="group" for="role-visitor">
                                        <input type="radio" id="role-visitor" name="role" value="visitor"
                                            class="peer sr-only"
                                            {{ old('role', 'visitor') === 'visitor' ? 'checked' : '' }} />
                                        <div
                                            class="rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl px-5 py-4 transition-all duration-200 group-hover:border-white/30 group-hover:bg-white/10 peer-checked:border-blue-500/70 peer-checked:bg-blue-500/10 peer-checked:shadow-lg">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-semibold text-white">Reader / Visitor</p>
                                                    <p class="text-xs text-gray-400 mt-1">following, manage Account, and
                                                        access comment in author articles.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="group" for="role-author">
                                        <input type="radio" id="role-author" name="role" value="author"
                                            class="peer sr-only" {{ old('role') === 'author' ? 'checked' : '' }} />
                                        <div
                                            class="rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl px-5 py-4 transition-all duration-200 group-hover:border-white/30 group-hover:bg-white/10 peer-checked:border-purple-500/70 peer-checked:bg-purple-500/10 peer-checked:shadow-lg">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm font-semibold text-white">Author / Contributor</p>
                                                    <p class="text-xs text-gray-400 mt-1">Publish articles, manage
                                                        articles, and advance profile such as contact profile.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <p class="text-xs text-gray-400">Choose the experience that best reflects your goals in
                                    Lumina.</p>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-2">
                                    <label for="password"
                                        class="block text-left text-sm font-medium text-gray-300">Password</label>
                                    <input type="password" name="password" id="password" required
                                        autocomplete="new-password"
                                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" />
                                </div>
                                <div class="space-y-2">
                                    <label for="password_confirmation"
                                        class="block text-left text-sm font-medium text-gray-300">Confirm
                                        password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        required autocomplete="new-password"
                                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" />
                                </div>
                            </div>

                            <p class="text-xs text-gray-400 leading-relaxed">
                                By creating an account, you agree to our <a href="#"
                                    class="text-gradient font-semibold">Terms of
                                    Service</a> and <a href="#" class="text-gradient font-semibold">Privacy
                                    Policy</a>.
                            </p>

                            <button type="submit"
                                class="btn-primary w-full py-3 rounded-2xl font-semibold text-white text-base flex items-center justify-center gap-2">
                                <span>Sign Up</span>
                                <x-heroicon-o-sparkles class="w-5 h-5" />
                            </button>
                        </form>

                        <p class="mt-8 text-sm text-gray-400 text-center">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-semibold text-gradient">Sign in</a>
                        </p>
                    </div>

                    <div class="order-1 lg:order-2 space-y-6 text-center lg:text-left">
                        <span
                            class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider bg-white/5 border border-white/10 text-gradient">
                            Join the community
                        </span>
                        <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight">
                            Unlock a personalized reading experience with <span class="text-gradient">Lumina</span>
                        </h1>
                        <p class="text-gray-400 text-lg max-w-xl mx-auto lg:mx-0">
                            Become part of a growing community of readers and creators. Follow topics you love, track
                            your
                            progress, and connect with voices that inspire you.
                        </p>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="card rounded-2xl p-5 border border-white/10">
                                <h3 class="text-white font-semibold text-lg mb-2">Built for creators</h3>
                                <p class="text-sm text-gray-400">Publish effortlessly and engage with an audience that
                                    values
                                    meaningful stories.</p>
                            </div>
                            <div class="card rounded-2xl p-5 border border-white/10">
                                <h3 class="text-white font-semibold text-lg mb-2">Thoughtful design</h3>
                                <p class="text-sm text-gray-400">Experience a calm, focused interface crafted for
                                    long-form reading
                                    sessions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layouts.app-layout>
