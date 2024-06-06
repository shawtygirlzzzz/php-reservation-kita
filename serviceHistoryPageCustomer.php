<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service History</title>
    <link rel="stylesheet" href="serviceHistoryPage.css">
</head>
    <body>
    <div class="wrapper">
        <header>
            <a href="customerProfile.php" class="back-link">&#8592;</a>
            <h1><?php echo $orderNumber; ?></h1>
        </header>
        <main>
            <div class="heading-banner">
                <h1>Service History</h1>
            </div>
            <div class="status-banner">
                <h2><?php echo $orderStatus; ?></h2>
            </div>

            <section class="service-details">
                <div class="info">
                    <p><strong>Shop name:</strong> <?php echo $shopName; ?></p>
                    <p><strong>Address:</strong> <?php echo $shopAddress; ?></p>
                    <p><strong>Service Type:</strong> <?php echo $serviceType; ?></p>
                    <p><strong>Method:</strong> <?php echo $serviceMethod; ?></p>
                    <p><strong>Date:</strong> <?php echo $serviceDate; ?></p>
                    <p><strong>Special Request:</strong></p>
                    <p>Color - <?php echo $specialRequestColor; ?></p>
                    <p>Fabric: <?php echo $specialRequestFabric; ?></p>
                    <p><strong>Your Rating:</strong> 
                        <?php 
                        for ($i = 0; $i < $rating; $i++) {
                            echo "&#9733; ";
                        }
                        for ($i = 0; $i < (5 - $rating); $i++) {
                            echo "&#9734; ";
                        }
                        ?>
                    </p>
                </div>
                <aside class="service-summary">
                    <div class="box">
                        <p><strong>Confirmation Number:</strong> <?php echo $confirmationNumber; ?></p>
                    </div>

                    <div>
                        <p><strong><a href="#">Book Again?</strong></a></p>
                    </div>

                    <div class="box">
                        <div class="total-cost">
                            <h3>Total Cost: RM <?php echo $totalCost; ?></h3>
                            <p>Reservation Cost: RM <?php echo $reservationCost; ?></p>
                            <p>Travel Fee: RM <?php echo $travelFee; ?></p>
                        </div>
                    </div>
                </aside>
            </section>
        </main>
    </div>
    </body>
</html>

