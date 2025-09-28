<?php
/**
 * API Router
 * Handles routing for all API endpoints with proper error handling
 */

// Set proper headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Error handling
set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

try {
    // Get request information
    $method = $_SERVER['REQUEST_METHOD'];
    $request_uri = $_SERVER['REQUEST_URI'];
    $path = parse_url($request_uri, PHP_URL_PATH);
    
    // Remove /backend/api from path
    $path = str_replace('/backend/api', '', $path);
    $path = ltrim($path, '/');
    
    // Parse path segments
    $segments = explode('/', $path);
    $endpoint = $segments[0] ?? '';
    $action = $segments[1] ?? '';
    $id = $segments[2] ?? '';
    
    // Route to appropriate endpoint
    switch ($endpoint) {
        case 'get_projects':
        case 'projects':
        case 'portfolio':
            require_once __DIR__ . '/get_projects.php';
            break;
            
        case 'forms':
            require_once __DIR__ . '/forms.php';
            break;
            
        case 'test':
            // Test endpoint for debugging
            echo json_encode([
                'success' => true,
                'message' => 'API is working',
                'method' => $method,
                'path' => $path,
                'segments' => $segments,
                'timestamp' => date('Y-m-d H:i:s')
            ]);
            break;
            
        default:
            http_response_code(404);
            echo json_encode([
                'success' => false,
                'error' => 'Endpoint not found',
                'available_endpoints' => ['get_projects', 'forms', 'test'],
                'requested_path' => $path
            ]);
            break;
    }
    
} catch (Exception $e) {
    // Log error
    error_log("API Error: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine());
    
    // Return error response
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Internal server error',
        'message' => 'An error occurred while processing your request',
        'debug' => [
            'error' => $e->getMessage(),
            'file' => basename($e->getFile()),
            'line' => $e->getLine()
        ]
    ]);
}
?>