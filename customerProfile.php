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
                <a href="storeSearching.html"><button id="stores">Stores</button></a>
                <a href="service.html"><button id="service">Services</button></a>
                <a href="contact.html"><button id="contact">Contact Us</button></a>
            </nav>
            <div class="header-right">
                <div class="logo">
                    <a href="https://wa.me/qr/DMJ2DG5J7LDUF1"><img src="Image/whatsapp.png" alt="WhatsApp"></a>+601189766500
                </div>
                <div class ="logo">
                    <a href="login.html"><img src="Image/login.png" alt="Login Logo"></img></a>
                </div>
            </div>
        </header>
        <div class="main">
            <div class = "left">
                <img src="Image/profilePicture.png" alt="Profile Picture" class="profilepicture">
                <div class="customerinfo">
                    <h2 id="name">Hor Ying Huai</h2>
                    <p><strong>Address:</strong></p>
                    <p id="address">7, Jalan Komersial TAKH 2, Taman Ayer Keroh Heights, 76450 Ayer Keroh Melaka</p>
                    <p><strong>Contact Number:</strong></p>
                    <p id="contactNo">+60123456789</p>
                    <p><strong>Active:</strong> 14 minutes ago</p>
                    <button class="editprofile" onclick="edit()">Edit My Profile</button>
                </div>
            </div>
            <div class="right">
                <div class="order">
                    <h3>The order has been <span class="completed">completed</span></h3>
                    <p><strong>Shop name:</strong> Fairytale Shop</p>
                    <p><strong>Method:</strong> Walkin</p>
                    <p><strong>Date:</strong> 14/3/2024</p>
                    <p><strong>Time:</strong> 10:00 AM</p>
                    <a href="serviceHistoryPageCustomer.html"><button class="seemore">See more...</button></a>
                </div>
                <div class="order">
                    <h3>The order is <span class="processing">processing</span></h3>
                    <p><strong>Shop name:</strong> FairyGodmother Shop</p>
                    <p><strong>Method:</strong> Doorstep</p>
                    <p><strong>Date:</strong> 24/3/2024</p>
                    <p><strong>Time:</strong> 11:00 AM</p>
                    <a href="serviceHistoryPageCustomer.html"><button class="seemore">See more...</button></a>
                </div>
                <div class="order">
                    <h3>The order has been <span class="cancelled">cancelled</span></h3>
                    <p><strong>Shop name:</strong> FairyGodfather Shop</p>
                    <p><strong>Method:</strong> Walkin</p>
                    <p><strong>Date:</strong> 14/3/2024</p>
                    <p><strong>Time:</strong> 10:00 AM</p>
                    <a href="serviceHistoryPageCustomer.html"><button class="seemore">See more...</button></a>
                </div>
            </div>    
        </div>
        <div id="editWindow" class="popup">
            <div class="popup-content">
                <h2>Edit Profile</h2>
                <form>
                    <label for="newName">Name:</label>
                    <input type="text" id="newName" name="Name"><br><br>
                    <label for="newAddress">Address:</label>
                    <textarea id="newAddress" name="Address" rows="5"></textarea><br><br>
                    <label for="newContactNo">Contact Number:</label>
                    <input type="text" id="newContactNo" name="Contact Number"><br><br>
                    <button type="button" onclick="save()">Save Changes</button>
                    <button type="close" onclick="close()">Cancel</button>
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

            function save() {
                var nName = document.getElementById("newName").value;
                var nAddress = document.getElementById("newAddress").value;
                var nContactNo = document.getElementById("newContactNo").value;

                document.getElementById("name").innerHTML = nName;
                document.getElementById("address").innerHTML = nAddress;
                document.getElementById("contactNo").innerHTML = nContactNo;

                close();
            }
        </script>
    </body>
</html>