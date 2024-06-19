<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="admin.css">

  <script>
    function approveTailor(button) {
      var row = button.parentNode.parentNode;
      row.style.display = 'none';
      // Add logic to update status and send notification here
      alert('Tailor approved and notification sent.');
    }

    function rejectTailor(button) {
      var row = button.parentNode.parentNode;
      row.parentNode.removeChild(row);
      // Add logic to drop row and send notification here
      alert('Tailor rejected and notification sent.');
    }

    function done(button) {
      var row = button.parentNode.parentNode;
      row.style.display = 'none';
      // Add logic to update status and send notification here
      alert('The request has been completed');
    }

    function showSection(id) {
      document.getElementById('approval').classList.remove('visible');
      document.getElementById('responses').classList.remove('visible');
      document.getElementById('tables').classList.remove('visible');
      document.getElementById(id).classList.add('visible');

      // Remove 'active' class from all menu items
      var menuItems = document.querySelectorAll('nav ul li');
      menuItems.forEach(function(item) {
          item.classList.remove('active');
      });

      // Add 'active' class to the clicked menu item
      document.querySelector('nav ul li a[href="javascript:showSection(\'' + id + '\')"]').parentNode.classList.add('active');
    }

    function showTable(table) {
      document.getElementById('serviceProvidedTable').style.display = 'none';
      document.getElementById('reservationTable').style.display = 'none';
      document.getElementById(table).style.display = 'table';
    }

    function showTable(tableId) {
      var serviceProvidedTable = document.getElementById('serviceProvidedTable');
      var reservationTable = document.getElementById('reservationTable');

      if (tableId === 'serviceProvidedTable') {
        serviceProvidedTable.style.display = '';
        reservationTable.style.display = 'none';
      } else {
        serviceProvidedTable.style.display = 'none';
        reservationTable.style.display = '';
      }
    }
  </script>
