<?php
/**
 * Portfolio Page - Dynamic PHP Template
 * Displays all portfolio projects from database with filtering
 */

// Page configuration
$page_title = "Portfolio - Professional Design Work & Case Studies | Adil GFX";
$page_description = "View our portfolio of logo designs, YouTube thumbnails, and video editing projects. See real results including increased CTR, funding secured, and revenue generated.";
$page_keywords = "design portfolio, logo design examples, youtube thumbnail portfolio, video editing showcase, design case studies, creative work samples";
$canonical_url = "https://adilgfx.com/portfolio";

// Get filter parameters
$selected_category = isset($_GET['category']) ? trim($_GET['category']) : 'All';

// Load portfolio data
try {
    require_once __DIR__ . '/classes/PortfolioManager.php';
    $portfolioManager = new PortfolioManager();
    
    // Get all projects with current filter
    $filters = [];
    if ($selected_category !== 'All') {
        $filters['category'] = $selected_category;
    }
    
    $projects = $portfolioManager->getAllProjects($filters);
    $categories = $portfolioManager->getCategories();
    $stats = $portfolioManager->getStats();
    
} catch (Exception $e) {
    error_log("Portfolio page error: " . $e->getMessage());
    $projects = [];
    $categories = ['All'];
    $stats = ['total_projects' => 0];
}

// Include header
include __DIR__ . '/includes/header.php';
?>

<main class="pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page header -->
        <div class="text-center mb-16">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                Portfolio That <span class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">Drives Results</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Real projects, real results. Each design is crafted to not just look amazing, but to drive measurable business growth for my clients.
            </p>
        </div>

        <!-- Category filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <?php foreach ($categories as $category): ?>
                <a 
                    href="?category=<?php echo urlencode($category); ?>"
                    class="px-6 py-2 rounded-lg font-medium transition-all duration-300 <?php echo $selected_category === $category ? 'bg-gradient-to-r from-red-500 to-orange-500 text-white' : 'border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white'; ?>"
                >
                    <?php echo htmlspecialchars($category); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Results info -->
        <div class="text-center mb-8">
            <p class="text-gray-600">
                Showing <?php echo count($projects); ?> project<?php echo count($projects) !== 1 ? 's' : ''; ?>
                <?php if ($selected_category !== 'All'): ?>
                    in <strong><?php echo htmlspecialchars($selected_category); ?></strong>
                <?php endif; ?>
            </p>
        </div>

        <!-- Portfolio grid -->
        <?php if (!empty($projects)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($projects as $project): ?>
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
                                    <h3 class="text-lg font-semibold mb-2"><?php echo htmlspecialchars($project['title']); ?></h3>
                                    <div class="flex items-center space-x-2">
                                        <button class="bg-white/20 text-white px-3 py-1 rounded text-sm hover:bg-white/30 transition-colors">
                                            👁️ View Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-3">
                                <?php if (!empty($project['tags'])): ?>
                                    <?php foreach (array_slice($project['tags'], 0, 3) as $tag): ?>
                                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-md font-medium">
                                            <?php echo htmlspecialchars($tag); ?>
                                        </span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Title and description -->
                            <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="text-gray-600 text-sm mb-3"><?php echo htmlspecialchars($project['description']); ?></p>
                            
                            <!-- Results -->
                            <?php if (!empty($project['results_achieved'])): ?>
                                <div class="bg-red-50 text-red-600 px-3 py-2 rounded-lg text-sm font-medium">
                                    📈 <?php echo htmlspecialchars($project['results_achieved']); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Client info -->
                            <?php if (!empty($project['client_name'])): ?>
                                <div class="mt-3 text-xs text-gray-500">
                                    Client: <?php echo htmlspecialchars($project['client_name']); ?>
                                    <?php if (!empty($project['completion_date'])): ?>
                                        • <?php echo date('M Y', strtotime($project['completion_date'])); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- No projects found -->
            <div class="text-center py-16">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl">🎨</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No Projects Found</h3>
                <p class="text-gray-600 mb-6">
                    <?php if ($selected_category !== 'All'): ?>
                        No projects found in the "<?php echo htmlspecialchars($selected_category); ?>" category.
                    <?php else: ?>
                        No portfolio projects are currently available.
                    <?php endif; ?>
                </p>
                <a href="/portfolio.php" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-orange-500 text-white font-medium rounded-lg hover:shadow-lg transition-all duration-300">
                    View All Projects
                </a>
            </div>
        <?php endif; ?>

        <!-- Bottom CTA -->
        <div class="text-center mt-16">
            <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-8 shadow-sm">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    Ready to Get Similar Results?
                </h2>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    Let's discuss your project and create designs that don't just look great, but drive real business growth.
                </p>
                <a href="/contact.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all duration-300">
                    Start Your Project Today
                </a>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>