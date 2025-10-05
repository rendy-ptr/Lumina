<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($authors as $author)
        <div class="card overflow-hidden group">
            <div class="relative overflow-hidden">
                <img src={{ $author->avatar_url }} alt={{ $author->name }}
                    class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
            </div>
            <div class="p-6">
                <div class="text-center mb-4">
                    <h3 class="text-xl font-bold text-white mb-1">{{ $author->name }}</h3>
                    <p class="text-purple-400 text-sm">
                        {{ $author->authorProfile->job_title ?? 'job title not filled in yet' }}</p>
                </div>

                <p class="text-white/70 text-sm mb-6 text-center">
                    {{ $author->authorProfile->bio ?? 'bio not filled in yet' }}
                </p>

                <div class="flex justify-center space-x-4 mb-6">
                    {{-- LinkedIn --}}
                    @if (!empty($author->authorProfile->linkedin_url))
                        <a href="{{ $author->authorProfile->linkedin_url }}"
                            class="btn-glass p-3 rounded-full text-white hover:text-purple-300 transition-colors"
                            title="LinkedIn">
                            @svg('bi-linkedin', 'w-5 h-5')
                        </a>
                    @endif

                    {{-- Twitter --}}
                    @if (!empty($author->authorProfile->twitter_url))
                        <a href="{{ $author->authorProfile->twitter_url }}"
                            class="btn-glass p-3 rounded-full text-white hover:text-purple-300 transition-colors"
                            title="Twitter">
                            @svg('bi-twitter', 'w-5 h-5')
                        </a>
                    @endif

                    {{-- Facebook --}}
                    @if (!empty($author->authorProfile->facebook_url))
                        <a href="{{ $author->authorProfile->facebook_url }}"
                            class="btn-glass p-3 rounded-full text-white hover:text-purple-300 transition-colors"
                            title="Facebook">
                            @svg('bi-facebook', 'w-5 h-5')
                        </a>
                    @endif

                    {{-- Instagram --}}
                    @if (!empty($author->authorProfile->instagram_url))
                        <a href="{{ $author->authorProfile->instagram_url }}"
                            class="btn-glass p-3 rounded-full text-white hover:text-purple-300 transition-colors"
                            title="Instagram">
                            @svg('bi-instagram', 'w-5 h-5')
                        </a>
                    @endif

                    {{-- Website --}}
                    @if (!empty($author->authorProfile->website_url))
                        <a href="{{ $author->authorProfile->website_url }}"
                            class="btn-glass p-3 rounded-full text-white hover:text-purple-300 transition-colors"
                            title="Website">
                            @svg('bi-globe', 'w-5 h-5')
                        </a>
                    @endif

                    {{-- Email --}}
                    @if (!empty($author->authorProfile->email))
                        <a href="mailto:{{ $author->authorProfile->email }}"
                            class="btn-glass p-3 rounded-full text-white hover:text-purple-300 transition-colors"
                            title="Email {{ $author->name }}">
                            @svg('css-mail', 'w-5 h-5')
                        </a>
                    @endif

                    @if (empty($author->authorProfile->linkedin_url) &&
                            empty($author->authorProfile->twitter_url) &&
                            empty($author->authorProfile->facebook_url) &&
                            empty($author->authorProfile->instagram_url) &&
                            empty($author->authorProfile->website_url) &&
                            empty($author->authorProfile->email))
                        <p class="text-gray-400 text-sm">No social links available.</p>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p class="text-gray-400">No authors found.</p>
    @endforelse
</div>
