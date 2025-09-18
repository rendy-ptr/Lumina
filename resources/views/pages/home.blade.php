<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lumina </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen">
    <!-- Animated Background -->
    <div class="animated-bg"></div>

    <!-- Navigation -->
    <x-shared.navbar />

    <!-- Hero Header -->
    <x-private.hero />

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
                        <a href="#" class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                        <a href="#" class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                        <a href="#" class="btn-glass w-12 h-12 rounded-xl flex items-center justify-center group">
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

</html>
