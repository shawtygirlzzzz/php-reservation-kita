<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Form</title>
<link rel="stylesheet" href="reservation.css">
</head>
<body>
<div class="header">
    <h1><a href="tailorProfile.php" class="back-arrow" aria-label="Go back">&larr;</a>F4</h1>
    <nav>
        <ul>
            <li><a href="storeSearching.php">Stores</a></li>
            <li><a href="contact.php">Contact Us</a></li>
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
</div>
<div class="container">
  <h2><center>Book Now!</h2></center>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = htmlspecialchars($_POST['name']);
      $contact = htmlspecialchars($_POST['contact']);
      $date = htmlspecialchars($_POST['date']);
      $time = htmlspecialchars($_POST['time']);
      $address = htmlspecialchars($_POST['address']);
      $service = htmlspecialchars($_POST['service']);
      $method = htmlspecialchars($_POST['method']);
      $instruction = htmlspecialchars($_POST['instruction']);

      // Here you can handle the form data, e.g., save it to a database or send an email
      // For demonstration, we'll just display the data
      echo "<h3>Reservation Details:</h3>";
      echo "Name: $name<br>";
      echo "Contact Number: $contact<br>";
      echo "Preferred Date: $date<br>";
      echo "Preferred Time: $time<br>";
      echo "Address: $address<br>";
      echo "Service Required: $service<br>";
      echo "Method: $method<br>";
      echo "Special Instruction: $instruction<br>";
  }
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-group">
      <label for="name">Name<span style="color: red;">*</span></label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="contact">Contact Number<span style="color: red;">*</span></label>
      <input type="tel" id="contact" name="contact" required>
    </div>
    <div class="form-group">
      <label for="date">Preferred Date<span style="color: red;">*</span></label>
      <input type="date" id="date" name="date" required>
    </div>
    <div class="form-group">
      <label for="time">Preferred Time<span style="color: red;">*</span></label>
      <input type="time" id="time" name="time" required>
    </div>
    <div class="form-group">
      <label for="address">Address<span style="color: red;">*</span></label>
      <input type="text" id="address" name="address" required>
    </div>
    <div class="input-group">
        <label for="service">Service Required<span style="color: red;">*</span></label>
        <select id="service" name="service" required>
            <option value="">Select a service</option>
            <option value="women">Women's custom made tailoring</option>
            <option value="men">Men's custom made tailoring</option>
            <option value="repairs">Repairs/Alterations</option>
        </select>
    </div>
    <div class="input-group">
      <fieldset>
          <legend>Method</legend>
          <label><input type="radio" name="method" value="walk-in" required> Walk in</label>
          <label><input type="radio" name="method" value="doorstep" required> Doorstep</label>
      </fieldset>
  </div>

    <div class="form-group">
      <label for="instruction">Special Instruction</label>
      <textarea id="instruction" name="instruction"></textarea>
    </div>
    <input type="submit" value="Confirm Reservation" class="button">
  </form>
</div>
</body>
</html>
