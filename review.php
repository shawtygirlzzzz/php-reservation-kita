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

  document.querySelector('#review-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.querySelector('#name').value;
    const rating = document.querySelector('#rating').value;
    const review = document.querySelector('#review').value;

    const newReview = document.createElement('article');
    newReview.classList.add('review');

    const reviewHeader = document.createElement('header');
    reviewHeader.classList.add('review-header');

    const reviewerPic = document.createElement('img');
    reviewerPic.src = 'Image/profilePicture.png';
    reviewerPic.alt = 'Profile Picture';
    reviewerPic.classList.add('reviewer-pic');

    const reviewerName = document.createElement('span');
    reviewerName.classList.add('reviewer-name');
    reviewerName.textContent = name;

    const reviewRating = document.createElement('span');
    reviewRating.classList.add('review-rating');
    reviewRating.textContent = '★'.repeat(rating);

    reviewHeader.appendChild(reviewerPic);
    reviewHeader.appendChild(reviewerName);
    reviewHeader.appendChild(reviewRating);
    newReview.appendChild(reviewHeader);

    const reviewText = document.createElement('p');
    reviewText.classList.add('review-text');
    reviewText.textContent = review;
    newReview.appendChild(reviewText);

    const reviewImages = document.querySelectorAll('.image');
    reviewImages.forEach(image => {
      const newImage = image.cloneNode(true);
      newImage.classList.add('image');
      newReview.appendChild(newImage);
    });

    const individualReviews = document.querySelector('.individual-reviews');
    individualReviews.insertBefore(newReview, individualReviews.firstChild);

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
        <a href="review.html" class="breadcrumb active">Review</a>
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
      </di
    </div>
    <div class="rating-distribution">
      <!-- Rating distribution bars go here -->
    </div>
  </section>

  <section class="individual-reviews">
    <article class="review">
      <header class="review-header">
        <img src="Image/profilePicture.png" alt="Profile Picture" class="reviewer-pic">
        <span class="reviewer-name">ying_huai3</span>
        <span class="review-rating">★★★☆☆</span>
      </header>
        <p class="review-text">
        This pink baju kebaya is more than just a pretty outfit; 
        it's a testament to exceptional sewing technique.  
        From the moment you slip it on, you'll be impressed by the attention to detail and the flawless construction. 
        The most noticeable aspect of this kebaya's quality is the clean lines of the seams. 
        The stitches are incredibly precise, creating a smooth and polished look throughout the garment.  
        This kebaya drapes beautifully, following the curves of your body without clinging uncomfortably.  
        There's no puckering or unevenness, just a perfect silhouette that flatters your figure.. 
        5 stars for this tailor <33!!
        </p>
          <img src="Image/review1.jpeg" alt="Image" class="image">
          <img src="Image/review2.jpeg" alt="Image"class="image">
        </article>
      </section>

      <div id="popup-window" class="popup-window">
        <div class="popup-content">
          <form id="review-form">
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
          <button class="close-btn">Close</button>
        </form>
        </div>
      </div>
    </main>
  </body>
</html>