<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profilePageWithDes.css">
    <title>F4 Stores Services</title>
</head>
<body>
    <header>
            <h1>F4</h1>
        <nav>
            <a href="storeSearching.html"><button class="nav-button">Stores</button></a>
            <a href="service.html"><button class="nav-button">Services</button></a>
            <a href="contact.html"><button class="nav-button">Contact Us</button></a>
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
    <main>
        <div class="main-content">
            <div class="left-side">
                <img src="Image/profilePicture.png" alt="Profile Picture" class="profile-pic">
                <div class="shop-info">
                    <h2 id="name">FairyTale Tailor Shop</h2>
                    <p><strong>Address:</strong></p>
                    <p id="address">7, Jalan Komersial TAKH 2, Taman Ayer Keroh Heights, 76450 Ayer Keroh Melaka</p>
                    <p><strong>Contact Number:</strong></p>
                    <p id="contactNo">+60123456789</p>
                    <p><strong>Active:</strong> 14 minutes ago</p>
                    <p><strong>Products:</strong> 4</p>
                    <p><strong>Followers:</strong> 30</p>
                    <p><strong>Following:</strong> 18</p>
                    <p><strong>Rating:</strong> 4.5</p>
                    <h3>Women’s Custom Made Tailoring:</h3>
                    <p>Baju Kebaya</p>
                    <p>Baju Kurung Moden</p>
                    <p>Baju Kurung Kedah</p>
                    <p>Baju Kurung Pahang</p>
                    <button class="edit-profile-btn" onclick="edit()">Edit My Profile</button>
                </div>
            </div>
        
            <div class="right-side">
                <div class = "order-box">
                    <h3>The order has been <span class="completed">completed</span></h3>
                    <h3>Customer details:</h3>
                    <p><strong>Name:</strong> Fareen Nathrah</p>
                    <p><strong>Method:</strong> Walkin </p>
                    <p><strong>Preferred Date:</strong> 14/3/2024</p>
                    <p><strong>Preferred Time:</strong> 10.00AM</p>
                    
                    <a href="serviceHistoryPageTailor.html"><button class="see-more-btn">See More</button></a>
                </div>
                <div class = "order-box">
                    <h3>The order is <span class="processing">processing</span></h3>
                    <h3>Customer details:</h3>
                        <p><strong>Name:</strong> Hor Ying Huai</p>
                        <p><strong>Method:</strong> Doorstep</p>
                        <p><strong>Preferred Date:</strong> 24/3/2024</p>
                        <p><strong>Preferred Time:</strong> 11.00AM</p>
                        <a href="serviceHistoryPageTailor.html"><button class="see-more-btn">See More</button></a>
                </div>
                <div class = "order-box">
                    <h3>The order has been <span class="cancelled">cancelled</span></h3>
                    <h3>Customer details:</h3>
                    <p><strong>Name:</strong> Alicia Goh</p>
                    <p><strong>Method:</strong> Walkin</p>
                    <p><strong>Preferred Date:</strong> 14/3/2024</p>
                    <p><strong>Preferred Time:</strong> 10.00AM</p>
                    <a href="serviceHistoryPageTailor.html"><button class="see-more-btn">See More</button></a>
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
    </main>
</body>
</html>