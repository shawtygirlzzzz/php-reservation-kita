<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $rating = intval($_POST['rating']);
    $review = htmlspecialchars($_POST['review']);

    $newReview = [
        'name' => $name,
        'rating' => $rating,
        'review' => $review,
        'profilePic' => 'Image/profilePicture.png',
    ];

    if (!isset($_SESSION['reviews'])) {
        $_SESSION['reviews'] = [];
    }

    array_unshift($_SESSION['reviews'], $newReview);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fairytale Tailor Shop Reviews</title>
<link rel="stylesheet" href="review.css">
</head>

<body>
<script>
window.onload = function() {
  document.querySelector('.write-review-btn').addEventListener('click', function() {
    document.querySelector('#popup-window').style.display = 'block';
  });

  document.querySelector('.close-btn').addEventListener('click', function() {
    document.querySelector('#popup-window').style.display = 'none';
  });
}
</script>

<header class="main-header">
    <div class="logo">
      <a href="tailorProfile.html" class="back-arrow" aria-label="Go back">&larr;</a>
        <h2><a href="index.html" class = "logo">F4</a></h2>
      </div>
      <div class="breadcrumbs">
        <a href="storeSearching.html" class="breadcrumb">&nbsp;&nbsp;Stores</a>
        <span class="breadcrumb-separator">|</span>
        <a href="tailorProfile.html" class="breadcrumb">Fairytale Tailor Shop</a>
        <span class="breadcrumb-separator">|</span>
        <a href="review.php" class="breadcrumb active">Review</a>
      </div>
      <div class ="logo">
        <a href="customerProfile.html"><img src="Image/login.png" alt="User Logo"></a>
    </div>
</header>

<header class = "shop-name-container">
  <h2><strong>Fairytale Tailor Shop</strong></h2>
</header>

<main class = "container">
  <section class="review-summary">
    <div class = "summary-container">
      <div class="average-rating">
          <h2><bold>Reviews</bold></h2>
          <span class="rating-value">4.1</span>
          <span class="rating-stars">★★★★☆</span>
          <span class="total-reviews">326 reviews</span>
          <button class="write-review-btn">Write A Review</button>
      </div>
    </div>
    <div class="rating-distribution">
      <!-- Rating distribution bars go here -->
    </div>
  </section>

  <section class="individual-reviews">
    <?php if (isset($_SESSION['reviews'])): ?>
      <?php foreach ($_SESSION['reviews'] as $review): ?>
        <article class="review">
          <header class="review-header">
            <img src="<?= $review['profilePic'] ?>" alt="Profile Picture" class="reviewer-pic">
            <span class="reviewer-name"><?= htmlspecialchars($review['name']) ?></span>
            <span class="review-rating"><?= str_repeat('★', $review['rating']) ?></span>
          </header>
          <p class="review-text">
            <?= htmlspecialchars($review['review']) ?>
          </p>
        </article>
      <?php endforeach; ?>
    <?php endif; ?>
  </section>

  <div id="popup-window" class="popup-window">
    <div class="popup-content">
      <form id="review-form" method="POST" action="review.php">
        <h2>Add a Review</h2>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="rating">Rating:</label><br>
        <select id="rating" name="rating" required>
          <option value="1">★</option>
          <option value="2">★★</option>
          <option value="3">★★★</option>
          <option value="4">★★★★</option>
          <option value="5">★★★★★</option>
        </select><br>
        <label for="review">Review:</label><br>
        <textarea id="review" name="review" rows="4" cols="50" required></textarea><br>
        <button type="submit" value="Submit">Submit</button>
        <button type="button" class="close-btn">Close</button>
      </form>
    </div>
  </div>
</main>
</body>
</html>
