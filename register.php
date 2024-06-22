<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $servicetype = $_POST['servicetype'];

    
    if ($servicetype == "tailor") {
        $storename = $_POST['storename'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $qualificationproof = "";
        $qualificationdescription = $_POST['qualificationdescription'];

        $sql = "INSERT INTO tailor (TUsername, Name, Address, Email, Password, Phone, QualifyDes, StoreName, StartTime, EndTime, Status)
                VALUES ('$username', '$name', '$address', '$email', '$password', '$phonenumber', '$qualificationdescription', '$storename', '$starttime', '$endtime', 'Processing')";
    } else {
        $sql = "INSERT INTO customer (CUsername, Name, Address, Email, Password, Phone)
                VALUES ('$username', '$name', '$address', '$email', '$password', '$phonenumber')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: storeSearching.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
