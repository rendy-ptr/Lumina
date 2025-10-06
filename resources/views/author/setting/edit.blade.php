<x-layouts.author-layout title="Account Settings">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Account security</h1>
                <p class="text-white/60 text-sm">Update your sign-in details to keep your Lumina account protected.</p>
            </div>
            <a href="{{ route('author.setting.index') }}"
                class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">Account
                Information</a>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        @endif

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-2xl border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-200 space-y-1">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-5">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-white/10 text-white">
                    <x-heroicon-o-shield-check class="w-6 h-6" />
                </div>
                <div class="space-y-2">
                    <h2 class="text-lg font-semibold text-white">Strengthen your login</h2>
                    <p class="text-sm text-white/60 leading-relaxed">
                        Regularly refresh your email or password so only you can access your stories. Choose unique
                        passwords and avoid reusing them across platforms.
                    </p>
                </div>
                <ul class="space-y-2 text-xs text-white/50">
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-sparkles class="w-4 h-4 text-white/60" />
                        Use a verified email you check often.
                    </li>
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-lock-closed class="w-4 h-4 text-white/60" />
                        Add at least 12 characters with symbols for your password.
                    </li>
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-bell-alert class="w-4 h-4 text-white/60" />
                        Watch for security emails when changes are made.
                    </li>
                </ul>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <form method="POST" action="{{ route('author.setting.update') }}"
                    class="glass-strong rounded-3xl border border-white/10 p-6 space-y-6">
                    @csrf
                    <input type="hidden" name="intent" value="update-email">

                    <div class="space-y-1">
                        <span class="text-xs uppercase tracking-[0.3em] text-white/50">Email</span>
                        <h2 class="text-xl font-semibold text-white">Change sign-in email</h2>
                        <p class="text-sm text-white/60">New contact details help us reach you if there is unusual
                            activity.</p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Current email</label>
                        <div class="px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white/70 text-sm">
                            {{ $user?->email }}
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-white/70">New email address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            placeholder="name@email.com"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    </div>

                    <div class="space-y-2">
                        <label for="email_password" class="block text-sm font-medium text-white/70">
                            Confirm with password
                        </label>
                        <div class="relative">
                            <input id="email_password" type="password" name="email_current_password"
                                placeholder="Current password"
                                class="w-full px-4 py-3 pr-12 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                            <button type="button"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition"
                                data-password-toggle="email_password" aria-label="Toggle password visibility">
                                <x-heroicon-o-eye class="w-5 h-5" data-icon="show" />
                                <x-heroicon-o-eye-slash class="w-5 h-5 hidden" data-icon="hide" />
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <p class="text-xs text-white/50">We will send a confirmation to both email addresses.</p>
                        <button type="submit"
                            class="btn-primary px-5 py-2 rounded-xl text-sm font-semibold text-white shadow-lg">Update
                            email</button>
                    </div>
                </form>

                <form method="POST" action="{{ route('author.setting.update') }}"
                    class="glass-strong rounded-3xl border border-white/10 p-6 space-y-6">
                    @csrf
                    <input type="hidden" name="intent" value="update-password">

                    <div class="space-y-1">
                        <span class="text-xs uppercase tracking-[0.3em] text-white/50">Password</span>
                        <h2 class="text-xl font-semibold text-white">Update password</h2>
                        <p class="text-sm text-white/60">A strong password protects your drafts and published work.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="current_password" class="block text-sm font-medium text-white/70">Current
                                password</label>
                            <div class="relative">
                                <input id="current_password" type="password" name="current_password"
                                    autocomplete="current-password" placeholder="Current password"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                                <button type="button"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition"
                                    data-password-toggle="current_password" aria-label="Toggle password visibility">
                                    <x-heroicon-o-eye class="w-5 h-5" data-icon="show" />
                                    <x-heroicon-o-eye-slash class="w-5 h-5 hidden" data-icon="hide" />
                                </button>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label for="new_password" class="block text-sm font-medium text-white/70">New
                                password</label>
                            <div class="relative">
                                <input id="new_password" type="password" name="password" autocomplete="new-password"
                                    placeholder="Choose a new password"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                                <button type="button"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition"
                                    data-password-toggle="new_password" aria-label="Toggle password visibility">
                                    <x-heroicon-o-eye class="w-5 h-5" data-icon="show" />
                                    <x-heroicon-o-eye-slash class="w-5 h-5 hidden" data-icon="hide" />
                                </button>
                            </div>
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label for="password_confirmation" class="block text-sm font-medium text-white/70">Confirm
                                new password</label>
                            <div class="relative">
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    autocomplete="new-password" placeholder="Repeat new password"
                                    class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                                <button type="button"
                                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white transition"
                                    data-password-toggle="password_confirmation"
                                    aria-label="Toggle password visibility">
                                    <x-heroicon-o-eye class="w-5 h-5" data-icon="show" />
                                    <x-heroicon-o-eye-slash class="w-5 h-5 hidden" data-icon="hide" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <p class="text-xs text-white/50">Keep this password private. Avoid sharing it over email or
                            chat.</p>
                        <button type="submit"
                            class="btn-primary px-5 py-2 rounded-xl text-sm font-semibold text-white shadow-lg">Save
                            new
                            password</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.author-layout>
