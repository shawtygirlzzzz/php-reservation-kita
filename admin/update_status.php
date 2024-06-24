<?php
include('../connection.php');

// Check if the request is a POST request and data is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tUsername']) && isset($_POST['status'])) {
    // Sanitize inputs to prevent SQL injection
    $tUsername = mysqli_real_escape_string($conn, $_POST['tUsername']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update query based on tUsername
    $sql = "UPDATE tailor SET Status = '$status' WHERE TUsername = '$tUsername'";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request"; // Handle cases where POST data is not set or invalid
}

// Close database connection
$conn->close();
?>
