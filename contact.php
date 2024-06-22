<?php
include("connection.php");

function generateNextContactID($conn) {
    $query = "SELECT MAX(contactID) AS max_id FROM contactus";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maxID = $row['max_id'];
        
        $numericPart = (int) substr($maxID, 1);
        $newNumericPart = $numericPart + 1;
        
        $newContactID = 'C' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
        
        return $newContactID;
    } else {
        return 'C001';
    }
}

$name = $_POST['name'];
$contactno = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];
$status = "In Progress";

$contactID = generateNextContactID($conn);

$sql = "INSERT INTO contactus (contactID, Name, ContactNo, Email, Message, Status)
        VALUES ('$contactID', '$name', '$contactno', '$email', '$message', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: contact.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
