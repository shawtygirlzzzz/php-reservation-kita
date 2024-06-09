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
      document.getElementById(id).classList.add('visible');

      var menuItems = document.querySelectorAll('nav ul li');
      menuItems.forEach(function(item) {
        item.classList.remove('active');
      });

      document.querySelector('nav ul li a[href="javascript:showSection(\'' + id + '\')"]').parentNode.classList.add('active');
    }

    window.onload = function() {
      var currentSection = "<?php echo isset($_SESSION['current_section']) ? $_SESSION['current_section'] : 'approval'; ?>";
      showSection(currentSection);
    }

    
    function handleAction(action, name, section) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "admin.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            // Remove the row if action is approve or reject
            if (action === 'approve' || action === 'reject') {
                document.querySelector(`tr[data-name="${name}"]`).style.display = 'none';
            }
            // Remove the row if action is done
            if (action === 'done') {
                document.querySelector(`tr[data-name="${name}"]`).style.display = 'none';
            }
        }
    };

    xhr.send(`action=${action}&name=${name}&section=${section}`);
}


  </script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $name = $_POST['name'];

    if ($action === 'approve') {
        echo "Tailor $name approved and notification sent.";
    } elseif ($action === 'reject') {
        echo "Tailor $name rejected and notification sent.";
    } elseif ($action === 'done') {
        echo "Request from $name has been completed.";
    }
    exit;
}
?>


</head>
<body>
  <header>
    <h1 class="logo">F4</h1>
    <nav>
      <ul>
        <li><a href="javascript:showSection('approval')">Approval</a></li>
        <li><a href="javascript:showSection('responses')">Responses</a></li>
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
        <tr data-name="John Doe">
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
            <button class="button" onclick="handleAction('approve', 'John Doe', 'approval')">Approve</button>
            <button class="button" onclick="handleAction('reject', 'John Doe', 'approval')">Reject</button>
          </td>
        </tr>
        <tr data-name="Jane Smith">
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
            <button class="button" onclick="handleAction('approve', 'Jane Smith', 'approval')">Approve</button>
            <button class="button" onclick="handleAction('reject', 'Jane Smith', 'approval')">Reject</button>
          </td>
        </tr>
        <!-- Add other rows similarly -->
        <tr>
          <td>Emily Brown</td>
          <td>789 Maple Ave, Villageville</td>
          <td>emily.brown@example.com</td>
          <td>+1122334455</td>
          <td>Brown Tailoring</td>
          <td>8:00 AM</td>
          <td>4:00 PM</td>
          <td><a href="qualifications/emily_brown.pdf" class = "button">Download</a></td>
          <td>Advanced Tailoring Certificate from DEF School</td>
          <td>
            <button class = "button" onclick="approveTailor(this)">Approve</button>
            <button class = "button" onclick="rejectTailor(this)">Reject</button>
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
          <td><a href="qualifications/michael_white.pdf" class = "button">Download</a></td>
          <td>Certificate in Advanced Tailoring Techniques from GHI Institute</td>
          <td>
            <button class = "button" onclick="approveTailor(this)">Approve</button>
            <button class = "button" onclick="rejectTailor(this)">Reject</button>
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
          <td><a href="qualifications/sarah_green.pdf" class = "button">Download</a></td>
          <td>Diploma in Tailoring from JKL College</td>
          <td>
            <button class = "button" onclick="approveTailor(this)">Approve</button>
            <button class = "button" onclick="rejectTailor(this)">Reject</button>
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
        <tr data-name="Alex Johnson">
          <td>Alex Johnson</td>
          <td>+4455667788</td>
          <td>alex.johnson@example.com</td>
          <td>I have a query about the tailoring services.</td>
          <td>
            <button class="button" onclick="handleAction('done', 'Alex Johnson', 'responses')">Done</button>
          </td>
        </tr>
        <tr data-name="Laura Wilson">
          <td>Laura Wilson</td>
          <td>+5566778899</td>
          <td>laura.wilson@example.com</td>
          <td>Can you tailor wedding dresses?</td>
          <td>
            <button class="button" onclick="handleAction('done', 'Laura Wilson', 'responses')">Done</button>
          </td>
        </tr>
        <!-- Add other rows similarly -->
        <tr>
          <td>Chris Martin</td>
          <td>+6677889900</td>
          <td>chris.martin@example.com</td>
          <td>What are your operating hours?</td>
          <td><button class = "button" onclick="done(this)">Done</button></td>
        </tr>
        <tr>
          <td>Megan Lee</td>
          <td>+7788990011</td>
          <td>megan.lee@example.com</td>
          <td>How long does it take to tailor a suit?</td>
          <td><button class = "button" onclick="done(this)">Done</button></td>
        </tr>
        <tr>
          <td>David Kim</td>
          <td>+8899001122</td>
          <td>david.kim@example.com</td>
          <td>Do you provide alteration services?</td>
          <td><button class = "button" onclick="done(this)">Done</button></td>
        </tr>
      </tbody>
    </table>
  </section>
</body>
</html>
