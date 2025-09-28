<?php
/**
 * Portfolio Manager Class
 * Handles all portfolio-related database operations
 */

require_once __DIR__ . '/../config/database.php';

class PortfolioManager {
    private $conn;
    
    public function __construct() {
        global $db_connection;
        $this->conn = $db_connection;
        
        if (!$this->conn) {
            throw new Exception("Database connection not available");
        }
    }
    
    /**
     * Get all published portfolio projects
     * @param array $filters Optional filters (category, featured, limit)
     * @return array Array of portfolio projects
     */
    public function getAllProjects($filters = []) {
        try {
            $where_conditions = ['p.is_published = 1'];
            $params = [];
            
            // Add category filter
            if (!empty($filters['category']) && $filters['category'] !== 'All') {
                $where_conditions[] = 'p.category = :category';
                $params[':category'] = $filters['category'];
            }
            
            // Add featured filter
            if (!empty($filters['featured'])) {
                $where_conditions[] = 'p.is_featured = 1';
            }
            
            $where_clause = implode(' AND ', $where_conditions);
            
            // Build query with LEFT JOIN for featured image
            $query = "SELECT p.*, 
                            m.file_path as featured_image_path, 
                            m.alt_text as featured_image_alt,
                            m.original_name as featured_image_name
                     FROM portfolio_projects p 
                     LEFT JOIN media m ON p.featured_image = m.id 
                     WHERE {$where_clause}
                     ORDER BY p.is_featured DESC, p.sort_order ASC, p.created_at DESC";
            
            // Add limit if specified
            if (!empty($filters['limit'])) {
                $query .= " LIMIT :limit";
                $params[':limit'] = (int)$filters['limit'];
            }
            
            $stmt = $this->conn->prepare($query);
            
            // Bind parameters
            foreach ($params as $key => $value) {
                if ($key === ':limit') {
                    $stmt->bindValue($key, $value, PDO::PARAM_INT);
                } else {
                    $stmt->bindValue($key, $value, PDO::PARAM_STR);
                }
            }
            
            $stmt->execute();
            $projects = $stmt->fetchAll();
            
            // Process each project
            foreach ($projects as &$project) {
                // Decode JSON fields safely
                $project['tags'] = $this->decodeJsonField($project['tags']);
                $project['technologies_used'] = $this->decodeJsonField($project['technologies_used']);
                
                // Get project images
                $project['images'] = $this->getProjectImages($project['id']);
                
                // Set default image if no featured image
                if (empty($project['featured_image_path'])) {
                    $project['featured_image_path'] = '/api/placeholder/600/400';
                    $project['featured_image_alt'] = $project['title'] . ' - Portfolio Project';
                }
            }
            
            return $projects;
            
        } catch (Exception $e) {
            error_log("Error fetching portfolio projects: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Get project by slug
     * @param string $slug Project slug
     * @return array|null Project data or null if not found
     */
    public function getProjectBySlug($slug) {
        try {
            $query = "SELECT p.*, 
                            m.file_path as featured_image_path, 
                            m.alt_text as featured_image_alt,
                            m.original_name as featured_image_name
                     FROM portfolio_projects p 
                     LEFT JOIN media m ON p.featured_image = m.id 
                     WHERE p.slug = :slug AND p.is_published = 1";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
            $stmt->execute();
            
            $project = $stmt->fetch();
            
            if ($project) {
                $project['tags'] = $this->decodeJsonField($project['tags']);
                $project['technologies_used'] = $this->decodeJsonField($project['technologies_used']);
                $project['images'] = $this->getProjectImages($project['id']);
                
                if (empty($project['featured_image_path'])) {
                    $project['featured_image_path'] = '/api/placeholder/600/400';
                    $project['featured_image_alt'] = $project['title'] . ' - Portfolio Project';
                }
            }
            
            return $project;
            
        } catch (Exception $e) {
            error_log("Error fetching project by slug: " . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Get project images
     * @param int $project_id Project ID
     * @return array Array of project images
     */
    public function getProjectImages($project_id) {
        try {
            $query = "SELECT pi.*, 
                            m.file_path, 
                            m.alt_text, 
                            m.original_name
                     FROM portfolio_images pi
                     JOIN media m ON pi.media_id = m.id
                     WHERE pi.project_id = :project_id
                     ORDER BY pi.sort_order ASC";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':project_id', $project_id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();
            
        } catch (Exception $e) {
            error_log("Error fetching project images: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Get unique categories
     * @return array Array of categories
     */
    public function getCategories() {
        try {
            $query = "SELECT DISTINCT category 
                     FROM portfolio_projects 
                     WHERE category IS NOT NULL 
                     AND category != '' 
                     AND is_published = 1 
                     ORDER BY category";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            
            $categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
            
            // Add "All" as first option
            array_unshift($categories, 'All');
            
            return $categories;
            
        } catch (Exception $e) {
            error_log("Error fetching categories: " . $e->getMessage());
            return ['All'];
        }
    }
    
    /**
     * Get featured projects
     * @param int $limit Number of projects to return
     * @return array Array of featured projects
     */
    public function getFeaturedProjects($limit = 6) {
        return $this->getAllProjects([
            'featured' => true,
            'limit' => $limit
        ]);
    }
    
    /**
     * Safely decode JSON field
     * @param string $json_string JSON string to decode
     * @return array Decoded array or empty array on failure
     */
    private function decodeJsonField($json_string) {
        if (empty($json_string)) {
            return [];
        }
        
        $decoded = json_decode($json_string, true);
        return is_array($decoded) ? $decoded : [];
    }
    
    /**
     * Get portfolio statistics
     * @return array Statistics array
     */
    public function getStats() {
        try {
            $stats = [];
            
            // Total projects
            $query = "SELECT COUNT(*) as total FROM portfolio_projects WHERE is_published = 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stats['total_projects'] = $stmt->fetch()['total'];
            
            // Projects by category
            $query = "SELECT category, COUNT(*) as count 
                     FROM portfolio_projects 
                     WHERE is_published = 1 AND category IS NOT NULL 
                     GROUP BY category 
                     ORDER BY count DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stats['by_category'] = $stmt->fetchAll();
            
            // Featured projects count
            $query = "SELECT COUNT(*) as total FROM portfolio_projects WHERE is_published = 1 AND is_featured = 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stats['featured_projects'] = $stmt->fetch()['total'];
            
            return $stats;
            
        } catch (Exception $e) {
            error_log("Error fetching portfolio stats: " . $e->getMessage());
            return [
                'total_projects' => 0,
                'by_category' => [],
                'featured_projects' => 0
            ];
        }
    }
}
?>