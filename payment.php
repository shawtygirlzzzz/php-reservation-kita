<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link rel="stylesheet" href="payment.css">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize input data
        $payment_method = "";
        if (isset($_POST['bank'])) {
            $payment_method = $_POST['bank'];
        } elseif (isset($_POST['card_number']) && isset($_POST['valid_thru']) && isset($_POST['cvv'])) {
            $card_number = htmlspecialchars($_POST['card_number']);
            $valid_thru = htmlspecialchars($_POST['valid_thru']);
            $cvv = htmlspecialchars($_POST['cvv']);
            $payment_method = "Credit/Debit Card";
        }

        // Process payment
        // You can integrate with a payment gateway API here

        // Display payment details or confirmation
        echo "<div class='confirmation'>";
        echo "<h2>Payment Confirmation</h2>";
        echo "Payment method: " . $payment_method . "<br>";
        if ($payment_method == "Credit/Debit Card") {
            echo "Card Number: " . $card_number . "<br>";
            echo "Valid Thru: " . $valid_thru . "<br>";
            echo "CVV: " . $cvv . "<br>";
        } else {
            echo "Bank: " . $payment_method . "<br>";
        }
        echo "Payment processed successfully.";
        echo "</div>";
    } else {
    ?>
    <div class="navigation">
        <a href="reservationtailor.html" class="back-arrow" aria-label="Go back">&larr;</a>
        <span class="logo">F4</span>
        <div class="breadcrumbs">
          <a href="storeSearching.html" class="breadcrumb">&nbsp;&nbsp;Home</a>
          <span class="breadcrumb-separator">|</span>
          <a href="tailorProfile.html" class="breadcrumb">Fairytale Tailor Shop</a>
          <span class="breadcrumb-separator">|</span>
          <a href="reservationtailor.html" class="breadcrumb">Book Now</a>
          <span class="breadcrumb-separator">|</span>
          <a href="payment.php" class="breadcrumb active">Payment</a>
        </div>
        <a href="customerProfile.html"><img src="image/login.png" style="height:25px; width:25px; margin-left:10px;"></a>
    </div>
    <div class="total-payment-container">
        <div class="total-text">TOTAL PAYMENT</div>
        <div class="total-amount">RM 15</div>
    </div>
    <div class="content-container">
        <div class="payment-section">
            <h2>Payment Method</h2>
            <div class="methods">
                <button type="button" class="buttonselect" onclick="togglePaymentMethod('online')">Online Banking</button>
                <button type="button" class="buttonselect" onclick="togglePaymentMethod('card')">Credit/Debit Card</button>
                <div id="online-banking" class="method" style="display:none; line-height: 40px;">
                    <form action="payment.php" method="post">
                        <label><input type="radio" name="bank" value="maybank" checked> Maybank2u</label><br>
                        <label><input type="radio" name="bank" value="cimb"> CIMB Bank</label><br>
                        <label><input type="radio" name="bank" value="public"> Public Bank</label><br>
                        <label><input type="radio" name="bank" value="rhb"> RHB</label>
                        <input type="submit" value="Proceed to Pay">
                    </form>
                </div>
                <div id="credit-card" class="card" style="display:none;">
                  <form action="payment.php" method="post">
                    <label>Card Number</label><label style="color: red;">*</label><br>
                    <input type="text" name="card_number" placeholder="xxxx-xxxx-xxxx-xxxx" required><br><br>
                    <label>Valid Thru</label><label style="color: red;">*</label><br>  
                    <input type="text" name="valid_thru" placeholder="xx/xx" required><br><br>
                    <label>CVV</label><label style="color: red;">*</label><br>
                    <input type="text" name="cvv" placeholder="xxx" required><br><br>
                    <input type="submit" value="Proceed to Pay">
                  </form>
                </div>
            </div>
        </div>
    
        <div class="reservation-section">
            <h2>Reservation Details:</h2>
            <p>Shop: Fairytale Tailor Shop</p>
            <p>Method: Doorstep</p>
            <p>Contact Number: 011-23456789</p>
            <p class="line"></p>
            <p>1x Women's Custom Made Tailoring</p>
            <p>1x Men's Custom Made Tailoring</p>
            <p>2x Repairs/Alteration</p>
            <p class="line"></p>
            <div class="voucher-code">
                <input type="text" name="voucher_code" placeholder="Voucher Code:">
            </div>
            <div class="fees">
                <p>Reservation Fee: <span>RM 2.00</span></p>
                <p>Travel Fee: <span>RM 13.00</span></p>
                <p style="font-size: xx-small;color: #757575;">Travel fee may vary depending on your address</p>
            </div>
            <h6 class="note" style="color: crimson;">*A copy of this receipt will be sent to your email</h6>
            <p class="line"></p>
            <button type="button"class="button" style="color: black;font-weight: 900;">PAY NOW RM 15</button>
        </div>
    </div>
    <?php
    }
    ?>
    <script>
        function togglePaymentMethod(method) {
            var onlineBankingDiv = document.getElementById('online-banking');
            var creditCardDiv = document.getElementById('credit-card');

            if (method == 'online') {
                onlineBankingDiv.style.display = 'block';
                creditCardDiv.style.display = 'none';
            } else if (method == 'card') {
                onlineBankingDiv.style.display = 'none';
                creditCardDiv.style.display = 'block';
            }
        }
    </script>
</body>
</html>
