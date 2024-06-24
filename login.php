<?php
session_start();

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs (you can add more validation if needed)
    if (empty($username) || empty($password)) {
        showAlertAndRedirect("Please fill all required fields", 'login.html');
        exit(); // Exit to prevent further execution
    }

    // Check if username exists in admin table
    $sql_admin = "SELECT * FROM admin WHERE AUsername = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows > 0) {
        // Admin username found, fetch the admin data
        $row = $result_admin->fetch_assoc();
        $plain_text_password = $row['Password']; // Fetch plain text password from database
        $name = $row['Name']; // Fetch name of the admin

        // Verify password for admin (plain text comparison)
        if ($password === $plain_text_password) {
            // Password is correct, proceed with login for admin
            $_SESSION['username'] = $row['AUsername']; // Store username in session
            showAlertAndRedirect("Welcome " . $name, 'admin/index.php');
            exit();
        } else {
            // Invalid password for admin
            showAlertAndRedirect("Invalid Password", 'login.html');
            exit(); // Exit to prevent further execution
        }
    }

    // Check if username exists in customer table
    $sql_customer = "SELECT * FROM customer WHERE CUsername = ?";
    $stmt_customer = $conn->prepare($sql_customer);
    $stmt_customer->bind_param("s", $username);
    $stmt_customer->execute();
    $result_customer = $stmt_customer->get_result();

    // Check if username exists in tailor table
    $sql_tailor = "SELECT * FROM tailor WHERE TUsername = ?";
    $stmt_tailor = $conn->prepare($sql_tailor);
    $stmt_tailor->bind_param("s", $username);
    $stmt_tailor->execute();
    $result_tailor = $stmt_tailor->get_result();

    // Check if username exists in customer table
    if ($result_customer->num_rows > 0) {
        $row = $result_customer->fetch_assoc();
        $hashed_password = $row['Password']; // Fetch hashed password from database
        $name = $row['Name']; // Fetch name of the user

        // Verify password for customer
        if (password_verify($password, $hashed_password)) {
            // Password is correct, proceed with login for customer
            $_SESSION['username'] = $row['CUsername']; // Store username in session
            showAlertAndRedirect("Welcome " . $name, 'storeSearching.php');
            exit();
        } else {
            // Invalid password for customer
            showAlertAndRedirect("Invalid Password", 'login.html');
            exit(); // Exit to prevent further execution
        }
    }

    // Check if username exists in tailor table
    if ($result_tailor->num_rows > 0) {
        $row = $result_tailor->fetch_assoc();
        $hashed_password = $row['Password']; // Fetch hashed password from database
        $name = $row['Name']; // Fetch name of the tailor

        // Verify password for tailor
        if (password_verify($password, $hashed_password)) {
            // Password is correct, proceed with login for tailor
            $_SESSION['username'] = $row['TUsername']; // Store username in session
            showAlertAndRedirect("Welcome " . $name, 'tailorProfile.php');
            exit();
        } else {
            // Invalid password for tailor
            showAlertAndRedirect("Invalid Password", 'login.html');
            exit(); // Exit to prevent further execution
        }
    }

    // If username does not exist in any of the tables (admin, customer, or tailor)
    showAlertAndRedirect("Invalid Username", 'login.html');
    exit(); // Exit to prevent further execution

    // Close statements and connection
    $stmt_admin->close();
    $stmt_customer->close();
    $stmt_tailor->close();
    $conn->close();
}

// Function to show an alert message and redirect
function showAlertAndRedirect($message, $url = null) {
    echo "<script type='text/javascript'>
            alert('$message');";
    if ($url) {
        echo "window.location.href='$url';";
    }
    echo "</script>";
}
?>
