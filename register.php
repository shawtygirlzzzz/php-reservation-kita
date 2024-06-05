<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Page</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <a href="storeSearching.php"><img src="Image/leftarrow.png" alt="Back"></a>
    <h1>F4</h1>
    <p></p>
    <h3>Create an Account</h3>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $address = htmlspecialchars($_POST['address']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirmpassword = htmlspecialchars($_POST['confirmpassword']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);
        $servicetype = htmlspecialchars($_POST['servicetype']);
        $serviceprovided = isset($_POST['serviceprovided']) ? $_POST['serviceprovided'] : [];
        $licensenumber = htmlspecialchars($_POST['licensenumber']);
        $storename = htmlspecialchars($_POST['storename']);
        $starttime = htmlspecialchars($_POST['starttime']);
        $endtime = htmlspecialchars($_POST['endtime']);

        // Here you can handle the form data, e.g., save it to a database or send an email
        // For demonstration, we'll just display the data
        echo "<h3>Registration Details:</h3>";
        echo "First Name: $firstname<br>";
        echo "Last Name: $lastname<br>";
        echo "Address: $address<br>";
        echo "Email: $email<br>";
        echo "Phone Number: $phonenumber<br>";
        echo "Service Type: $servicetype<br>";
        if (!empty($serviceprovided)) {
            echo "Services Provided: " . implode(", ", $serviceprovided) . "<br>";
        }
        if (!empty($licensenumber)) {
            echo "License Number: $licensenumber<br>";
        }
        if (!empty($storename)) {
            echo "Store Name: $storename<br>";
        }
        if (!empty($starttime)) {
            echo "Start Time: $starttime<br>";
        }
        if (!empty($endtime)) {
            echo "End Time: $endtime<br>";
        }
    }
    ?>
    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="formcontent">
            <div class="left">
                <div class="formitem">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required>
                </div>

                <div class="formitem">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required>
                </div>

                <div class="formitem">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="5" required></textarea>
                </div>
            </div>

            <div class="right">
                <div class="formitem">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="formitem">
                    <label for="password">Create Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="formitem">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" required>
                </div>

                <div class="formitem">
                    <label for="phonenumber">Phone Number</label>
                    <input type="text" id="phonenumber" name="phonenumber" required>
                </div>
            </div>

            <div class="choose">
                <div class="position">
                    <label for="radioserviceprovider">
                        <input type="radio" id="radioserviceprovider" name="servicetype" value="serviceprovider" onclick="selecttype(true)">
                        Service Provider
                    </label>
                    
                    <label for="radiocustomer">
                        <input type="radio" id="radiocustomer" name="servicetype" value="customer" onclick="selecttype(false)">
                        Customer
                    </label>
                </div>                    
               
                <div class="select">
                    <select id="servicetypeselection" name="servicetype_selection" disabled onchange="selectservice()">
                        <option value="" disabled selected>Types of services</option>
                        <option value="medical">Medical</option>
                        <option value="tailor">Tailor</option>
                        <option value="spa">Spa</option>
                    </select>
                    <p></p>
                    
                    <div id="tailorserviceprovided" style="display:none;">
                        <h4>Tailor Service Provided</h4>
                        <label><input type="checkbox" name="serviceprovided[]" value="repairsoralterations" disabled> Repairs/Alterations</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="womencustommade" disabled> Women's Custom Made Tailoring</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="mencustommade" disabled> Men's Custom Made Tailoring</label>
                    </div>

                    <div id="spaserviceprovided" style="display:none;">
                        <h4>Spa Service Provided</h4>
                        <label><input type="checkbox" name="serviceprovided[]" value="facialtreatment" disabled> Facial Treatment</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="bodytreatment" disabled> Body Treatment</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="nailservices" disabled> Nail Services</label>
                    </div>
            
                    <div id="medicalserviceprovided" style="display:none;">
                        <h4>Medical Service Provided</h4>
                        <label><input type="checkbox" name="serviceprovided[]" value="vaccinations" disabled> Vaccinations</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="labtesting" disabled> Laboratory Testing</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="screeningtreatment" disabled> Screening and Treatment</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="specializedtreatment" disabled> Specialized Treatment</label>
                    </div>
                    
                    <p></p>
                    <input type="text" id="licensenumber" name="licensenumber" placeholder="License Number" disabled>
                    <p></p>
                    <input type="text" id="storename" name="storename" placeholder="Name of Store" disabled>
                    <p></p>
                    <small>Operating Hours (Start Time)</small>
                    <input type="time" id="starttime" name="starttime" min="09:00" max="18:00" disabled>
                    <p></p>
                    <small>Operating Hours (End Time)</small>
                    <input type="time" id="endtime" name="endtime" min="09:00" max="18:00" disabled>
                </div>
            </div>
        </div>
        <p></p>
        <button type="submit" id="createAccount">Create Account</button>
    </form>

    <div class="footer">
        Have an account? <a href="login.php">Sign in here</a>
    </div>

    <script>
        document.getElementById("form").addEventListener("submit", function(event) {
            if (!check()) {
                event.preventDefault();
            }
        });

        function selecttype(isServiceProvider) {
            var type = document.getElementById("servicetypeselection");
            var services = document.querySelectorAll('#tailorserviceprovided input, #spaserviceprovided input, #medicalserviceprovided input');
            var license = document.getElementById("licensenumber");
            var name = document.getElementById("storename");
            var start = document.getElementById("starttime");
            var end = document.getElementById("endtime");

            type.disabled = !isServiceProvider;
            license.disabled = !isServiceProvider;
            name.disabled = !isServiceProvider;
            start.disabled = !isServiceProvider;
            end.disabled = !isServiceProvider;

            services.forEach(service => {
                service.disabled = true;
            });

            if (!isServiceProvider) {
                document.getElementById("tailorserviceprovided").style.display = "none";
                document.getElementById("spaserviceprovided").style.display = "none";
                document.getElementById("medicalserviceprovided").style.display = "none";
            }
        }

        function selectservice() {
            var type = document.getElementById("servicetypeselection");
            var tailorServices = document.getElementById("tailorserviceprovided");
            var spaServices = document.getElementById("spaserviceprovided");
            var medicalServices = document.getElementById("medicalserviceprovided");
            var services = {
                "tailor": tailorServices,
                "spa": spaServices,
                "medical": medicalServices
            };

            for (var key in services) {
                services[key].style.display = "none";
                services[key].querySelectorAll('input').forEach(input => {
                    input.disabled = true;
                });
            }

            if (type.value in services) {
                services[type.value].style.display = "block";
                services[type.value].querySelectorAll('input').forEach(input => {
                    input.disabled = false;
                });
            }
        }

        function check() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match. Please enter matching passwords.");
                return false;
            }

            return true;
        }
    </script>                
</body>
</html>

        </script>                
    </body>
</html>
