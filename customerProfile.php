<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="customerProfile.css">
</head>
<body>
    <header>
        <h1>F4</h1>
        <nav>
            <a href="storeSearching.php"><button id="stores">Stores</button></a>
            <a href="service.php"><button id="service">Services</button></a>
            <a href="contact.php"><button id="contact">Contact Us</button></a>
        </nav>
        <div class="header-right">
            <div class="logo">
                <a href="https://wa.me/qr/DMJ2DG5J7LDUF1"><img src="Image/whatsapp.png" alt="WhatsApp"></a>+601189766500
            </div>
            <div class="logo">
                <a href="login.php"><img src="Image/login.png" alt="Login Logo"></img></a>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="left">
            <img src="Image/profilePicture.png" alt="Profile Picture" class="profilepicture">
            <div class="customerinfo">
                <?php
                    $name = "Hor Ying Huai";
                    $address = "7, Jalan Komersial TAKH 2, Taman Ayer Keroh Heights, 76450 Ayer Keroh Melaka";
                    $contactNo = "+60123456789";
                ?>
                <h2 id="name"><?php echo $name; ?></h2>
                <p><strong>Address:</strong></p>
                <p id="address"><?php echo $address; ?></p>
                <p><strong>Contact Number:</strong></p>
                <p id="contactNo"><?php echo $contactNo; ?></p>
                <p><strong>Active:</strong> 14 minutes ago</p>
                <button class="editprofile" onclick="edit()">Edit My Profile</button>
            </div>
        </div>
        <div class="right">
            <?php
                $orders = [
                    [
                        'status' => 'completed',
                        'shop' => 'Fairytale Shop',
                        'method' => 'Walkin',
                        'date' => '14/3/2024',
                        'time' => '10:00 AM'
                    ],
                    [
                        'status' => 'processing',
                        'shop' => 'FairyGodmother Shop',
                        'method' => 'Doorstep',
                        'date' => '24/3/2024',
                        'time' => '11:00 AM'
                    ],
                    [
                        'status' => 'cancelled',
                        'shop' => 'FairyGodfather Shop',
                        'method' => 'Walkin',
                        'date' => '14/3/2024',
                        'time' => '10:00 AM'
                    ]
                ];
                
                foreach ($orders as $order) {
                    echo '<div class="order">';
                    echo '<h3>The order has been <span class="'.$order['status'].'">'.$order['status'].'</span></h3>';
                    echo '<p><strong>Shop name:</strong> '.$order['shop'].'</p>';
                    echo '<p><strong>Method:</strong> '.$order['method'].'</p>';
                    echo '<p><strong>Date:</strong> '.$order['date'].'</p>';
                    echo '<p><strong>Time:</strong> '.$order['time'].'</p>';
                    echo '<a href="serviceHistoryPageCustomer.php"><button class="seemore">See more...</button></a>';
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <div id="editWindow" class="popup">
        <div class="popup-content">
            <h2>Edit Profile</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="newName">Name:</label>
                <input type="text" id="newName" name="newName"><br><br>
                <label for="newAddress">Address:</label>
                <textarea id="newAddress" name="newAddress" rows="5"></textarea><br><br>
                <label for="newContactNo">Contact Number:</label>
                <input type="text" id="newContactNo" name="newContactNo"><br><br>
                <button type="submit">Save Changes</button>
                <button type="button" onclick="close()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function edit() {
            var popup = document.getElementById("editWindow");
            popup.style.display = "block";
        }

        function close() {
            var popup = document.getElementById("editWindow");
            popup.style.display = "none";
        }
    </script>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newName = htmlspecialchars($_POST['newName']);
            $newAddress = htmlspecialchars($_POST['newAddress']);
            $newContactNo = htmlspecialchars($_POST['newContactNo']);

            // Here you would normally update the database or perform other actions

            echo '<script>
                document.getElementById("name").innerHTML = "'.$newName.'";
                document.getElementById("address").innerHTML = "'.$newAddress.'";
                document.getElementById("contactNo").innerHTML = "'.$newContactNo.'";
                close();
            </script>';
        }
    ?>
</body>
</html>
