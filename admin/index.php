<?php
session_start();

// Check if user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html"); // Redirect to login.html in htdocs/php/
    exit();
}

include('../connection.php'); // Include your database connection file here
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css"> <!-- Adjust path to admin.css -->
    <script src="admin.js" defer></script> <!-- Adjust path to admin.js -->
</head>

<body>
    <header>
        <a href="index.php" class="logo"><h1>F4</h1></a> <!-- Update to index.php -->
        <nav>
            <ul>
                <li><a href="approval.php">Approval</a></li> 
                <li><a href="responses.php">Responses</a></li> 
                <li><a href="tables.php">Tables</a></li> 
            </ul>
        </nav>
        <div class="logout">
            <a href="../logout.php">Log out</a> 
        </div>
    </header>

    <main id="main-content">
        <section id="welcome" class="visible">
            <?php
            // Display welcome message with admin's name
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                // Fetch admin's name from database based on username
                $sql = "SELECT Name FROM admin WHERE AUsername = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $adminName = $row['Name'];
                    echo "<h2>Welcome, $adminName, to the Admin Page!</h2>";
                } else {
                    echo "<h2>Welcome to the Admin Page!</h2>"; // Default message if name not found
                }

                $stmt->close();
            }
            ?>
        </section>
        <section id="approval"></section>
        <section id="responses"></section>
        <section id="tables"></section>
    </main>
</body>

</html>
