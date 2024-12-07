<?php
// Enable CORS for all domains (or specify your React app's domain instead of *)
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Include database connection or other necessary code here
include 'db.php'; // Example, adjust as necessary

// The rest of your PHP code goes below
$email = $_POST['email'];
$password = $_POST['password'];

// Your login logic here
$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User found, return success message
    echo json_encode(['success' => true, 'message' => 'Login successful']);
} else {
    // Invalid credentials
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}
?>
