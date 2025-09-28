<?php
/**
 * Database Configuration and Connection Handler
 * Handles MySQL database connections with proper error handling
 */

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct() {
        // Database configuration - Update these values for your hosting environment
        $this->host = 'localhost';
        $this->db_name = 'portfolio_db';
        $this->username = 'root';
        $this->password = '';
    }

    /**
     * Get database connection
     * @return PDO|null Database connection or null on failure
     */
    public function getConnection() {
        $this->conn = null;
        
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $this->conn = new PDO(
                $dsn,
                $this->username,
                $this->password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                )
            );
        } catch(PDOException $exception) {
            error_log("Database connection error: " . $exception->getMessage());
            return null;
        }
        
        return $this->conn;
    }

    /**
     * Test database connection
     * @return bool True if connection successful
     */
    public function testConnection() {
        $conn = $this->getConnection();
        return $conn !== null;
    }
}

// Global database instance
$database = new Database();
$db_connection = $database->getConnection();

if (!$db_connection) {
    die("Database connection failed. Please check your configuration.");
}
?>