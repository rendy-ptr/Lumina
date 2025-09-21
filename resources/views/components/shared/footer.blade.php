<footer class="relative py-16 border-t border-white/10  text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Grid Layout Responsive -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Brand -->
            <div class="flex flex-col items-start">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 p-2">
                        <x-ri-gemini-line class="text-white w-6 h-6" />
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">Lumina</h3>
                </div>
                <p class="text-gray-400 mb-6 max-w-xs leading-relaxed">
                    Empowering creators with cutting-edge tools to build, share, and monetize their content in the
                    digital age.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="btn-glass w-10 h-10 rounded-xl flex items-center justify-center group">
                        <x-bi-twitter class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" />
                    </a>
                    <a href="#" class="btn-glass w-10 h-10 rounded-xl flex items-center justify-center group">
                        <x-bi-instagram class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" />
                    </a>
                    <a href="#" class="btn-glass w-10 h-10 rounded-xl flex items-center justify-center group">
                        <x-bi-linkedin class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" />
                    </a>
                    <a href="#" class="btn-glass w-10 h-10 rounded-xl flex items-center justify-center group">
                        <x-bi-pinterest class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" />
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="flex flex-col items-start">
                <h4 class="text-lg font-semibold mb-6 text-white">Explore Stories</h4>
                <ul class="space-y-3">
                    <li><a href="/"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Home
                        </a></li>
                    <li><a href="/blog"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            All Stories
                        </a></li>
                    <li><a href="/about"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Find Writers
                        </a></li>
                    <li><a href="/contact"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-blue-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Contact Writers
                        </a></li>
                </ul>
            </div>

            <div class="flex flex-col items-start">
                <h4 class="text-lg font-semibold mb-6 text-white">Become Writer</h4>
                <ul class="space-y-3">
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Login
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Register
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Create Story
                        </a></li>
                    <li><a href="#"
                            class="text-gray-400 hover:text-white transition-colors flex items-center group">
                            <span
                                class="w-2 h-2 bg-purple-500 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                            Explore Stories
                        </a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="flex flex-col items-start">
                <h3 class="text-2xl font-bold mb-4 text-gradient">Stay Updated</h3>
                <p class="text-gray-400 mb-6 max-w-xs">
                    Get the latest updates, tutorials, and exclusive content delivered straight to your inbox.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 w-full max-w-md">
                    <input type="email" placeholder="Enter your email address"
                        class="flex-1 px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                    <button class="btn-primary px-6 py-3 rounded-xl font-semibold whitespace-nowrap">
                        Subscribe
                    </button>
                </div>
                <p class="text-xs text-gray-500 mt-3">
                    No spam, unsubscribe anytime.
                </p>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-gray-400 text-sm">
                © 2025 Lumina. All rights reserved. Built with ❤️ using Laravel & Tailwind CSS.
            </div>
            <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
