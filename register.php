<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customer Registration Page</title>
        <link rel="stylesheet" type="text/css" href="register.css">
    </head>

    <body>
        <a href="storeSearching.html"><img src="Image/leftarrow.png" alt="Back"></a>
        <h1>F4</h1>
        <p></p>
        <h3>Create an Account</h3>
        <form id="form">
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
                        <label for="radiotailor">
                            <input type="radio" id="radiotailor" name="servicetype" value="tailor" onclick="selecttype(true)">
                            Tailor
                        </label>
                        
                        <label for="radiocustomer">
                            <input type="radio" id="radiocustomer" name="servicetype" value="customer" onclick="selecttype(false)">
                            Customer
                        </label>
                    </div>                    
                   
                    <div class="select">
                        <div id="tailorserviceprovided" style="display:none;">
                            <h4>Tailor Service Provided</h4>
                            <label><input type="checkbox" name="serviceprovided" value="repairsoralterations" disabled> Repairs/Alterations</label><br>
                            <label><input type="checkbox" name="serviceprovided" value="womencustommade" disabled> Women's Custom Made Tailoring</label><br>
                            <label><input type="checkbox" name="serviceprovided" value="mencustommade" disabled> Men's Custom Made Tailoring</label>
                        </div>
                        
                        <p></p>
                        <input type="text" id="storename" name="storename" placeholder="Name of Store" disabled>
                        <p></p>
                        <small>Operating Hours (Start Time)</small>
                        <input type="time" id="starttime" name="starttime" min="09:00" max="18:00" disabled>
                        <p></p>
                        <small>Operating Hours (End Time)</small>
                        <input type="time" id="endtime" name="endtime" min="09:00" max="18:00" disabled>
                        <br/>
                        <p></p>
                        <label for="qualificationproof">Proof of Qualifications (PDF, PNG, JPEG, JPG)</label>
                        <input type="file" id="qualificationproof" name="qualificationproof" accept=".pdf, .png, .jpeg, .jpg" disabled>
                        <p></p>
                        <label for="qualificationdescription">Description of Proof of Qualifications</label>
                        <div class="qualificationDesc">
                        <textarea id="qualificationdescription" name="qualificationdescription" rows="3" disabled></textarea>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
            <p></p>
            <button type="submit" id="createAccount">Create Account</button>
        </form>

        <div class="footer">
            Have an account? <a href="login.html">Sign in here</a>
        </div>

        <script>
            document.getElementById("form").addEventListener("submit", function(event) {
                event.preventDefault();

                if (check()) {
                    window.location.href = "storeSearching.html";
                }
            });

            function selecttype(isTailor) {
                var services = document.querySelectorAll('#tailorserviceprovided input');
                var qualificationProof = document.getElementById("qualificationproof");
                var qualificationDescription = document.getElementById("qualificationdescription");
                var name = document.getElementById("storename");
                var start = document.getElementById("starttime");
                var end = document.getElementById("endtime");

                services.forEach(service => {
                    service.disabled = !isTailor;
                });

                qualificationProof.disabled = !isTailor;
                qualificationDescription.disabled = !isTailor;
                name.disabled = !isTailor;
                start.disabled = !isTailor;
                end.disabled = !isTailor;

                if (!isTailor) {
                    document.getElementById("tailorserviceprovided").style.display = "none";
                } else {
                    document.getElementById("tailorserviceprovided").style.display = "block";
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
