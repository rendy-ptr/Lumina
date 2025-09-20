{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lamina </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">
    <!-- Animated Background -->
    <div class="animated-bg"></div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card-glass rounded-2xl px-6 py-4 animate-fade-in">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div
                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 p-2 animate-glow">
                                <x-ri-gemini-line class="text-white w-6 h-6" />
                            </div>
                        </div>
                        <h1 class="text-xl font-bold text-gradient">Lumina</h1>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden lg:flex items-center space-x-2">
                        <a href="/" class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                            <span class="text-sm font-medium">Home</span>
                        </a>
                        <a href="/blog" class="nav-item {{ request()->is('blog') ? 'active' : '' }}">
                            <span class="text-sm font-medium">Blog</span>
                        </a>
                        <a href="/about" class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                            <span class="text-sm font-medium">About</span>
                        </a>
                        <a href="/contact" class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                            <span class="text-sm font-medium">Contact</span>
                        </a>
                    </div>

                    <!-- Right Side Actions -->
                    <div class="hidden lg:flex items-center space-x-4">
                        <!-- Profile -->
                        <div class="relative group">
                            <button class="flex items-center space-x-3 btn-glass px-4 py-2 rounded-xl">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="Profile" class="w-8 h-8 rounded-lg ring-2 ring-white/20">
                                <span class="text-sm font-medium text-gray-300">John</span>
                                <svg class="w-4 h-4 text-gray-400 group-hover:rotate-180 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 9-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div
                                class="absolute right-0 top-full mt-2 w-64 glass-strong rounded-xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="p-4 border-b border-white/10">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="Profile" class="w-12 h-12 rounded-lg">
                                        <div>
                                            <h4 class="font-semibold text-white">John Doe</h4>
                                            <p class="text-sm text-gray-400">john@example.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <a href="#"
                                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/5 transition-colors group/item">
                                        <svg class="w-5 h-5 text-gray-400 group-hover/item:text-white" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="text-sm text-gray-300 group-hover/item:text-white">Profile</span>
                                    </a>
                                    <a href="#"
                                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white/5 transition-colors group/item">
                                        <svg class="w-5 h-5 text-gray-400 group-hover/item:text-white" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="text-sm text-gray-300 group-hover/item:text-white">Settings</span>
                                    </a>
                                    <hr class="my-2 border-white/10">
                                    <a href="#"
                                        class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-500/10 transition-colors group/item">
                                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span class="text-sm text-red-400">Sign Out</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden btn-glass w-10 h-10 rounded-xl flex items-center justify-center"
                        onclick="toggleMobileMenu()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="lg:hidden fixed inset-x-4 top-24 mobile-menu rounded-2xl p-6 transform -translate-y-4 opacity-0 invisible transition-all duration-300">
            <div class="space-y-4">
                <a href="/"
                    class="block py-3 px-4 rounded-xl {{ request()->is('/') ? 'bg-white/10' : 'hover:bg-white/5' }} transition-colors">
                    <span class="font-medium">Home</span>
                </a>
                <a href="/blog"
                    class="block py-3 px-4 rounded-xl {{ request()->is('blog') ? 'bg-white/10' : 'hover:bg-white/5' }} transition-colors">
                    <span class="font-medium">Blog</span>
                </a>
                <a href="/about"
                    class="block py-3 px-4 rounded-xl {{ request()->is('about') ? 'bg-white/10' : 'hover:bg-white/5' }} transition-colors">
                    <span class="font-medium">About</span>
                </a>
                <a href="/contact"
                    class="block py-3 px-4 rounded-xl {{ request()->is('contact') ? 'bg-white/10' : 'hover:bg-white/5' }} transition-colors">
                    <span class="font-medium">Contact</span>
                </a>
                <hr class="border-white/10">
                <div class="flex items-center space-x-3 py-3 px-4">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="Profile" class="w-8 h-8 rounded-lg">
                    <div>
                        <div class="font-medium">John Doe</div>
                        <div class="text-sm text-gray-400">john@example.com</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Header -->
    <header class="pt-32 pb-20 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center animate-slide-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full glass mb-8 animate-scale-in">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-3 animate-pulse"></span>
                    <span class="text-sm text-gray-300">A modern space to share ideas, stories, and reflections with
                        the world</span>
                </div>

                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black mb-8 leading-tight">
                    <span class="text-gradient">Lumina Shine Through Stories</span>
                </h1>

                <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-12 leading-relaxed">
                    Welcome to Lumina where your stories light the way.
                    Every thought, reflection, and memory becomes a spark that reaches hearts
                    and inspires minds. Share your journey and let your words illuminate the world.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <button
                        class="btn-primary px-8 py-4 rounded-2xl font-semibold text-white flex items-center space-x-2 group">
                        <span>Get Started</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                    <button
                        class="btn-glass px-8 py-4 rounded-2xl font-semibold text-white flex items-center space-x-2">
                        <x-eva-github-outline class="text-white w-6 h-6" />
                        <span>Github Repository</span>
                    </button>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto">
                    <div class="text-center animate-scale-in" style="animation-delay: 0.1s">
                        <div class="text-3xl font-bold text-gradient">10K+</div>
                        <div class="text-sm text-gray-400 mt-1">Active Users</div>
                    </div>
                    <div class="text-center animate-scale-in" style="animation-delay: 0.2s">
                        <div class="text-3xl font-bold text-gradient">50K+</div>
                        <div class="text-sm text-gray-400 mt-1">Posts Created</div>
                    </div>
                    <div class="text-center animate-scale-in" style="animation-delay: 0.3s">
                        <div class="text-3xl font-bold text-gradient">99.9%</div>
                        <div class="text-sm text-gray-400 mt-1">Uptime</div>
                    </div>
                    <div class="text-center animate-scale-in" style="animation-delay: 0.4s">
                        <div class="text-3xl font-bold text-gradient">24/7</div>
                        <div class="text-sm text-gray-400 mt-1">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="relative py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="card p-8 lg:p-12 animate-slide-up" style="animation-delay: 0.2s">
                Welcome to the main content area. This section can be customized with your own content, articles,
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative py-20 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 p-2">
                            <x-ri-gemini-line class="text-white w-6 h-6" />
                        </div>
                        <h3 class="text-2xl font-bold text-gradient">Lumina</h3>
                    </div>
                    <p class="text-gray-400 mb-8 max-w-md leading-relaxed">
                        Empowering creators with cutting-edge tools to build, share, and monetize their content in the
                        digital age.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.22.082.339-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.758-1.378l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.624 0 11.99-5.367 11.99-11.99C24.007 5.367 18.641.001.012.001z.017 0z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="/"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Home
                            </a></li>
                        <li><a href="/about"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                About
                            </a></li>
                        <li><a href="/project"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Projects
                            </a></li>
                        <li><a href="/contact"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Contact
                            </a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-white">Resources</h4>
                    <ul class="space-y-4">
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Documentation
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                API Reference
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Community
                            </a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-white transition-colors flex items-center group">
                                <span
                                    class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                Support
                            </a></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter Signup -->
            <div class="card p-8 mb-12">
                <div class="text-center">
                    <h3 class="text-2xl font-bold mb-4 text-gradient">Stay Updated</h3>
                    <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                        Get the latest updates, tutorials, and exclusive content delivered straight to your inbox.
                    </p>
                    <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">
                        <input type="email" placeholder="Enter your email address"
                            class="flex-1 px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        <button class="btn-primary px-6 py-3 rounded-xl font-semibold whitespace-nowrap">
                            Subscribe
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-4">
                        No spam, unsubscribe anytime. We respect your privacy.
                    </p>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center pt-8 border-t border-white/5">
                <div class="text-gray-400 text-sm mb-4 md:mb-0">
                    © 2025 Lumina. All rights reserved. Built with ❤️ using Laravel & Tailwind CSS.
                </div>
                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy
                        Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of
                        Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Cookie
                        Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop"
        class="fixed bottom-8 right-8 btn-primary w-12 h-12 rounded-full opacity-0 invisible transition-all duration-300 z-40">
        <svg class="w-5 h-5 text-white mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

</body>

</html> --}}
