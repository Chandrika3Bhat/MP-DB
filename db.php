<?php
$host = "localhost";
$user = "root";  // Use your MySQL username
$password = "@Chandu3Bhat";  // Use your MySQL password
$dbname = "college_event_db";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
