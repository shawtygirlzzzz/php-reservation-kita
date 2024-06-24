<?php
// Include connection file
require_once '../connection.php';

// Check if contactID is provided
if(isset($_GET['contactID'])) {
    $contactID = $_GET['contactID'];

    // Fetch the response details
    $sql = "SELECT * FROM ContactUs WHERE ContactID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $contactID); // Use 's' for string as ContactID is VARCHAR
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Display form for editing
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Edit Response</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="admin.css">
        </head>
        <body>
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mt-5">Edit Response</h2>
                            <form action="update_response_status.php" method="POST">
                                <div class="form-group">
                                    <label>Status:</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending" <?php echo ($row['Status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Completed" <?php echo ($row['Status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                    </select>
                                </div>
                                <input type="hidden" name="contactID" value="<?php echo $row['ContactID']; ?>">
                                <input type="submit" class="button" value="Update">
                                <a href="responses.php" class="button">Cancel</a>
                            </form>
                        </div>
                    </div>        
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo 'Response not found.';
    }

    $stmt->close();
} else {
    echo 'Contact ID not provided.';
}

// Close connection
$conn->close();
?>
