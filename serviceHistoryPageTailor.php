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
        <a href="profilePageWithDes.php" class="back-link">&#8592;</a>
        <h1>F4</h1>
    </header>

    <main>
        
        <div class="heading-banner">
            <h1><b>Service History</b></h1>
        </div>
        
        <div class="status-banner">
            <h2>This order has been completed</h2>
        </div>

        <section class="service-details">
            <div class="info">
                <p><strong>Customer name:</strong> <?php echo $customer_name; ?></p>
                <p><strong>Address:</strong> <?php echo $address; ?></p>
                <p><strong>Phone Number:</strong> <?php echo $phone_number; ?></p>
                <p><strong>Service Type:</strong> <?php echo $service_type; ?></p>
                <p><strong>Method:</strong> <?php echo $method; ?></p>
                <p><strong>Date:</strong> <?php echo $date; ?></p>
                <p><strong>Time:</strong> <?php echo $time; ?></p>
                <p><strong>Special Request:</strong> <?php echo $special_request; ?></p>
                <p><strong>Customer's Rating:</strong> <?php echo $customer_rating; ?></p>
            </div>

            <aside class="service-summary">
                <div class="box">
                    <p><strong>Confirmation Number:</strong> <?php echo $confirmation_number; ?></p>
                </div>
                <div class="box">
                    <div class="total-cost">
                        <h3>Total Cost: RM <?php echo $total_cost; ?></h3>
                        <p>Reservation Cost: RM <?php echo $reservation_cost; ?></p>
                        <p>Travel Fee: RM <?php echo $travel_fee; ?></p>
                    </div>
                </div>
                <div class="status-options">
                    <form>
                        <div>
                            <p><input type="radio" id="contactChoice1" name="status" value="Accepted" <?php if ($status == 'Accepted') echo 'checked'; ?>/>
                            <label for="contactChoice1">Accepted</label><p>
                      
                            <p><input type="radio" id="contactChoice2" name="status" value="Cancelled" <?php if ($status == 'Cancelled') echo 'checked'; ?>/>
                            <label for="contactChoice2">Cancelled</label></p>
                      
                            <p><input type="radio" id="contactChoice3" name="status" value="Processing" <?php if ($status == 'Processing') echo 'checked'; ?>/>
                            <label for="contactChoice3">Processing</label></p>

                            <p><input type="radio" id="contactChoice4" name="status" value="Completed" <?php if ($status == 'Completed') echo 'checked'; ?>/>
                            <label for="contactChoice4">Completed</label></p>
                        </div>
                    </form>
                </div>  
            </aside>                
        </section>        
    </main>
</body>
</html>
         
