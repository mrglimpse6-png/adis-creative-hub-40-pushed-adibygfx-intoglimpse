<?php
/**
 * Database Connection Test Script
 * Use this to verify your database connection is working
 */

echo "<h1>Database Connection Test</h1>";

try {
    require_once __DIR__ . '/config/database.php';
    
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
    
    // Test portfolio manager
    require_once __DIR__ . '/classes/PortfolioManager.php';
    $portfolioManager = new PortfolioManager();
    
    echo "<p style='color: green;'>✅ PortfolioManager class loaded successfully!</p>";
    
    // Test getting projects
    $projects = $portfolioManager->getAllProjects();
    echo "<p style='color: green;'>✅ Portfolio projects query successful!</p>";
    echo "<p>Found " . count($projects) . " projects in database.</p>";
    
    // Test getting categories
    $categories = $portfolioManager->getCategories();
    echo "<p style='color: green;'>✅ Categories query successful!</p>";
    echo "<p>Available categories: " . implode(', ', $categories) . "</p>";
    
    // Test API endpoint
    echo "<h2>API Test</h2>";
    $api_url = 'http://' . $_SERVER['HTTP_HOST'] . '/backend/api/get_projects.php';
    echo "<p>Testing API endpoint: <a href='{$api_url}' target='_blank'>{$api_url}</a></p>";
    
    echo "<h2>Database Tables</h2>";
    $tables_query = "SHOW TABLES";
    $stmt = $db_connection->prepare($tables_query);
    $stmt->execute();
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li>✅ " . htmlspecialchars($table) . "</li>";
    }
    echo "</ul>";
    
    echo "<p style='color: green; font-weight: bold; margin-top: 2rem;'>🎉 All tests passed! Your website should be working correctly.</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p style='color: red;'>File: " . htmlspecialchars($e->getFile()) . "</p>";
    echo "<p style='color: red;'>Line: " . $e->getLine() . "</p>";
    
    echo "<h2>Troubleshooting Steps:</h2>";
    echo "<ol>";
    echo "<li>Check that your database credentials are correct in <code>config/database.php</code></li>";
    echo "<li>Ensure your MySQL database is running</li>";
    echo "<li>Verify that the database tables exist (run the SQL schema)</li>";
    echo "<li>Check file permissions for the classes directory</li>";
    echo "</ol>";
}
?>

<style>
    body { font-family: Arial, sans-serif; margin: 2rem; }
    h1, h2 { color: #333; }
    p { margin: 0.5rem 0; }
    ul, ol { margin: 1rem 0; padding-left: 2rem; }
    code { background: #f5f5f5; padding: 2px 4px; border-radius: 3px; }
</style>