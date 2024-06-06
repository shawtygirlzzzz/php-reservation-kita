<?php
include('connection.php');

$username = $_POST['username'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$phonenumber = $_POST['phonenumber'];
$servicetype = $_POST['servicetype'];
$serviceprovided = isset($_POST['serviceprovided']) ? implode(", ", $_POST['serviceprovided']) : '';
$licensenumber = isset($_POST['licensenumber']) ? $_POST['licensenumber'] : '';
$storename = isset($_POST['storename']) ? $_POST['storename'] : '';
$starttime = isset($_POST['starttime']) ? $_POST['starttime'] : '';
$endtime = isset($_POST['endtime']) ? $_POST['endtime'] : '';

if ($servicetype === 'serviceprovider') 
{
    $sql_serviceprovider = "INSERT INTO serviceprovider (PUsername, Name, Address, Email, Password, Phone, TypeID, LicenseNo, StoreName, StartTime, EndTime)
    VALUES ('$username', '$name', '$address', '$email', '$password', '$phonenumber', '$serviceprovided', '$licensenumber', '$storename', '$starttime', '$endtime')";

    if ($conn->query($sql_serviceprovider) === TRUE) 
    {
        echo "<br>New record created successfully";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=index.php\">";
    } 
    
    else 
    {
        echo "Error: " . $sql_serviceprovider . "<br>" . $conn->error;
    }
} 

else if ($servicetype === 'customer') 
{
    $sql_customer = "INSERT INTO customer (CUsername, Name, Address, Email, Password, Phone)
    VALUES ('$username', '$name', '$address', '$email', '$password', '$phonenumber')";

    if ($conn->query($sql_customer) === TRUE) 
    {
        echo "<br>New record created successfully";
        echo "<meta http-equiv=\"refresh\" content=\"3;URL=index.php\">";
    } 
    else 
    {
        echo "Error: " . $sql_customer . "<br>" . $conn->error;
    }
}
$conn->close();
?>
