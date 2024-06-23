<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tailorProfile.css">
    <title>F4 Stores Services</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            min-height: 100vh;
        }
        .alb {
            width: 350px;
            height: 500px;
            padding: 5px;
        }
        .alb img {
            width: 350px;
            height: 500px;
        }
        a {
            text-decoration: none;
            color: black;
        }
        .header, .main-content, .order-box, .popup {
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include "connection.php"; ?>
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
            <div class="card">
                <img src="Image/profile.png" id="profile-pic">
                <label for="input-file" class="label1">Update Image</label>
                <input class="input1"type="file" accept="image/jpeg ,image/png, image/jpg" id="input-file">
                <script>
            let profilePic = document.getElementById("profile-pic");
            let inputFile= document.getElementById("input-file");

            inputFile.onchange= function(){
                profilePic.src = URL.createObjectURL(inputFile.files[0]);
            }
        </script>
            </div>
                <div class="shop-info">
                    <h2 id="name">FairyTale Tailor Shop</h2>
                    <p><strong>Address:</strong></p>
                    <p id="address">7, Jalan Komersial TAKH 2, Taman Ayer Keroh Heights, 76450 Ayer Keroh Melaka</p>
                    <p><strong>Contact Number:</strong></p>
                    <p id="contactNo">+60123456789</p>
                    <p><strong>Service Provided:</strong></p>
                    <p id="serviceProvided"></p>
                    <p><strong>Other Information:</strong></p>
                    <p id="otherinfo"> </p>
                    <p><strong>Please Upload Your Catalogue Here</strong><strong style="color:red;"> (JPG/JPEG/PNG FORMAT ONLY)</strong></p>
                    <p id="otherinfo"> </p>

                    <!-- UPLOAD PICTURE PHP -->
                    <?php 
                        $sql = "SELECT * FROM images ORDER BY id DESC";
                        $res = mysqli_query($conn,  $sql);

                        if (mysqli_num_rows($res) > 0) {
                            while ($images = mysqli_fetch_assoc($res)) {  
                                echo "<div class='alb'>";
                                echo "<img src='uploads/".$images['image_url']."'>";
                                echo "</div>";
                            }
                        }
                    ?>
                    <?php if (isset($_GET['error'])): ?>
                        <p><?php echo $_GET['error']; ?></p>
                    <?php endif ?> <!-- Upload.php should be taken too DON'T MISS IT -->
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="my_image">
                        <input type="submit" class="edit-profile-btn" name="submit" value="Upload">
                    </form>

                    <button class="edit-profile-btn" onclick="edit()">Edit My Profile</button>
                </div>
            </div>

            <div class="right-side">
                <div class="order-box">
                    <h3>The order has been <span class="completed">completed</span></h3>
                    <h3>Customer details:</h3>
                    <p><strong>Name:</strong> Fareen Nathrah</p>
                    <p><strong>Method:</strong> Walkin </p>
                    <p><strong>Preferred Date:</strong> 14/3/2024</p>
                    <p><strong>Preferred Time:</strong> 10.00AM</p>
                    <a href="serviceHistoryPageTailor.html"><button class="see-more-btn">See More</button></a>
                </div>
                <div class="order-box">
                    <h3>The order is <span class="processing">processing</span></h3>
                    <h3>Customer details:</h3>
                    <p><strong>Name:</strong> Hor Ying Huai</p>
                    <p><strong>Method:</strong> Doorstep</p>
                    <p><strong>Preferred Date:</strong> 24/3/2024</p>
                    <p><strong>Preferred Time:</strong> 11.00AM</p>
                    <a href="serviceHistoryPageTailor.html"><button class="see-more-btn">See More</button></a>
                </div>
                <div class="order-box">
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
        
        <div id="editWindow" class="popup" style="display: none;">
            <div class="popup-content">
                <h2>Edit Profile</h2>
                <form>
                    <label for="newName">Name:</label>
                    <input type="text" id="newName" name="Name"><br><br>
                    <label for="newAddress">Address:</label>
                    <textarea id="newAddress" name="Address" rows="5"></textarea><br><br>
                    <label for="newContactNo">Contact Number:</label>
                    <input type="text" id="newContactNo" name="Contact Number"><br><br>
                    <label for="newServiceProvided" id="servicetype">Service Provided:</label>
                    <label for="service">Service Type<span style="color: red;">*</span></label>
                    <select id="service" name="service">
                        <option value="">Select a service</option>
                        <option value="women">Women's custom made tailoring</option>
                        <option value="men">Men's custom made tailoring</option>
                        <option value="other">Other custom tailoring</option>
                    </select>
                    <div id="service-checkboxes" class="form-group">
                        <!-- Dynamically populated checkboxes will be added here -->
                    </div>
                    <label for="newOtherInfo">Other Information:</label>
                    <input type="text" id="newOtherInfo" name="Other Information"><br><br>
                    <button type="button" onclick="save()">Save Changes</button>
                    <button type="button" onclick="closePopup()">Cancel</button>
                </form>
            </div>
        </div>
        
        <script>
            function edit() {
                var editPopup = document.getElementById('editWindow');
                editPopup.style.display = 'block';

                // Populate the form fields with current profile information
                var currentName = document.getElementById('name').textContent.trim();
                document.getElementById('newName').value = currentName;
                document.getElementById('newAddress').value = document.getElementById('address').textContent;
                document.getElementById('newContactNo').value = document.getElementById('contactNo').textContent;
            }

            function close() {
                var editPopup = document.getElementById('editWindow');
                editPopup.style.display = 'none';
            }
            function closePopup() {
    var editPopup = document.getElementById('editWindow');
    editPopup.style.display = 'none';
}

            function save() {
                var nName = document.getElementById("newName").value;
                var nAddress = document.getElementById("newAddress").value;
                var nContactNo = document.getElementById("newContactNo").value;
                var nOtherInfo = document.getElementById("newOtherInfo").value;
                var serviceType = document.getElementById("service").value;

                document.getElementById("name").innerHTML = nName;
                document.getElementById("address").innerHTML = nAddress;
                document.getElementById("contactNo").innerHTML = nContactNo;
                document.getElementById("otherinfo").innerHTML = nOtherInfo;
                document.getElementById("servicetype").innerHTML = serviceType;

                var serviceProvided = "";
                var checkboxes = document.getElementsByName("serviceDetail");

                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        serviceProvided += checkboxes[i].value + ", ";
                    }
                }
                serviceProvided = serviceProvided.replace(/, $/, "");

                document.getElementById("serviceProvided").innerHTML = serviceProvided;

                closePopup();
            }

            function updateServices() {
                var serviceType = document.getElementById("service").value;
                var serviceCheckboxes = document.getElementById("service-checkboxes");
                
                serviceCheckboxes.innerHTML = ""; // Clear existing checkboxes
            
                if (serviceType === "women") {
                    serviceCheckboxes.innerHTML += `
                    <label><input type="checkbox" name="serviceDetail" value="Blouses Kids"> Blouses Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Blouses Adult"> Blouses Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Skirt Kids"> Skirt Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Skirt Adult"> Skirt Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Baju Kebaya Kids"> Baju Kebaya Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Baju Kebaya Adult"> Baju Kebaya Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Baju Kurung Kids"> Baju Kurung Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Baju Kurung Adult"> Baju Kurung Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Cheongsam/Qipao Kids"> Cheongsam/Qipao Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Cheongsam/Qipao Adult"> Cheongsam/Qipao Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Saree Blouses Kids"> Saree Blouses Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Saree Blouses Adult"> Saree Blouses Adult</label>
                    `;

                    
                } else if (serviceType === "men") {
                    serviceCheckboxes.innerHTML += `
                    <label><input type="checkbox" name="serviceDetail" value="Jeans Kids"> Jeans Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Jeans Adult"> Jeans Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Baju Melayu Kids"> Baju Melayu Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Baju Melayu Adult"> Baju Melayu Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="T-shirts Kids"> T-shirts Kids</label>
                    <label><input type="checkbox" name="serviceDetail]" value="T-shirts Adult"> T-shirts Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Polo Shirts Kids"> Polo Shirts Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Polo Shirts Adult"> Polo Shirts Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Shorts Kids"> Shorts Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Shorts Adult"> Shorts Adult</label>
                    `;
                } else if (serviceType === "other") {
                    serviceCheckboxes.innerHTML += `
                    <label><input type="checkbox" name="serviceDetail" value="Uniforms Kids"> Uniforms Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Uniforms Adult"> Uniforms Adult</label>
                    <label><input type="checkbox" name="serviceDetail" value="Costumes Kids"> Costumes Kids</label>
                    <label><input type="checkbox" name="serviceDetail" value="Costumes Adult"> Costumes Adult</label>`;
                }
            }
            
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("service").addEventListener("change", updateServices);
            });
        </script>
    </main>
</body>
</html>
