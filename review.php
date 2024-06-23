<?php
session_start(); // Start session to use session variables
include('connection.php');

// Initialize variables
$TUsername = '';
$storeName = '';
$ranking = 0;
$reviews = [];

// Check if TUsername is passed from storeSearching.php via GET
if (isset($_GET['TUsername'])) {
    $TUsername = $_GET['TUsername'];
    
    // Fetch tailor details including ranking
    $stmt = $conn->prepare("SELECT StoreName, ranking FROM tailor WHERE TUsername = ?");
    $stmt->bind_param("s", $TUsername);
    $stmt->execute();
    $stmt->bind_result($storeName, $ranking);
    
    // Fetch the first row (should be only one result if TUsername is unique)
    if ($stmt->fetch()) {
        // Fetch all reviews for the current TUsername
        $stmt_reviews = $conn->prepare("SELECT CUsername, Rating, Comment, Date FROM review WHERE TUsername = ?");
        $stmt_reviews->bind_param("s", $TUsername);
        $stmt_reviews->execute();
        $stmt_reviews->bind_result($dbCUsername, $dbRating, $dbComment, $dbDate);
        
        while ($stmt_reviews->fetch()) {
            $reviews[] = ['CUsername' => $dbCUsername, 'Rating' => $dbRating, 'Comment' => $dbComment, 'Date' => $dbDate];
        }
        $stmt_reviews->close();
    } else {
        // Handle case where no tailor found with provided TUsername
        $errorMessage = "No tailor found with the provided ID.";
    }
    
    $stmt->close();
} else {
    // Handle error or display message if TUsername is not provided
    $errorMessage = "Please select a tailor to view reviews.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($storeName) ? htmlspecialchars($storeName) . ' - Ranking: ' . number_format($ranking, 1) : 'Fairytale Tailor Shop Reviews'; ?></title>
<link rel="stylesheet" href="review.css">
</head>
<body>
<header class="main-header">
    <div class="logo">
        <a href="tailorStore.php" class="back-arrow" aria-label="Go back">&larr;</a>
        <h2><a href="index.html" class="logo">F4</a></h2>
    </div>
    <div class="breadcrumbs">
        <a href="storeSearching.html" class="breadcrumb">&nbsp;&nbsp;Stores</a>
        <?php if (isset($storeName)): ?>
            <span class="breadcrumb-separator">|</span>
            <a href="tailorStore.php?TUsername=<?php echo htmlspecialchars($TUsername); ?>" class="breadcrumb"><?php echo htmlspecialchars($storeName); ?></a>
            <span class="breadcrumb-separator">|</span>
            <span class="breadcrumb active">Ranking: <?php echo number_format($ranking, 1); ?></span>
        <?php endif; ?>
    </div>
    <div class="logo">
        <a href="customerProfile.html"><img src="Image/login.png" alt="User Logo"></a>
    </div>
</header>

<header class="shop-name-container">
    <h2><strong><?php echo isset($storeName) ? htmlspecialchars($storeName) : 'Fairytale Tailor Shop'; ?></strong></h2>
</header>

<main class="container">
    <?php if (isset($errorMessage)): ?>
        <section class="error-message">
            <p><?php echo $errorMessage; ?></p>
        </section>
    <?php else: ?>
        <section class="review-summary">
            <div class="summary-container">
                <div class="average-rating">
                    <h2><strong>Reviews</strong></h2>
                    <!-- Display average rating and total reviews count here if needed -->
                </div>
            </div>
            <div class="rating-distribution">
                <!-- Rating distribution bars go here -->
            </div>
        </section>

        <section class="individual-reviews">
            <?php if (isset($reviews) && count($reviews) > 0): ?>
                <?php foreach ($reviews as $review): ?>
                    <article class="review">
                        <header class="review-header">
                            <img src="Image/profilePicture.png" alt="Profile Picture" class="reviewer-pic">
                            <span class="reviewer-name"><?php echo htmlspecialchars($review['CUsername']); ?></span>
                            <span class="review-rating"><?php echo str_repeat('★', $review['Rating']); ?></span>
                            <span class="review-date"><?php echo htmlspecialchars($review['Date']); ?></span>
                        </header>
                        <p class="review-text"><?php echo htmlspecialchars($review['Comment']); ?></p>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No reviews found for this tailor.</p>
            <?php endif; ?>
        </section>
    <?php endif; ?>
</main>

</body>
</html>
