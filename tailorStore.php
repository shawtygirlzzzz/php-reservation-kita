<?php
session_start();
include('connection.php');

// Function to normalize text for session key
function normalizeText($text) {
    return strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $text));
}

// Retrieve parameters
$storeName = isset($_GET['storename']) ? htmlspecialchars($_GET['storename']) : '';
$address = isset($_GET['address']) ? htmlspecialchars($_GET['address']) : '';
$ranking = isset($_GET['ranking']) ? htmlspecialchars($_GET['ranking']) : '';
$services = isset($_GET['services']) ? htmlspecialchars($_GET['services']) : '';
$location = isset($_GET['location']) ? htmlspecialchars($_GET['location']) : '';
$TUsername = isset($_GET['TUsername']) ? $_GET['TUsername'] : '';

// Query to get store details and images for the specified TUsername
$sql = "SELECT t.*, GROUP_CONCAT(DISTINCT sp.Name SEPARATOR ', ') AS ServiceNames,
        GROUP_CONCAT(DISTINCT st.Name SEPARATOR ', ') AS ServiceTypes,
        im.brochure_image
        FROM tailor t
        LEFT JOIN servicedetails sd ON t.TUsername = sd.TUsername
        LEFT JOIN serviceprovided sp ON sd.ServiceID = sp.ServiceID
        LEFT JOIN servicetype st ON sd.TypeID = st.TypeID
        LEFT JOIN images im ON t.TUsername = im.TUsername
        WHERE t.TUsername = '$TUsername'
        GROUP BY t.TUsername";

$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    // Retrieve details from session based on storeName if available
    $sessionKey = 'store_' . normalizeText($storeName);
    if (isset($_SESSION[$sessionKey])) {
        $sessionData = $_SESSION[$sessionKey];
        $storeName = htmlspecialchars($sessionData['StoreName']);
        $address = htmlspecialchars($sessionData['Address']);
        $ranking = htmlspecialchars($sessionData['Ranking']);
        $services = htmlspecialchars($sessionData['ServiceNames']);
        $location = htmlspecialchars($sessionData['Location']);
        // You can also fetch other details from session as needed
    } else {
        // Handle case where session data doesn't exist or is invalid
    }
} else {
    echo "Error retrieving store details: " . mysqli_error($conn);
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title><?php echo $storeName; ?></title>
    <link rel="stylesheet" href="tailorStore.css">
</head>
<body>
    <div class="navigation">
        <a href="storeSearching.php" class="back-arrow" aria-label="Go back">&larr;</a>
        <span class="logo">F4</span>
        <div class="breadcrumbs">
            <a href="storeSearching.php" class="breadcrumb">&nbsp;&nbsp;Home</a>
            <span class="breadcrumb-separator">|</span>
            <class="breadcrumb active><?php echo $storeName; ?> |</a>
        </div>
        <a href="customerProfile.html"><img src="image/login.png" style="height:25px; width:25px; margin-left:10px;"></a>
    </div>
    <div class="content" style="color: white;">
        <div class="shop-info">
            <h1><?php echo $storeName; ?></h1>
            <div class="user-controls">
                <a href="https://wa.me/qr/DMJ2DG5J7LDUF1" target="_blank"><button style="float: right;" class="buttoncht">Chat</button></a>
            </div>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>Ratings:</strong> <?php echo $ranking; ?> <img src="image/star.png" style="height:15px; width:15px;"></p>
        </div>
    </div>

    <article class="content1">
        <aside style="background-color: #EAA5A5;" class="reviews">
            <h2>Reviews</h2>
            <a href="#"><img src="image/48712595-9062-4AEB-A2B0-FADBC113EF91.jpeg" style="height:100px; width:100px;" alt="Review photo"></a>
            <a href="#"><img src="image/BF32CB39-1014-4698-BFBF-0A519E909114.jpeg" style="height:100px; width:100px;" alt="Review photo"><br></a>
            <a href="review.php" style="text-decoration: none;">
                <button style="margin-bottom: 10px;" class="button-seemore"> See More +</button>
            </a>
        </aside>

        <br><br>
       
        <div class="services-provided">
            <h2 style="font-style: italic; font-weight: 900; font-size: xx-large;">What Services Are We Provided?</h2>
            <ul style="font-size: larger;">
                <?php foreach (explode(', ', $services) as $service): ?>
                    <li><?php echo htmlspecialchars($service); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <h1>Qualification Image:</h1>
        <img src="uploads/<?php echo $qualify_image; ?>" alt="Qualification Image" width="300">

        <h1>Brochure Image:</h1>
        <img src="uploads/<?php echo $brochure_image; ?>" alt="Brochure Image" width="300">

        <br><br><br>

        <a href="reservationtailor.html" style="text-decoration: none;">
            <button class="book-now">BOOK NOW</button>
        </a>
    </article>
</body>
</html>

<?php
$conn->close();
?>
