// event_functions.php
<?php
function createEvent($title, $description, $date, $time, $venue, $type, $organizer_id) {
    global $conn;

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Debugging: Ensure variables are passed correctly
    echo "Title: $title, Description: $description, Date: $date, Time: $time, Venue: $venue, Type: $type, Organizer ID: $organizer_id<br>";

    // Prepare the SQL query to insert the event
    $sql = "INSERT INTO events (name, description, date, time, venue, type, organizer_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        echo 'Error preparing statement: ' . $conn->error;
        return false;
    }

    // Bind parameters
    $stmt->bind_param("ssssssi", $title, $description, $date, $time, $venue, $type, $organizer_id);

    // Execute the statement and check if it's successful
    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error executing query: " . $stmt->error;
        return false;
    }
}
?>
