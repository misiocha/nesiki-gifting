<?php
// Database connection parameters
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_database_name";

// Get the email from the form submission
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

// Array to store response
$response = array(
    'success' => false,
    'message' => ''
);

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = 'Invalid email format';
    echo json_encode($response);
    exit;
}

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if email already exists in database
    $stmt = $conn->prepare("SELECT email FROM newsletter_subscribers WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $response['message'] = 'This email is already subscribed!';
    } else {
        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email, subscribe_date) VALUES (:email, NOW())");
        $stmt->bindParam(':email', $email);
        
        // Execute query
        $stmt->execute();
        
        $response['success'] = true;
        $response['message'] = 'Thank you for subscribing!';
    }
} catch(PDOException $e) {
    $response['message'] = 'Error: ' . $e->getMessage();
} finally {
    // Close connection
    $conn = null;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>