<!DOCTYPE html>
<html>
<head>
    <title>Contact Us!</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
    <link rel="stylesheet" type="text/css" href="general.css">
    
</head>
<body>
    <header>
        <h1>F4</h1>
        <nav>
            <ul>
                <li style="color: red;"><a href="storeSearching.php">Stores</a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="contact.php" style="color: red;">Contact Us</a></li>
            </ul>
        </nav>
        <div class="contact">
            <a href="https://wa.me/qr/DMJ2DG5J7LDUF1">
                <img src="image/whatsapp.png" alt="WhatsApp" style="height:20px; width:20px; margin-right:5px;">
                +60103344971
            </a>
            <a href="login.php">
                <img src="image/loginaccount.png" alt="Login" style="height:20px; width:20px; margin-left:5px;">
            </a>
        </div>
    </header>

    <nav class="bold card center" style="font-size: x-large; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        Reservation Kita Store
    </nav>

    <nav class="bold card center" style="font-size: x-large; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <p>Whatsapp or Call Us at +6011-12345678</p>
        <p>Visit Us at Tailor Kita Store</p>
        <p>Address: Jalan Hang Tuah Jaya, 76100 Durian Tunggal, Melaka</p>
    </nav>

    <h2 class="center" style="font-weight:900;font-size: xx-large;">Contact Us</h2>

    <div class="card">
        <form id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="fname">Name</label><label style="color: red;">*</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

            <label for="Phone">Contact Number</label><label style="color: red;">*</label>
            <input type="tel" id="Phone" name="Phone" placeholder="01x-xxxxxxxx" size="14" required>
            
            <label for="email">Email</label><label style="color: red;">*</label>
            <input type="email" id="email" name="email" placeholder="abc@example.com" autocomplete="on" size="30" pattern="[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$" required>

            <label for="message">Message</label><label style="color: red;">*</label>
            <textarea id="message" name="message" placeholder="Type your Message here." style="height:200px" required></textarea>
            <h5 style="color: red;">*this is required to fill</h5>

            <input onclick="myFunction()" type="submit" value="Submit">
        </form>
    </div>

    <script>
        function myFunction() {
            var form = document.getElementById("myForm");
            if (form.checkValidity()) {
                alert("Thank you! We will notify you later.");
            } else {
                alert("Please fill out all required fields before submitting!");
                return false;
            }
        }
    </script>

</body>
<footer>
    <h6 class="left" style="font-family:Arial, Helvetica, sans-serif">Copyright 2024 | F4</h6>
</footer>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['firstname']);
    $phone = htmlspecialchars($_POST['Phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Here you can add code to store the form data into a database or send it via email
    // For example, using PHP mail() function to send an email:
    // $to = "your-email@example.com";
    // $subject = "New Contact Us Message";
    // $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";
    // mail($to, $subject, $body);

    echo "<script>alert('Thank you! We will notify you later.');</script>";
}
?>
</html>
