<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection and functions
include 'db.php';  // Include your database connection
include 'event_functions.php';  // Include the function to create an event

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $type = $_POST['type'];
    $organizer_id = 1;  // For now, hardcode the organizer ID or get it from session if available

    // Debugging: Display the data
    echo "Title: $title, Description: $description, Date: $date, Time: $time, Venue: $venue, Type: $type, Organizer ID: $organizer_id<br>";

    // Call the createEvent function
    if (createEvent($title, $description, $date, $time, $venue, $type, $organizer_id)) {
        echo "Event created successfully!";
    } else {
        echo "Failed to create event.";
    }
}
?>
