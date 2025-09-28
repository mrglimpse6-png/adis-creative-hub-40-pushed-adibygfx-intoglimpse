<?php
/**
 * Forms API Endpoint
 * Handles form submissions and lead management
 */

// Get request method
$method = $_SERVER['REQUEST_METHOD'];

// Include required files
require_once __DIR__ . '/../../config/database.php';

// Handle form submission
if ($method === 'POST') {
    try {
        // Get form data
        $form_type = $_POST['form_type'] ?? 'contact';
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $company = $_POST['company'] ?? '';
        $message = $_POST['message'] ?? '';
        $service = $_POST['service'] ?? '';
        $budget = $_POST['budget'] ?? '';
        $timeline = $_POST['timeline'] ?? '';
        
        // Validate required fields
        if (empty($email)) {
            throw new Exception('Email is required');
        }
        
        if ($form_type === 'contact' && empty($name)) {
            throw new Exception('Name is required for contact form');
        }
        
        // Prepare form data for storage
        $form_data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'company' => $company,
            'message' => $message,
            'service' => $service,
            'budget' => $budget,
            'timeline' => $timeline
        ];
        
        // Insert into database
        global $db_connection;
        $query = "INSERT INTO form_submissions 
                 (form_type, name, email, phone, company, message, form_data, ip_address, user_agent, referrer) 
                 VALUES 
                 (:form_type, :name, :email, :phone, :company, :message, :form_data, :ip_address, :user_agent, :referrer)";
        
        $stmt = $db_connection->prepare($query);
        $stmt->execute([
            ':form_type' => $form_type,
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':company' => $company,
            ':message' => $message,
            ':form_data' => json_encode($form_data),
            ':ip_address' => $_SERVER['REMOTE_ADDR'] ?? '',
            ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
            ':referrer' => $_SERVER['HTTP_REFERER'] ?? ''
        ]);
        
        $submission_id = $db_connection->lastInsertId();
        
        // Handle newsletter subscription
        if ($form_type === 'newsletter' && !empty($email)) {
            $newsletter_query = "INSERT INTO newsletter_subscribers (email, name, source) 
                               VALUES (:email, :name, 'website') 
                               ON DUPLICATE KEY UPDATE 
                               name = COALESCE(VALUES(name), name), 
                               status = 'active', 
                               subscribed_at = CURRENT_TIMESTAMP";
            
            $newsletter_stmt = $db_connection->prepare($newsletter_query);
            $newsletter_stmt->execute([
                ':email' => $email,
                ':name' => $name
            ]);
        }
        
        // Send notification email (in production, implement actual email sending)
        // For now, just log the submission
        error_log("New form submission: ID {$submission_id}, Type: {$form_type}, Email: {$email}");
        
        // Return success response
        echo json_encode([
            'success' => true,
            'message' => 'Form submitted successfully',
            'submission_id' => $submission_id
        ]);
        
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => 'Form submission failed',
            'message' => $e->getMessage()
        ]);
    }
    
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'error' => 'Method not allowed',
        'allowed_methods' => ['POST']
    ]);
}
?>