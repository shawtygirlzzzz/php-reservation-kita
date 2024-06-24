<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}

include('../connection.php');

// Check if a filter status is set
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// SQL query to fetch responses based on the filter
$sql = "SELECT ContactID, Name, ContactNo, Email, Message, Status FROM contactus";
if ($filter == 'Pending') {
    $sql .= " WHERE Status = 'Pending'";
} elseif ($filter == 'Completed') {
    $sql .= " WHERE Status = 'Completed'";
}
$sql .= " ORDER BY ContactID DESC"; // Example ordering, adjust as needed

$result = $conn->query($sql);

// Check if there are responses
if ($result->num_rows > 0) {
    $responses = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative array
} else {
    $responses = array(); // No responses
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Responses</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- jQuery CDN -->
</head>
<body>
    <header>
        <a href="index.php" class="logo"><h1>F4</h1></a>
        <nav>
            <ul>
                <li><a href="approval.php">Approval</a></li>
                <li class="active"><a href="responses.php">Responses</a></li>
                <li><a href="tables.php">Tables</a></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="../logout.php">Log out</a>
        </div>
    </header>

    <section id="responses">
        <h2 class="title">Responses from Contact Us Form</h2>
        <div class="filter-container">
            <label class ="statuslabel">Filter by Status:</label>
            <select id="filterStatus">
                <option value="">All</option>
                <option value="Pending" <?php echo ($filter == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="Completed" <?php echo ($filter == 'Completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
        </div>
        <table id="responses-table">
            <thead>
                <tr>
                    <th>ContactID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Function to fetch responses from database and display in table
                function displayResponses($conn) {
                    global $sql; // Access the SQL query defined earlier
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ContactID']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ContactNo']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Message']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
                            echo "<td>";
                            echo '<form action="edit_response.php" method="get">';
                            echo '<input type="hidden" name="contactID" value="' . $row['ContactID'] . '">';
                            echo '<button type="submit" class="button" title="Edit Record" data-toggle="tooltip">Update Status</button>';
                            echo '</form>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No responses found</td></tr>";
                    }
                }

                displayResponses($conn); // Call function to display responses
                ?>
            </tbody>
        </table>
    </section>

    <script>
        // jQuery function to handle filter change
        $(document).ready(function() {
            $('#filterStatus').change(function() {
                var selectedStatus = $(this).val();
                window.location.href = 'responses.php?filter=' + selectedStatus;
            });
        });
    </script>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
