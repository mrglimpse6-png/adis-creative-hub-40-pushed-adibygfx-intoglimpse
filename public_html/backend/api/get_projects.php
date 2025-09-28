<?php
/**
 * Portfolio Projects API Endpoint
 * Returns portfolio projects data in JSON format
 */

// Set proper headers for API response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Include required files with proper error handling
try {
    require_once __DIR__ . '/../../classes/PortfolioManager.php';
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to load required files', 'message' => $e->getMessage()]);
    exit();
}

// Get request method
$method = $_SERVER['REQUEST_METHOD'];

// Only allow GET requests for this endpoint
if ($method !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

try {
    // Initialize portfolio manager
    $portfolioManager = new PortfolioManager();
    
    // Get query parameters
    $category = isset($_GET['category']) ? trim($_GET['category']) : 'All';
    $featured = isset($_GET['featured']) ? (bool)$_GET['featured'] : false;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : null;
    
    // Build filters array
    $filters = [];
    if ($category !== 'All') {
        $filters['category'] = $category;
    }
    if ($featured) {
        $filters['featured'] = true;
    }
    if ($limit) {
        $filters['limit'] = $limit;
    }
    
    // Get projects
    $projects = $portfolioManager->getAllProjects($filters);
    $categories = $portfolioManager->getCategories();
    $stats = $portfolioManager->getStats();
    
    // Return successful response
    $response = [
        'success' => true,
        'data' => [
            'projects' => $projects,
            'categories' => $categories,
            'stats' => $stats,
            'total_count' => count($projects)
        ],
        'filters_applied' => $filters,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    echo json_encode($response, JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    // Log error and return error response
    error_log("Portfolio API Error: " . $e->getMessage());
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Internal server error',
        'message' => 'Failed to fetch portfolio data',
        'debug' => $e->getMessage() // Remove in production
    ]);
}
?>