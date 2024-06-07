<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration Page</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <a href="storeSearching.php"><img src="Image/leftarrow.png" alt="Back"></a>
    <h1>F4</h1>
    <p></p>
    <h3>Create an Account</h3>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $phonenumber = $_POST['phonenumber'];
        $servicetype = $_POST['servicetype'];
        $serviceprovided = isset($_POST['serviceprovided']) ? $_POST['serviceprovided'] : '';
        $licensenumber = isset($_POST['licensenumber']) ? $_POST['licensenumber'] : '';
        $storename = isset($_POST['storename']) ? $_POST['storename'] : '';
        $starttime = isset($_POST['starttime']) ? $_POST['starttime'] : '';
        $endtime = isset($_POST['endtime']) ? $_POST['endtime'] : '';

        echo "<h2>Registration Details:</h2>";
        echo "Username: $username<br>";
        echo "Name: $name<br>";
        echo "Address: $address<br>";
        echo "Email: $email<br>";
        echo "Phone Number: $phonenumber<br>";
        echo "Service Type: $servicetype<br>";
        if (!empty($serviceprovided)) 
        {
            echo "Services Provided: " . implode(", ", $serviceprovided) . "<br>";
        }

        if (!empty($licensenumber)) 
        {
            echo "License Number: $licensenumber<br>";
        }

        if (!empty($storename)) 
        {
            echo "Store Name: $storename<br>";
        }

        if (!empty($starttime)) 
        {
            echo "Start Time: $starttime<br>";
        }

        if (!empty($endtime)) 
        {
            echo "End Time: $endtime<br><br>";
        }
    }
    ?>

    <form id="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="formcontent">
            <div class="left">
                <div class="formitem">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="formitem">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
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
                        <option value="tailor">Tailor</option>
                    </select>
                    <p></p>
                    
                    <div id="tailorserviceprovided" style="display:none;">
                        <h4>Tailor Service Provided</h4>
                        <label><input type="checkbox" name="serviceprovided[]" value="repairsoralterations" disabled> Repairs/Alterations</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="womencustommade" disabled> Women's Custom Made Tailoring</label><br>
                        <label><input type="checkbox" name="serviceprovided[]" value="mencustommade" disabled> Men's Custom Made Tailoring</label>
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
            var services = document.querySelectorAll('#tailorserviceprovided input');
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
                service.disabled = !isServiceProvider;
            });

            if (!isServiceProvider) {
                document.getElementById("tailorserviceprovided").style.display = "none";
            }
        }

        function selectservice() {
            var type = document.getElementById("servicetypeselection");
            var tailorServices = document.getElementById("tailorserviceprovided");

            if (type.value === "tailor") {
                tailorServices.style.display = "block";
                tailorServices.querySelectorAll('input').forEach(input => {
                    input.disabled = false;
                });
            } else {
                tailorServices.style.display = "none";
                tailorServices.querySelectorAll('input').forEach(input => {
                    input.disabled = true;
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
