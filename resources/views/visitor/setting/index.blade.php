<x-layouts.visitor-layout title="Account Settings">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Account overview</h1>
                <p class="text-white/60 text-sm">Review your sign-in details and keep your Lumina account secure.</p>
            </div>
            <a href="{{ route('home') }}"
                class="btn-primary px-5 py-2 rounded-2xl text-sm font-semibold text-white shadow-lg flex items-center gap-2">
                <x-heroicon-o-home class="w-5 h-5" />
                <span>Back To Home</span>
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-6 xl:col-span-2">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span
                            class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-white">
                            <x-heroicon-o-shield-check class="w-6 h-6" />
                        </span>
                        <div>
                            <p class="text-xs uppercase tracking-[0.4em] text-white/50">Security snapshot</p>
                            <h2 class="text-lg font-semibold text-white">Sign-in details at a glance</h2>
                            <p class="text-sm text-white/60">Only you should have access to these credentials.</p>
                        </div>
                    </div>
                    <div
                        class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 px-4 py-2 text-xs text-emerald-200">
                        Updated {{ $accountUpdatedAt }}
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/10 text-white">
                                    <x-heroicon-o-envelope class="w-5 h-5" />
                                </span>
                                <div>
                                    <p class="text-sm text-white/60">Primary email</p>
                                    <p class="text-base font-semibold text-white break-all">{{ $user?->email }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs bg-white/10 text-white/60">Active</span>
                        </div>
                        <div class="flex items-start gap-2 text-xs text-white/50">
                            <x-heroicon-o-information-circle class="w-4 h-4 mt-0.5" />
                            <span>We use this email for account alerts, notifications, and password recovery.</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-white/50">Need to switch to another inbox?</p>
                            <a href="{{ route('visitor.setting.edit') }}"
                                class="text-xs font-medium text-white/80 hover:text-white">Update email</a>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/10 text-white">
                                    <x-heroicon-o-lock-closed class="w-5 h-5" />
                                </span>
                                <div>
                                    <p class="text-sm text-white/60">Password</p>
                                    <p class="text-base font-semibold text-white tracking-widest">{{ $maskedPassword }}
                                    </p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs bg-white/10 text-white/60">Protected</span>
                        </div>
                        <div class="flex items-start gap-2 text-xs text-white/50">
                            <x-heroicon-o-clock class="w-4 h-4 mt-0.5" />
                            <span>Last updated {{ $accountUpdatedAt }}. Refresh your password regularly for extra
                                safety.</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-white/50">Forgot your current password?</p>
                            <a href="{{ route('visitor.setting.edit') }}"
                                class="text-xs font-medium text-white/80 hover:text-white">Change password</a>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-white/10">
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                        <p class="text-xs text-white/50">Member since</p>
                        <p class="text-sm font-medium text-white">{{ $memberSince }}</p>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                        <p class="text-xs text-white/50">Account role</p>
                        <p class="text-sm font-medium text-white">{{ ucfirst($user?->role ?? 'visitor') }}</p>
                    </div>
                </div>
            </div>

            <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-5">
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-white/10 text-white">
                        <x-heroicon-o-shield-exclamation class="w-5 h-5" />
                    </span>
                    <div>
                        <h2 class="text-lg font-semibold text-white">Security reminders</h2>
                        <p class="text-sm text-white/60">Quick tips to keep your workspace safe.</p>
                    </div>
                </div>
                <ul class="space-y-3 text-sm text-white/70">
                    <li class="flex items-start gap-3">
                        <span class="mt-1 h-2 w-2 rounded-full bg-emerald-400"></span>
                        <span>Create unique passwords for Lumina and avoid reusing them elsewhere.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1 h-2 w-2 rounded-full bg-emerald-400"></span>
                        <span>Update your email if you lose access to this inbox or change organisations.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1 h-2 w-2 rounded-full bg-emerald-400"></span>
                        <span>Review settings each quarter to catch unauthorized changes early.</span>
                    </li>
                </ul>
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-xs text-white/50">
                    We will notify you at {{ $user?->email }} whenever your email or password is updated.
                </div>
            </div>
        </div>
    </section>
</x-layouts.visitor-layout>
