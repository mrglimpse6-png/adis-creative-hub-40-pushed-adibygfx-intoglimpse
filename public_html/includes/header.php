<?php
/**
 * Header Template
 * Common header for all pages
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Adil GFX - Professional Designer'; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? htmlspecialchars($page_description) : 'Professional logo design, YouTube thumbnails, and video editing services by Adil GFX'; ?>">
    <meta name="keywords" content="<?php echo isset($page_keywords) ? htmlspecialchars($page_keywords) : 'logo design, youtube thumbnails, video editing, graphic design'; ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Adil GFX - Professional Designer'; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? htmlspecialchars($page_description) : 'Professional design services'; ?>">
    <meta property="og:image" content="https://lovable.dev/opengraph-image-p98pqg.png">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Adil GFX - Professional Designer'; ?>">
    <meta name="twitter:description" content="<?php echo isset($page_description) ? htmlspecialchars($page_description) : 'Professional design services'; ?>">
    <meta name="twitter:image" content="https://lovable.dev/opengraph-image-p98pqg.png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://storage.googleapis.com/gpt-engineer-file-uploads/siIJJ05MmQdKXQ8zQDm5g4fv6H03/uploads/1758993123160-png for favicon.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo isset($canonical_url) ? htmlspecialchars($canonical_url) : 'https://adilgfx.com'; ?>">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <!-- Additional head content -->
    <?php if (isset($additional_head)) echo $additional_head; ?>
</head>
<body>
    <!-- Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2 font-bold text-xl text-gray-900 hover:text-red-500 transition-colors">
                    <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-orange-500 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">A</span>
                    </div>
                    <span>Adil GFX</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Home</a>
                    <a href="/portfolio.php" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Portfolio</a>
                    <a href="/services.php" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Services</a>
                    <a href="/about.php" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">About</a>
                    <a href="/testimonials.php" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Testimonials</a>
                    <a href="/blog.php" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Blog</a>
                    <a href="/contact.php" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Contact</a>
                </div>

                <!-- CTA Button -->
                <div class="hidden md:block">
                    <a href="/contact.php" class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-2 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                        Hire Me Now
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-gray-900">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="md:hidden hidden py-4 space-y-2 border-t border-gray-200">
                <a href="/" class="block px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">Home</a>
                <a href="/portfolio.php" class="block px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">Portfolio</a>
                <a href="/services.php" class="block px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">Services</a>
                <a href="/about.php" class="block px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">About</a>
                <a href="/testimonials.php" class="block px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">Testimonials</a>
                <a href="/blog.php" class="block px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">Blog</a>
                <a href="/contact.php" class="block px-4 py-2 text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg">Contact</a>
                <a href="/contact.php" class="block mx-4 mt-4 bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-2 rounded-lg font-medium text-center">
                    Hire Me Now
                </a>
            </div>
        </nav>
    </header>

    <!-- Mobile menu toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>