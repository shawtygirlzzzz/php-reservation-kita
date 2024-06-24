<?php
session_start();

// Redirect to login page if session variable is not set
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}

include('../connection.php');

// Function to retrieve data from the Admin table
function getAdminData($conn) {
    $sql = "SELECT * FROM Admin";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['AUsername'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>";
            echo '<form action="adminTable/updateAdmin.php" method="get">';
            echo '<input type="hidden" name="username" value="' . $row['AUsername'] . '">';
            echo '<button type="submit" class= "button"title="Edit Record" data-toggle="tooltip">Edit</button>';
            echo '</form>';

            echo '<form action="adminTable/deleteAdmin.php" method="post">';
            echo '<input type="hidden" name="username" value="' . $row['AUsername'] . '">';
            echo '<button type="submit" class= "button" title="Delete Record" data-toggle="tooltip">Delete</button>';
            echo '</form>';
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data found</td></tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="admin.css">
  <script src="admin.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <a href="index.php" class="logo"><h1>F4</h1></a>
        <nav>
          <ul>
            <li><a href="approval.php">Approval</a></li>
            <li><a href="responses.php">Responses</a></li>
            <li class="active"><a href="tables.php">Tables</a></li>
          </ul>
        </nav>
        <div class="logout">
          <a href="../logout.php">Log out</a>
        </div>
      </header>

<section id="tables">
    <h2 class="title">Admin Table</h2>
    <form action="adminTable/addAdmin.php">
        <button class="button" id="addButton">Add</button>
    </form>
    <table id="adminTable">
        <thead>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php getAdminData($conn); ?>
        </tbody>
    </table>
</section>

<script>
function addRow(addUrl) {
    window.location.href = addUrl;
}
</script>
</body>
</html>
