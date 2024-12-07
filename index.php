<?php
// index.php
if ($_SERVER['REQUEST_URI'] == '/api/events') {
    header('Content-Type: application/json');
    echo json_encode(["message" => "List of events"]);
} else {
    // Default route
    echo "Hello, World!";
}
