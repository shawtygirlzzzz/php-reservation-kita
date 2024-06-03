<!DOCTYPE html>
<html>
  <head>
    <title>Reservation Kita System</title>
    <link rel="stylesheet" href="service.css">
  </head>

  <body>
    <div class="header">
      <h1>F4</h1>
      <nav>
        <ul>    
          <li><a href="storeSearching.php">Stores</a></li>
          <li style="color: red;"><a href="service.php" style="color: red;">Services</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>

      <div class="contact">
        <a href="https://wa.me/qr/DMJ2DG5J7LDUF1">
          <img src="image/whatsapp.png" alt="WhatsApp" style="height:20px; width:20px; margin-right:5px;">
          +60103344971
        </a>
        <a href="login.php">
          <img src="image/loginaccount.png" alt="Login" style="height:20px; width:20px; margin-left:5px;">
        </a>
      </div>
    </div>

    <div class="title flex-container">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="serviceType" onchange="this.form.submit()">
          <option value="">Types of Services</option>
          <option value="medical">Medical</option>
          <option value="tailor">Tailor</option>
          <option value="spa">Spa</option>
        </select>
      </form>
      <div class="reservation-title">Reservation Kita System</div>
    </div>

    <div id="servicesDisplay">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $serviceType = $_POST['serviceType'];
        $services = [
          "medical" => '
            <h2>Medical Services</h2>
            <div class="box">
              <div class="display">
                <img src="Image/vaccinations.png" alt="Medical Services Image 1">
              </div>
              <div class="display">
                <h3>Vaccinations</h3>
                <ul>
                  <li>Hepatitis A</li> 
                  <li>Hepatitis B</li>
                  <li>Rabies</li>
                  <li>Rotavirus</li>
                  <li>Chickenpox</li>
                  <li>HPV</li>
                  <li>Tetanus</li>
                </ul>
              </div>
            </div>
            <div class="box">
              <div class="display">
              <img src="Image/laboratory testing.png" alt="Medical Services Image 2">
              </div>
              <div class="display">
                <h3>Laboratory testing</h3>
                <ul>
                  <li>Blood test</li>
                  <li>Urine test</li>
                </ul>
              </div>
            </div>
            <div class="box">
              <div class="display">
                <img src="Image/screening.png" alt="Medical Services Image 3">
              </div>
              <div class="display">
                <h3>Screening and treatment</h3>
                <ul>
                  <li>High cholesterol</li>
                  <li>High blood pressure</li>
                  <li>Diabetes</li>
                </ul>
              </div>
            </div>
            <div class="box">
              <div class="display">
                <img src="Image/specialized treatment.png" alt="Medical Services Image 4">
              </div>
              <div class="display">
                <h3>Specialized treatment</h3>
                <ul>
                  <li>Cardiology</li>
                  <li>Dermatology</li>
                  <li>Dentistry</li>
                  <li>Ear, nose and throat (ENT)</li>
                  <li>Physical therapy</li>
                </ul>
              </div>
            </div>',
          
          "tailor" => '
            <h2>Tailor Services</h2>
            <div class="box">
              <div class="display">
                <img src="Image/alterations.jpg" alt="Tailor Services Image 1">
              </div>
              <div class="display">
                <h3>Repairs/Alterations</h3>
                <ul>
                  <li>Shortening (Sleeves or pant legs)</li>
                  <li>Hemming of all types</li>
                  <li>Cuffs</li>
                  <li>Mending Services
                    <ul>
                      <li>Sewing</li>
                      <li>Patching</li>
                      <li>Bonding</li>
                      <li>Sashiko</li>
                      <li>Darning</li>
                    </ul>
                  </li>
                  <li>Other Basic Repair</li>
                </ul>
              </div>
            </div>
            <div class="box">
              <div class="display">
                <img src="Image/woman\'s custom made.jpg" alt="Tailor Services Image 2">
              </div>
              <div class="display">
                <h3>Women\'s Custom Made Tailoring</h3>
                <ul>
                  <li>Blouse</li>
                  <li>Salwar Suit</li>
                  <li>Patiala Suit</li>
                  <li>Pant Suit</li>
                  <li>Baju Kebaya</li>
                  <li>Baju Kurung Moden</li>
                  <li>Baju Kurung Kedah</li>
                  <li>Baju Kurung Pahang</li>
                  <li>Saree Fall Pico</li>
                  <li>Other Women\'s dresses</li>
                </ul>
              </div>
            </div>
            <div class="box">
              <div class="display">
                <img src="Image/men\'s custom made.jpg" alt="Tailor Services Image 3">
              </div>
              <div class="display">
                <h3>Men\'s Custom Made Tailoring</h3>
                <ul>
                  <li>Shirt and Pants</li>
                  <li>Jeans</li>
                  <li>Kurta</li>
                  <li>Trouser</li>
                  <li>Men suits</li>
                  <li>Baju Melayu Teluk Belanga</li>
                  <li>Other Men\'s dresses</li>
                </ul>
              </div>
            </div>',
          
          "spa" => '
            <h2>Spa Services</h2>
            <div class="box">
              <div class="display">
                <img src="Image/facialtreatment.jpg" alt="Spa Services Image 1">
              </div>
              <div class="display">
                <h3>Facial Treatments</h3>
                <ul>
                  <li>Skin analysis</li>
                  <li>Cleansing</li>
                  <li>Mask</li>
                  <li>Toning</li>
                  <li>Hydration</li>
                  <li>Paraffin treatments</li>
                </ul>
              </div>
            </div>
            <div class="box">
              <div class="display">
                <img src="Image/body treatment.jpg" alt="Spa Services Image 2">
              </div>
              <div class="display">
                <h3>Body Treatments</h3>
                <ul>
                  <li>Sauna</li>
                  <li>Steam room</li>
                  <li>Massage</li>
                  <li>Salt scrub</li>
                  <li>Herbal body masks</li>
                  <li>Waxing</li>
                </ul>
              </div>
            </div>
            <div class="box">
              <div class="display">
                <img src="Image/nailservices.jpg" alt="Spa Services Image 3">
              </div>
              <div class="display">
                <h3>Nail Services</h3>
                <ul>
                  <li>Manicures</li>
                  <li>Pedicures</li>
                  <li>Paraffin treatment</li>
                </ul>
              </div>
            </div>'
        ];
        echo $services[$serviceType] ?? '<p>Please select a service type.</p>';
      }
      ?>
    </div>

    <div class="footer">
      <p>Copyright &copy; 2024 F4</p>
    </div>
  </body>
</html>
