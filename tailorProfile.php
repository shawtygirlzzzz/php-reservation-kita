<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fairytale Tailor Shop</title>
    <link rel="stylesheet" href="tailorProfile.css">
</head>
<body>
    <?php
    // Dummy data for demonstration
    $followers = 311;
    $address = "7 Jalan Komersial TAKH2, Taman Ayer Keroh Heights, 75450, Melaka";
    $ratings = 4.1;
    $reviews = [
        ["image" => "image/48712595-9062-4AEB-A2B0-FADBC113EF91.jpeg", "alt" => "Review photo 1"],
        ["image" => "image/BF32CB39-1014-4698-BFBF-0A519E909114.jpeg", "alt" => "Review photo 2"]
    ];
    $services = [
        "Women's Custom Made Tailoring",
        "Men's Custom Made Tailoring",
        "Repairs/Alteration"
    ];
    ?>
    <div class="navigation">
        <a href="storeSearching.php" class="back-arrow" aria-label="Go back">&larr;</a>
        <span class="logo">F4</span>
        <div class="breadcrumbs">
            <a href="storeSearching.php" class="breadcrumb">&nbsp;&nbsp;Home</a>
            <span class="breadcrumb-separator">|</span>
            <a href="tailorProfile.php" class="breadcrumb active">Fairytale Tailor Shop |</a>
        </div>
        <a href="customerProfile.php"><img src="image/login.png" style="height:25px; width:25px; margin-left:10px;"></a>
    </div>
    <div class="content" style="color: white;">
        <div class="shop-info">
            <h1>FAIRYTALE TAILOR SHOP</h1>
            <div class="user-controls">
                <a href="https://wa.me/qr/DMJ2DG5J7LDUF1" target="_blank"><button style="float: right;" class="buttoncht">Chat</button></a>
                <button style="float: right;" class="button">+ Follow</button>
            </div>
            <p><strong>Followers:</strong> <?php echo $followers; ?> &nbsp;&nbsp;<strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>Ratings:</strong> <?php echo $ratings; ?> <img src="image/star.png" style="height:15px; width:15px;"></p>
        </div>
    </div>
    <article class="content1">
        <aside style="background-color: #EAA5A5;" class="reviews">
            <h2>Reviews</h2>
            <?php foreach ($reviews as $review): ?>
                <a href="#"><img src="<?php echo $review['image']; ?>" style="height:100px; width:100px;" alt="<?php echo $review['alt']; ?>"></a>
            <?php endforeach; ?>
            <a href="review.php" style="text-decoration: none;">
                <button style="margin-bottom: 10px;" class="button-seemore"> See More +</button>
            </a>
        </aside>
        <section class="why-choose-us">
            <h2 style="font-style: italic; font-weight: 900;font-size: xx-large;">Why Choose Us?</h2>
            <p style="font-size: larger;">Forget fancy displays and overpriced fabrics. Here, bolts of material are crammed haphazardly on a rack, a chaotic jumble of colors and textures waiting to be discovered. We doesn't need fancy catalogues – years of experience have given us an eye for what works and what doesn't.</p>
        </section>
        <br><br><br><br><br><br><br>
        <aside style="background-color: #727272; color: white;">
            <h3>Tags:</h3>
            <p>Occupation: Tailor <br> Service Provided</p>
            <ul>
                <?php foreach ($services as $service): ?>
                    <li><?php echo $service; ?></li>
                <?php endforeach; ?>
            </ul>
        </aside>
        <div class="services-provided">
            <h2 style="font-style: italic; font-weight: 900;font-size: xx-large;">What Services Are We Provided?</h2>
            <ul style="font-size: larger;">
                <?php foreach ($services as $service): ?>
                    <li><?php echo $service; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <a href="reservationtailor.php" style="text-decoration: none;">
            <button class="book-now">BOOK NOW</button>
        </a>
    </article>
</body>
</html>

