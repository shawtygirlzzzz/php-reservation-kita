<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fairytale Tailor Shop</title>
  <link rel="stylesheet" href="tailorProfile.css">
</head>
<body>
  <div class="navigation">
    <a href="storeSearching.html" class="back-arrow" aria-label="Go back">&larr;</a>
    <span class="logo">F4</span>
    <div class="breadcrumbs">
      <a href="storeSearching.html" class="breadcrumb">&nbsp;&nbsp;Home</a>
      <span class="breadcrumb-separator">|</span>
      <a href="tailorProfile.html" class="breadcrumb active">Fairytale Tailor Shop |</a>
    </div>
    <a href="customerProfile.html"><img src="image/login.png" style="height:25px; width:25px; margin-left:10px;"></a>
  </div>
  <div class="content" style="color: white;">
    <div class="shop-info">
      <h1>FAIRYTALE TAILOR SHOP</h1>
      <div class="user-controls">
        <a href="https://wa.me/qr/DMJ2DG5J7LDUF1" target="_blank">
          <button style="float: right;" class="buttoncht">Chat</button>
        </a>
      </div>
      <?php
      include('connection.php');
      $sql = "SELECT Address, Ratings, Ranking FROM tailor WHERE TUsername = 1";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $address = $row['Address'];
        $ratings = $row['Ratings'];
        $ranking = $row['Ranking'];
      } else {
        $address = 'Not available';
        $ratings = 'Not available';
        $ranking = 'Not available';
      }
      ?>
      <p><strong>Address:</strong> <?php echo $address; ?></p>
      <p><strong>Ratings:</strong> <?php echo $ratings; ?> <img src="image/star.png" style="height:15px; width:15px;"></p>
      <p><strong>Ranking:</strong> <?php echo $ranking; ?></p>
    </div>
  </div>
  <article class="content1">
    <aside style="background-color: #EAA5A5;" class="reviews">
      <h2>Reviews</h2>
      <a href="#"><img src="image/48712595-9062-4AEB-A2B0-FADBC113EF91.jpeg" style="height:100px; width:100px;" alt="Review photo"></a>
      <a href="#"><img src="image/BF32CB39-1014-4698-BFBF-0A519E909114.jpeg" style="height:100px; width:100px;" alt="Review photo"><br></a>
      <a href="review.html" style="text-decoration: none;">
        <button style="margin-bottom: 10px;" class="button-seemore"> See More +</button>
      </a>
    </aside>
    <div class="services-provided">
      <h2 style="font-style: italic; font-weight: 900;font-size: xx-large;">What Services Are We Providing?</h2>
      <ul style="font-size: larger;">
        <li>Women's Custom Made Tailoring</li>
        <li>Men's Custom Made Tailoring</li>
        <li>Repairs/Alteration</li>
      </ul>
    </div>
    <a href="reservationtailor.html" style="text-decoration: none;">
      <button class="book-now">BOOK NOW</button>
    </a>
  </article>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
