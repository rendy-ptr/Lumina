<x-layouts.author-layout title="Profile Settings">
    <section class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-white">Profile</h1>
                <p class="text-white/60 text-sm">Keep your author presence updated so readers can connect with you.</p>
            </div>
            <a href="{{ route('author.dashboard') }}"
                class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">Back to
                dashboard</a>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
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
            <div class="glass-strong rounded-3xl border border-white/10 p-6 space-y-6">
                <div class="flex flex-col items-center text-center space-y-3">
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}"
                        class=                        class="w-28 h-28 rounded-2xl object-cover border border-white/20"
                        data-avatar-preview-target
                        data-avatar-preview-original="{{ $user->avatar_url }}">
                    <div>
                        <p class="text-lg font-semibold text-white">{{ $user->name }}</p>
                        <p class="text-sm text-white/60">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-xs text-white/60 space-y-2">
                    <p>- Upload a clear portrait so readers can recognise you.</p>
                    <p>- Add your LinkedIn to highlight professional work.</p>
                    <p>- Share a short bio describing the stories you tell.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('author.profile.update') }}" enctype="multipart/form-data"
                class="glass-strong rounded-3xl border border-white/10 p-6 lg:col-span-2 space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Display name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Profile photo</label>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-3 sm:space-y-0">
                        <div class="flex items-center space-x-3">
                            <img src="{{ $user->avatar_url }}" alt="Current avatar"
                                class="w-16 h-16 rounded-xl object-cover border border-white/10"
                                data-avatar-preview-target
                                data-avatar-preview-original="{{ $user->avatar_url }}">
                            <div class="text-xs text-white/50 space-y-1">
                                <p>PNG atau JPG hingga 2 MB.</p>
                                <p class="text-emerald-300 hidden" data-avatar-preview-status>Preview updated.</p>
                            </div>
                        </div>
                        <label
                            class="btn-glass px-4 py-2 rounded-xl text-sm text-white/80 hover:text-white cursor-pointer">
                            <input type="file" name="avatar" class="hidden" accept="image/*" data-avatar-preview-input>
              </label>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Job title</label>
                    <input type="text" name="job_title" value="{{ old('job_title', $profile->job_title ?? '') }}"
                        placeholder="Investigative Journalist, Storyteller, etc."
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Signature quote</label>
                    <input type="text" name="quote" value="{{ old('quote', $profile->quote ?? '') }}"
                        placeholder="Write a short quote that represents your voice."
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-white/70">Bio</label>
                    <textarea name="bio" rows="6"
                        placeholder="Introduce yourself, the themes you cover, and what readers can expect."
                        class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">{{ old('bio', $profile->bio ?? '') }}</textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">LinkedIn URL</label>
                        <input type="url" name="linkedin_url"
                            value="{{ old('linkedin_url', $profile->linkedin_url ?? '') }}"
                            placeholder="https://linkedin.com/in/username"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Twitter URL</label>
                        <input type="url" name="twitter_url"
                            value="{{ old('twitter_url', $profile->twitter_url ?? '') }}"
                            placeholder="https://twitter.com/username"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Facebook URL</label>
                        <input type="url" name="facebook_url"
                            value="{{ old('facebook_url', $profile->facebook_url ?? '') }}"
                            placeholder="https://facebook.com/username"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Instagram URL</label>
                        <input type="url" name="instagram_url"
                            value="{{ old('instagram_url', $profile->instagram_url ?? '') }}"
                            placeholder="https://instagram.com/username"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Website URL</label>
                        <input type="url" name="website_url"
                            value="{{ old('website_url', $profile->website_url ?? '') }}"
                            placeholder="https://yourwebsite.com"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-white/70">Gmail</label>
                        <input type="email" name="gmail" value="{{ old('gmail', $profile->gmail ?? '') }}"
                            placeholder="you@gmail.com"
                            class="w-full px-4 py-3 rounded-2xl bg-white/5 border border-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <p class="text-xs text-white/50">Changes are saved once you press update.</p>
                    <div class="flex items-center space-x-3">
                        <a href="{{ $publicProfileUrl }}" target="_blank"
                            class="btn-glass px-4 py-2 rounded-xl text-sm text-white/70 hover:text-white transition">View
                            public profile</a>
                        <button type="submit"
                            class="btn-primary px-5 py-2 rounded-xl text-sm font-semibold text-white shadow-lg">Update
                            profile</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layouts.author-layout>
