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
        <a href="customerProfile.html" class="back-link">&#8592;</a>
        <h1>F4</h1>
    </header>
    <main>
        <div class="heading-banner">
            <h1>Service History</h1>
        </div>
        <div class="status-banner">
            <?php
            include 'connection.php';

            $confirmation_number = '1001'; // Replace with your actual confirmation number
            $sql_status = "SELECT Status FROM reservation WHERE ConfirmationNo = ?";
            $stmt_status = $conn->prepare($sql_status);
            $stmt_status->bind_param("s", $confirmation_number);
            $stmt_status->execute();
            $stmt_status->store_result();

            if ($stmt_status->num_rows > 0) {
                $stmt_status->bind_result($status);
                $stmt_status->fetch();
                echo "<h2>$status</h2>";
            } else {
                echo "<h2>Status not found</h2>";
            }

            $stmt_status->close();
            ?>
        </div>

        <section class="service-details">
            <div class="info">
                <?php
                $sql_details = "SELECT * FROM reservation WHERE ConfirmationNo = ?";
                $stmt_details = $conn->prepare($sql_details);
                $stmt_details->bind_param("s", $confirmation_number);
                $stmt_details->execute();
                $result_details = $stmt_details->get_result();

                if ($result_details->num_rows > 0) {
                    $row = $result_details->fetch_assoc();
                    $encoded_data = http_build_query($row);

                    echo "<p><strong>Shop name:</strong> " . $row["Name"] . "</p>";
                    echo "<p><strong>Contact No:</strong> " . $row["ContactNo"] . "</p>";
                    echo "<p><strong>Preferred Date:</strong> " . $row["PreferredDate"] . "</p>";
                    echo "<p><strong>Preferred Time:</strong> " . $row["PreferredTime"] . "</p>";
                    echo "<p><strong>Address:</strong> " . $row["Address"] . "</p>";
                    echo "<p><strong>Description:</strong> " . $row["Description"] . "</p>";
                    echo "<p><strong>Status:</strong> " . $row["Status"] . "</p>";
                    echo "<p><strong>Customer Username:</strong> " . $row["CUsername"] . "</p>";
                    echo "<p><strong>Technician Username:</strong> " . $row["TUsername"] . "</p>";
                } else {
                    echo "Service details not found";
                }

                $stmt_details->close();
                ?>
            </div>
            <aside class="service-summary">
                <div class="box">
                    <p><strong>Confirmation Number:</strong> <?php echo $confirmation_number; ?></p>
                </div>
                <div>
                    <p><strong><a href="filledReservation.php?<?php echo $encoded_data; ?>">Edit Booking</a></strong></p>
                </div>
            </aside>
        </section>
    </main>
</div>
</body>
</html>

<?php
$conn->close();
?>