</head>
<body>

    <header>
        <h1 class="logo">F4</h1>

        <nav>
            <ul>
              <li><a href="javascript:showSection('approval')">Approval</a></li>
              <li><a href="javascript:showSection('responses')">Responses</a></li>
              <li><a href="javascript:showSection('tables')">Tables</a></li>
            </ul>
          </nav>

        <div class="contact">
            <a href="login.html">
                <img src="image/loginaccount.png" alt="Login" style="height:20px; width:20px; margin-left:5px;">
            </a>
        </div>
    </header>

  <section id="approval" class="visible">
    <h2 class="title">Pending Approvals</h2>
    <table>
      <thead>
        <tr>
          <th>Tailor Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Name of Store</th>
          <th>Operating Hours (Start)</th>
          <th>Operating Hours (End)</th>
          <th>Proof of Qualifications</th>
          <th>Description of Proof of Qualifications</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example rows -->
        <tr>
          <td>John Doe</td>
          <td>123 Main St, Cityville</td>
          <td>john.doe@example.com</td>
          <td>+1234567890</td>
          <td>Doe Tailoring</td>
          <td>9:00 AM</td>
          <td>5:00 PM</td>
          <td><a href="qualifications/john_doe.pdf" class="button">Download</a></td>
          <td>Certificate in Tailoring from XYZ Institute</td>
          <td>
            <button class="button" onclick="approveTailor(this)">Approve</button>
            <button class="button" onclick="rejectTailor(this)">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Jane Smith</td>
          <td>456 Elm St, Townsville</td>
          <td>jane.smith@example.com</td>
          <td>+0987654321</td>
          <td>Smith Tailoring</td>
          <td>10:00 AM</td>
          <td>6:00 PM</td>
          <td><a href="qualifications/jane_smith.pdf" class="button">Download</a></td>
          <td>Diploma in Fashion Design from ABC Academy</td>
          <td>
            <button class="button" onclick="approveTailor(this)">Approve</button>
            <button class="button" onclick="rejectTailor(this)">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Emily Brown</td>
          <td>789 Maple Ave, Villageville</td>
          <td>emily.brown@example.com</td>
          <td>+1122334455</td>
          <td>Brown Tailoring</td>
          <td>8:00 AM</td>
          <td>4:00 PM</td>
          <td><a href="qualifications/emily_brown.pdf" class="button">Download</a></td>
          <td>Advanced Tailoring Certificate from DEF School</td>
          <td>
            <button class="button" onclick="approveTailor(this)">Approve</button>
            <button class="button" onclick="rejectTailor(this)">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Michael White</td>
          <td>1010 Pine St, Hamletville</td>
          <td>michael.white@example.com</td>
          <td>+2233445566</td>
          <td>White Tailoring</td>
          <td>11:00 AM</td>
          <td>7:00 PM</td>
          <td><a href="qualifications/michael_white.pdf" class="button">Download</a></td>
          <td>Certificate in Advanced Tailoring Techniques from GHI Institute</td>
          <td>
            <button class="button" onclick="approveTailor(this)">Approve</button>
            <button class="button" onclick="rejectTailor(this)">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Sarah Green</td>
          <td>2020 Oak St, Boroughville</td>
          <td>sarah.green@example.com</td>
          <td>+3344556677</td>
          <td>Green Tailoring</td>
          <td>7:00 AM</td>
          <td>3:00 PM</td>
          <td><a href="qualifications/sarah_green.pdf" class="button">Download</a></td>
          <td>Diploma in Tailoring from JKL College</td>
          <td>
            <button class="button" onclick="approveTailor(this)">Approve</button>
            <button class="button" onclick="rejectTailor(this)">Reject</button>
          </td>
        </tr>
      </tbody>
    </table>
  </section>

  <section id="responses">
    <h2 class="title">Responses from Contact Us Form</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Contact Number</th>
          <th>Email</th>
          <th>Message</th>
          <th>Processing Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Placeholder for contact messages -->
        <tr>
          <td>Alex Johnson</td>
          <td>+4455667788</td>
          <td>alex.johnson@example.com</td>
          <td>I have a query about the tailoring services.</td>
          <td><button class="button" onclick="done(this)">Done</button></td>
        </tr>
        <tr>
          <td>Laura Wilson</td>
          <td>+5566778899</td>
          <td>laura.wilson@example.com</td>
          <td>Can you tailor wedding dresses?</td>
          <td><button class="button" onclick="done(this)">Done</button></td>
        </tr>
        <tr>
          <td>Chris Martin</td>
          <td>+6677889900</td>
          <td>chris.martin@example.com</td>
          <td>What are your operating hours?</td>
          <td><button class="button" onclick="done(this)">Done</button></td>
        </tr>
        <tr>
          <td>Megan Lee</td>
          <td>+7788990011</td>
          <td>megan.lee@example.com</td>
          <td>How long does it take to tailor a suit?</td>
          <td><button class="button" onclick="done(this)">Done</button></td>
        </tr>
        <tr>
          <td>David Kim</td>
          <td>+8899001122</td>
          <td>david.kim@example.com</td>
          <td>Do you provide alteration services?</td>
          <td><button class="button" onclick="done(this)">Done</button></td>
        </tr>
      </tbody>
    </table>
  </section>

  <section id="tables">
    <h2 class="title">Tables</h2>
    <div class = "title">
      <label for="tableSelect">Choose a table:</label>
    <select id="tableSelect" onchange="showTable(this.value)">
      <option value="serviceProvidedTable">Service Provided</option>
      <option value="reservationTable">Reservation</option>
    </select>
  </div>
  
    <table id="serviceProvidedTable">
      <thead>
        <tr>
          <th>ServiceID</th>
          <th>Name</th>
          <th>Description</th>
          <th>TypeID</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>SP001</td>
          <td>Blouses Kids</td>
          <td>Blouses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP002</td>
          <td>Blouses Adult</td>
          <td>Blouses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP003</td>
          <td>Pencil Skirt Kids</td>
          <td>Skirts</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP004</td>
          <td>Pencil Skirt Adult</td>
          <td>Skirts</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP005</td>
          <td>Mini Skirt Kids</td>
          <td>Skirts</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP006</td>
          <td>Mini Skirt Adult</td>
          <td>Skirts</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP007</td>
          <td>Maxi Dresses Kids</td>
          <td>Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP008</td>
          <td>Maxi Dresses Adult</td>
          <td>Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP009</td>
          <td>Mini Dresses Kids</td>
          <td>Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP010</td>
          <td>Mini Dresses Adult</td>
          <td>Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP011</td>
          <td>Baju Kebaya Kids</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP012</td>
          <td>Baju Kebaya Adult</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP013</td>
          <td>Baju Kurung (Moden, Kedah, Pahang) Kids</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP014</td>
          <td>Baju Kurung (Moden, Kedah, Pahang) Adult</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP015</td>
          <td>Cheongsam/Qipao Kids</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP016</td>
          <td>Cheongsam/Qipao Adult</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP017</td>
          <td>Saree Blouses Kids</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP018</td>
          <td>Saree Blouses Adult</td>
          <td>Traditional Dresses</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP019</td>
          <td>Blazers Kids</td>
          <td>Jackets and Coats</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP020</td>
          <td>Blazers Adult</td>
          <td>Jackets and Coats</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP021</td>
          <td>Winter Coats Kids</td>
          <td>Jackets and Coats</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP022</td>
          <td>Winter Coats Adult</td>
          <td>Jackets and Coats</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP023</td>
          <td>Maternity Wear</td>
          <td>Maternity Wear</td>
          <td>ST001</td>
        </tr>
        <tr>
          <td>SP024</td>
          <td>Casual Shirts Kids</td>
          <td>Shirts</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP025</td>
          <td>Casual Shirts Adult</td>
          <td>Shirts</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP026</td>
          <td>Dress Pants Kids</td>
          <td>Pants</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP027</td>
          <td>Dress Pants Adult</td>
          <td>Pants</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP028</td>
          <td>Casual Pants Kids</td>
          <td>Pants</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP029</td>
          <td>Casual Pants Adult</td>
          <td>Pants</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP030</td>
          <td>Jeans Kids</td>
          <td>Pants</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP031</td>
          <td>Jeans Adult</td>
          <td>Pants</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP032</td>
          <td>Baju Melayu (Teluk Belanga, Cekak Musang) Kids</td>
          <td>Traditional Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP033</td>
          <td>Baju Melayu (Teluk Belanga, Cekak Musang) Adult</td>
          <td>Traditional Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP034</td>
          <td>Kurta Kids</td>
          <td>Traditional Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP035</td>
          <td>Kurta Adult</td>
          <td>Traditional Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP036</td>
          <td>Dhoti Kids</td>
          <td>Traditional Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP037</td>
          <td>Dhoti Adult</td>
          <td>Traditional Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP038</td>
          <td>Blazers Kids</td>
          <td>Jackets and Coats</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP039</td>
          <td>Blazers Adult</td>
          <td>Jackets and Coats</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP040</td>
          <td>Sport Coats Kids</td>
          <td>Jackets and Coats</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP041</td>
          <td>Sport Coats Adult</td>
          <td>Jackets and Coats</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP042</td>
          <td>T-shirts Kids</td>
          <td>Casual Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP043</td>
          <td>T-shirts Adult</td>
          <td>Casual Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP044</td>
          <td>Polo Shirts Kids</td>
          <td>Casual Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP045</td>
          <td>Polo Shirts Adult</td>
          <td>Casual Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP046</td>
          <td>Shorts Kids</td>
          <td>Casual Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP047</td>
          <td>Shorts Adult</td>
          <td>Casual Wear</td>
          <td>ST002</td>
        </tr>
        <tr>
          <td>SP048</td>
          <td>Uniforms Kids</td>
          <td>Other Custom Clothing</td>
          <td>ST003</td>
        </tr>
        <tr>
          <td>SP049</td>
          <td>Uniforms Adult</td>
          <td>Other Custom Clothing</td>
          <td>ST003</td>
        </tr>
        <tr>
          <td>SP050</td>
          <td>Costumes Kids</td>
          <td>Other Custom Clothing</td>
          <td>ST003</td>
        </tr>
        <tr>
          <td>SP051</td>
          <td>Costumes Adult</td>
          <td>Other Custom Clothing</td>
          <td>ST003</td>
        </tr>
      </tbody>
    </table>

    <table id="reservationTable" style="display:none;">
      <thead>
        <tr>
          <th>Confirmation No</th>
          <th>Name</th>
          <th>Contact No</th>
          <th>Preferred Date</th>
          <th>Preferred Time</th>
          <th>Address</th>
          <th>Description</th>
          <th>Status</th>
          <th>CUsername</th>
          <th>TUsername</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>R001</td>
          <td>Aliah Rafhana binti Mas Irwan</td>
          <td>0134765331</td>
          <td>23/04/2024</td>
          <td>15:30</td>
          <td>10 Jalan Ampang, Kuala Lumpur</td>
          <td>Women’s Custom Made Tailoring , Baju Kebaya Adult – RM 70.00, Height: 150, Weight: 40, Please prepare 5 metres long of cloth, measurements will be done on the meeting date.</td>
          <td>In progress</td>
          <td>aliah</td>
          <td>tansiew</td>
        </tr>
        <tr>
          <td>R002</td>
          <td>Lian Payne</td>
          <td>0123344765</td>
          <td>13/10/2024</td>
          <td>16:30</td>
          <td>20 Jalan Tun Razak, Johor Bahru</td>
          <td>Women’s Custom Made Tailoring, Mini Dresses Adult – RM 50.00, Height: 160, Weight: 50, Please prepare 5 metres long of cloth, measurements will be done on the meeting date.</td>
          <td>Completed</td>
          <td>lianpayne</td>
          <td>tansiew</td>
        </tr>
        <tr>
          <td>R003</td>
          <td>Vashika a/l Pushparajoo</td>
          <td>0113217654</td>
          <td>16/05/2024</td>
          <td>08:30</td>
          <td>30 Jalan Tun Fatimah, Melaka</td>
          <td>Men’s Custom Made Tailoring, Jeans Adult – RM 30.00, Height: 175, Weight: 75, Additional Services: Sulam, Please prepare 7 metres long of cloth, measurements will be done on the meeting date.</td>
          <td>Completed</td>
          <td>vashika</td>
          <td>ravikumar</td>
        </tr>
      </tbody>
    </table>
  </section>
</body>
</html>
