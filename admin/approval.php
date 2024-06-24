<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html"); // Redirect to login.html in htdocs/php/
    exit();
}

// Include database connection file
include('../connection.php');

// Query to fetch pending approvals from tailor table
$sql = "SELECT * FROM tailor WHERE Status = 'Pending'";
$result = $conn->query($sql);

// Check if there are pending approvals
if ($result->num_rows > 0) {
    // Data exists, fetch and display in table
} else {
    // No pending approvals message or handle accordingly
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Approval</title>
    <link rel="stylesheet" href="admin.css"> <!-- Adjust path to admin.css -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- jQuery CDN -->
    <script src="../admin.js" defer></script> <!-- Adjust path to admin.js -->
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <header>
        <a href="index.php" class="logo"><h1>F4</h1></a> <!-- Adjusted to index.php -->
        <nav>
            <ul>
                <li class="active"><a href="approval.php">Approval</a></li> <!-- Set as active -->
                <li><a href="responses.php">Responses</a></li>
                <li><a href="tables.php">Tables</a></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="../logout.php">Log out</a> <!-- Adjust path to logout.php -->
        </div>
    </header>

    <div id="approval">
        <h2 class="title">Pending Approvals</h2>
        <table>
            <thead>
                <tr>
                    <th>Tailor Username</th>
                    <th>Tailor Name</th>
                    <th>Address</th>
                    <th>Location</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Name of Store</th>
                    <th>Operating Hours (Start)</th>
                    <th>Operating Hours (End)</th>
                    <th>Proof of Qualifications</th>
                    <th>Description of Proof of Qualifications</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each pending approval row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['TUsername'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>" . $row['Location'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['Phone'] . "</td>";
                    echo "<td>" . $row['StoreName'] . "</td>";
                    echo "<td>" . $row['StartTime'] . "</td>";
                    echo "<td>" . $row['EndTime'] . "</td>";
                    echo "<td><a href='" . $row['QualifyFile'] . "' class='button'>Download</a></td>";
                    echo "<td>" . $row['QualifyDes'] . "</td>";
                    echo "<td>";
                    echo "<select class='status-dropdown' data-tusername='" . $row['TUsername'] . "'>";
                    echo "<option value=''>Update Status</option>";
                    echo "<option value='Accept'>Accept</option>";
                    echo "<option value='Reject'>Reject</option>";
                    echo "</select>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // Update tailor status via AJAX when dropdown changes
            $(".status-dropdown").change(function() {
                var tUsername = $(this).data("tusername");
                var status = $(this).val();
                updateStatus(tUsername, status);
            });

            // Function to update tailor status via AJAX
            function updateStatus(tUsername, status) {
                $.ajax({
                    type: "POST",
                    url: "update_status.php",
                    data: { tUsername: tUsername, status: status },
                    success: function(response) {
                        // Handle success response
                        alert(response); // Display success message or handle UI update
                        location.reload(); // Refresh page after update
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        alert("Error: " + xhr.status + ": " + xhr.statusText);
                    }
                });
            }
        });
    </script>
</body>

</html>

<?php
// Close database connection
$conn->close();
?>
