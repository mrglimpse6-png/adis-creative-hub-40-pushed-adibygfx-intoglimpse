<?php
/**
 * Footer Template
 * Common footer for all pages
 */
?>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <!-- Newsletter section -->
        <div class="border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-bold mb-2">Stay Updated</h3>
                        <p class="text-gray-400">
                            Get free design tips, latest trends, and exclusive offers delivered to your inbox.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input 
                            type="email" 
                            placeholder="Enter your email" 
                            class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500"
                        >
                        <button class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-2 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Subscribe Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main footer content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Brand column -->
                <div class="lg:col-span-1">
                    <a href="/" class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-sm">A</span>
                        </div>
                        <span class="font-bold text-xl">Adil GFX</span>
                    </a>
                    <p class="text-gray-400 mb-6 text-sm">
                        Professional designer helping brands and YouTubers grow through premium visual content.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-500 transition-colors">
                            <span class="text-sm">f</span>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-500 transition-colors">
                            <span class="text-sm">ig</span>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-red-500 transition-colors">
                            <span class="text-sm">in</span>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="/services.php#logo" class="text-gray-400 hover:text-white text-sm transition-colors">Logo Design</a></li>
                        <li><a href="/services.php#thumbnails" class="text-gray-400 hover:text-white text-sm transition-colors">YouTube Thumbnails</a></li>
                        <li><a href="/services.php#video" class="text-gray-400 hover:text-white text-sm transition-colors">Video Editing</a></li>
                        <li><a href="/services.php#youtube-branding" class="text-gray-400 hover:text-white text-sm transition-colors">YouTube Channel Setup</a></li>
                    </ul>
                </div>

                <!-- Explore -->
                <div>
                    <h4 class="font-semibold mb-4">Explore</h4>
                    <ul class="space-y-2">
                        <li><a href="/portfolio.php" class="text-gray-400 hover:text-white text-sm transition-colors">Portfolio</a></li>
                        <li><a href="/blog.php" class="text-gray-400 hover:text-white text-sm transition-colors">Blog</a></li>
                        <li><a href="/testimonials.php" class="text-gray-400 hover:text-white text-sm transition-colors">Testimonials</a></li>
                        <li><a href="/testimonials.php#case-studies" class="text-gray-400 hover:text-white text-sm transition-colors">Case Studies</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="/faq.php" class="text-gray-400 hover:text-white text-sm transition-colors">FAQ</a></li>
                        <li><a href="/contact.php" class="text-gray-400 hover:text-white text-sm transition-colors">Contact</a></li>
                        <li><a href="/privacy.php" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a></li>
                        <li><a href="/terms.php" class="text-gray-400 hover:text-white text-sm transition-colors">Terms & Conditions</a></li>
                    </ul>
                </div>

                <!-- Business -->
                <div>
                    <h4 class="font-semibold mb-4">Business</h4>
                    <ul class="space-y-2">
                        <li><a href="/contact.php" class="text-gray-400 hover:text-white text-sm transition-colors">Hire Me (Direct)</a></li>
                        <li><a href="https://fiverr.com/adilgfx" target="_blank" class="text-gray-400 hover:text-white text-sm transition-colors">Fiverr Profile</a></li>
                        <li><a href="/media-kit.php" class="text-gray-400 hover:text-white text-sm transition-colors">Media Kit (PDF)</a></li>
                        <li><a href="#lead-magnet" class="text-gray-400 hover:text-white text-sm transition-colors">Free Templates</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        © <?php echo date('Y'); ?> GFX by Adi. All rights reserved.
                    </p>
                    <div class="flex items-center space-x-6 mt-4 md:mt-0">
                        <a href="mailto:hello@adilgfx.com" class="flex items-center space-x-2 text-gray-400 hover:text-white text-sm transition-colors">
                            <span>📧</span>
                            <span>hello@adilgfx.com</span>
                        </a>
                        <a href="https://wa.me/1234567890" class="flex items-center space-x-2 text-gray-400 hover:text-white text-sm transition-colors">
                            <span>📱</span>
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="/assets/js/main.js"></script>
    
    <!-- Additional scripts -->
    <?php if (isset($additional_scripts)) echo $additional_scripts; ?>
</body>
</html>