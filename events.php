<?php
include 'db.php';

// Create an event using prepared statements (to prevent SQL injection)
function createEvent($title, $description, $date, $time, $venue, $type) {
    global $conn;
    $sql = "INSERT INTO events (name, description, date, time, venue, type) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssssss", $title, $description, $date, $time, $venue, $type);
        return $stmt->execute();
    } else {
        // Return false if the statement couldn't be prepared
        return false;
    }
}

// Get all events
function getEvents() {
    global $conn;
    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    return $events;
}
?>
