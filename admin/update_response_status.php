<?php
// Include connection file
require_once '../connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $status = $_POST['status'];
    $contactID = $_POST['contactID'];

    // Prepare update statement
    $sql = "UPDATE ContactUs SET Status=? WHERE ContactID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $status, $contactID);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to responses.php after successful update
        header("Location: responses.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
