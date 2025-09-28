<?php
/**
 * Homepage - Dynamic PHP Template
 * Displays portfolio highlights and services dynamically from database
 */

// Page configuration
$page_title = "Adil GFX - Professional Logo Design, YouTube Thumbnails & Video Editing";
$page_description = "Transform your brand with premium logo design, high-converting YouTube thumbnails, and professional video editing. Trusted by 500+ clients worldwide. Get results in 24-48 hours.";
$page_keywords = "logo design, youtube thumbnails, video editing, brand identity, graphic design, youtube optimization, channel setup, adil gfx";
$canonical_url = "https://adilgfx.com";

// Load portfolio data for homepage highlights
try {
    require_once __DIR__ . '/classes/PortfolioManager.php';
    $portfolioManager = new PortfolioManager();
    $featured_projects = $portfolioManager->getFeaturedProjects(4);
    $portfolio_stats = $portfolioManager->getStats();
} catch (Exception $e) {
    error_log("Homepage portfolio data error: " . $e->getMessage());
    $featured_projects = [];
    $portfolio_stats = ['total_projects' => 0, 'featured_projects' => 0];
}

// Include header
include __DIR__ . '/includes/header.php';
?>

<main class="pt-16">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50 to-white"></div>
        
        <!-- Animated background elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-r from-red-500 to-orange-500 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full blur-3xl animate-pulse"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center space-y-8">
                <!-- Badge -->
                <div class="inline-flex items-center space-x-2 bg-white border border-gray-200 rounded-full px-4 py-2 shadow-sm">
                    <span class="text-red-500">⭐</span>
                    <span class="text-sm font-medium text-gray-600">
                        Trusted by 500+ YouTubers & Brands
                    </span>
                </div>

                <!-- Main headline -->
                <div class="space-y-4">
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-gray-900">
                        Transform Your Brand with
                        <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent block">
                            Premium Designs
                        </span>
                    </h1>
                    <p class="text-xl sm:text-2xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Professional logo design, YouTube thumbnails, and video editing that converts viewers into loyal customers. 
                        <span class="text-gray-900 font-medium"> Ready in 24-48 hours.</span>
                    </p>
                </div>

                <!-- CTA buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-8">
                    <a href="/contact.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold text-lg rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                        Start Your Project
                        <svg class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="/portfolio.php" class="inline-flex items-center px-8 py-4 border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-semibold text-lg rounded-lg transition-all duration-300">
                        <svg class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        View Portfolio
                    </a>
                </div>

                <!-- Trust indicators -->
                <div class="pt-12 grid grid-cols-2 md:grid-cols-4 gap-8 items-center opacity-60">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">500+</div>
                        <div class="text-sm text-gray-600">Happy Clients</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">24-48h</div>
                        <div class="text-sm text-gray-600">Delivery Time</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">99%</div>
                        <div class="text-sm text-gray-600">Satisfaction Rate</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900">5.0★</div>
                        <div class="text-sm text-gray-600">Average Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Highlights Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Portfolio That <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">Converts</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Real projects, real results. See how my designs helped clients grow their businesses and increase engagement.
                </p>
            </div>

            <!-- Portfolio grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mb-12">
                <?php if (!empty($featured_projects)): ?>
                    <?php foreach (array_slice($featured_projects, 0, 4) as $project): ?>
                        <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-500 group">
                            <!-- Image container -->
                            <div class="relative aspect-video bg-gray-200">
                                <img 
                                    src="<?php echo htmlspecialchars($project['featured_image_path']); ?>" 
                                    alt="<?php echo htmlspecialchars($project['featured_image_alt'] ?: $project['title']); ?>"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-start p-6">
                                    <div class="text-white">
                                        <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($project['title']); ?></h3>
                                        <p class="text-sm opacity-90"><?php echo htmlspecialchars($project['category']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <?php if (!empty($project['tags'])): ?>
                                        <?php foreach (array_slice($project['tags'], 0, 3) as $tag): ?>
                                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-md font-medium">
                                                <?php echo htmlspecialchars($tag); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo htmlspecialchars($project['title']); ?></h3>
                                <p class="text-gray-600 text-sm mb-3"><?php echo htmlspecialchars($project['description']); ?></p>
                                
                                <?php if (!empty($project['results_achieved'])): ?>
                                    <div class="bg-red-50 text-red-600 px-3 py-2 rounded-lg text-sm font-medium">
                                        📈 <?php echo htmlspecialchars($project['results_achieved']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Fallback content if no projects -->
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-600">Portfolio projects will be displayed here once loaded from the database.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CTA -->
            <div class="text-center">
                <a href="/portfolio.php" class="inline-flex items-center px-8 py-4 border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-semibold rounded-lg transition-all duration-300">
                    View Full Portfolio
                    <svg class="ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Services Overview Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Services That <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">Drive Results</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Professional design services tailored to grow your business and increase conversions.
                </p>
            </div>

            <!-- Services grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Logo Design -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl mb-6">
                            <span class="text-3xl">🎨</span>
                        </div>
                        
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Logo Design</h3>
                        <p class="text-gray-600 mb-6">Professional logos that make your brand unforgettable</p>
                        
                        <div class="space-y-2 mb-8">
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">3 Concepts</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">Unlimited Revisions</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">All File Formats</span>
                            </div>
                        </div>
                        
                        <div class="text-2xl font-bold text-gray-900 mb-6">From $149</div>
                        
                        <a href="/services.php#logo" class="block w-full bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- YouTube Thumbnails -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border-2 border-red-500 relative">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                        <span class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-4 py-1 rounded-full text-sm font-medium">
                            Most Popular
                        </span>
                    </div>

                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl mb-6">
                            <span class="text-3xl">📺</span>
                        </div>
                        
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">YouTube Thumbnails</h3>
                        <p class="text-gray-600 mb-6">Eye-catching thumbnails that boost your CTR</p>
                        
                        <div class="space-y-2 mb-8">
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">High CTR Design</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">24h Delivery</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">Mobile Optimized</span>
                            </div>
                        </div>
                        
                        <div class="text-2xl font-bold text-gray-900 mb-6">From $49</div>
                        
                        <a href="/services.php#thumbnails" class="block w-full bg-gradient-to-r from-red-500 to-orange-500 text-white py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                <!-- Video Editing -->
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-red-500 to-orange-500 rounded-xl mb-6">
                            <span class="text-3xl">🎬</span>
                        </div>
                        
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Video Editing</h3>
                        <p class="text-gray-600 mb-6">Professional editing that keeps viewers engaged</p>
                        
                        <div class="space-y-2 mb-8">
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">Color Grading</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">Motion Graphics</span>
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="text-sm text-gray-600">Sound Design</span>
                            </div>
                        </div>
                        
                        <div class="text-2xl font-bold text-gray-900 mb-6">From $299</div>
                        
                        <a href="/services.php#video" class="block w-full border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white py-3 rounded-lg font-medium transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">
                    Trusted by <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">Creators Worldwide</span>
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-500"><?php echo $portfolio_stats['total_projects']; ?>+</div>
                        <div class="text-gray-600">Projects Completed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-500">500+</div>
                        <div class="text-gray-600">Happy Clients</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-500">5.0★</div>
                        <div class="text-gray-600">Average Rating</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-red-500">24-48h</div>
                        <div class="text-gray-600">Delivery Time</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-8 shadow-sm">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Ready to Transform Your Brand?
                </h2>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Let's discuss your project and create designs that don't just look amazing, but drive real business growth.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="/contact.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                        Start Your Project Today
                    </a>
                    <a href="/portfolio.php" class="inline-flex items-center px-8 py-4 border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-semibold rounded-lg transition-all duration-300">
                        View Portfolio
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>