<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Plain-text password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $phonenumber = $_POST['phonenumber'];
    $servicetype = $_POST['servicetype'];

    // Function to show an alert message and redirect
    function showAlertAndRedirect($message, $url = null) {
        echo "<script type='text/javascript'>
                alert('$message');";
        if ($url) {
            echo "window.location.href='$url';";
        }
        echo "</script>";
    }

    // Check if the username already exists in the customer or tailor table
    $stmt = $conn->prepare('SELECT CUsername FROM customer WHERE CUsername = ? UNION SELECT TUsername FROM tailor WHERE TUsername = ?');
    $stmt->bind_param('ss', $username, $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        showAlertAndRedirect("Username is already used by another user, please enter a new username.", "register.html");
        exit();
    }
    $stmt->close();

    // Handle qualification proof upload only if the user selects "tailor"
    if ($servicetype == "tailor" && $_FILES['qualificationproof']['error'] == UPLOAD_ERR_OK && isset($_FILES['qualificationproof']['tmp_name'])) {
        $file_tmp_name = $_FILES['qualificationproof']['tmp_name'];
        $file_name = $_FILES['qualificationproof']['name'];
        $file_size = $_FILES['qualificationproof']['size'];
        $file_type = $_FILES['qualificationproof']['type'];

        // Check file size limit (adjust as per your requirements)
        $max_size = 10 * 1024 * 1024; // 10 MB (adjust as needed)
        if ($file_size > $max_size) {
            echo "Error: File size exceeds 10MB limit.";
            exit;
        }

        // Generate unique file name to prevent overwriting
        $file_name_parts = pathinfo($file_name);
        $file_extension = strtolower($file_name_parts['extension']);
        $new_file_name = uniqid("proof_", true) . '.' . $file_extension;
        $file_destination = 'uploads/' . $new_file_name;

        // Move uploaded file to destination
        if (!move_uploaded_file($file_tmp_name, $file_destination)) {
            echo "Error: Failed to move uploaded file.";
            exit;
        }
    } elseif ($servicetype == "tailor") {
        echo "Error: No file uploaded or upload error occurred.";
        exit;
    }

    // Insert data into appropriate table based on service type
    if ($servicetype == "tailor") {
        $storename = $_POST['storename'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $qualificationdescription = $_POST['qualificationdescription'];

        $sql = "INSERT INTO tailor (TUsername, Name, Address, Email, Password, Phone, QualifyDes, StoreName, StartTime, EndTime, QualifyFile, Status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Processing')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssssss', $username, $name, $address, $email, $hashed_password, $phonenumber, $qualificationdescription, $storename, $starttime, $endtime, $new_file_name);
    } else {
        $sql = "INSERT INTO customer (CUsername, Name, Address, Email, Password, Phone)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssss', $username, $name, $address, $email, $hashed_password, $phonenumber);
    }

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

$conn->close();
?>
