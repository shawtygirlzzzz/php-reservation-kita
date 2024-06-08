<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="admin.css">
  <script>
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
  </script>
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
        <?php
        // Example data
        $tailors = [
          ["John Doe", "123 Main St, Cityville", "john.doe@example.com", "+1234567890", "Doe Tailoring", "9:00 AM", "5:00 PM", "qualifications/john_doe.pdf", "Certificate in Tailoring from XYZ Institute"],
          ["Jane Smith", "456 Elm St, Townsville", "jane.smith@example.com", "+0987654321", "Smith Tailoring", "10:00 AM", "6:00 PM", "qualifications/jane_smith.pdf", "Diploma in Fashion Design from ABC Academy"],
          ["Emily Brown", "789 Maple Ave, Villageville", "emily.brown@example.com", "+1122334455", "Brown Tailoring", "8:00 AM", "4:00 PM", "qualifications/emily_brown.pdf", "Advanced Tailoring Certificate from DEF School"],
          ["Michael White", "1010 Pine St, Hamletville", "michael.white@example.com", "+2233445566", "White Tailoring", "11:00 AM", "7:00 PM", "qualifications/michael_white.pdf", "Certificate in Advanced Tailoring Techniques from GHI Institute"],
          ["Sarah Green", "2020 Oak St, Boroughville", "sarah.green@example.com", "+3344556677", "Green Tailoring", "7:00 AM", "3:00 PM", "qualifications/sarah_green.pdf", "Diploma in Tailoring from JKL College"],
        ];

        foreach ($tailors as $tailor) {
          echo "<tr>
            <td>{$tailor[0]}</td>
            <td>{$tailor[1]}</td>
            <td>{$tailor[2]}</td>
            <td>{$tailor[3]}</td>
            <td>{$tailor[4]}</td>
            <td>{$tailor[5]}</td>
            <td>{$tailor[6]}</td>
            <td><a href='{$tailor[7]}' class='button'>Download</a></td>
            <td>{$tailor[8]}</td>
            <td>
              <form method='post' action=''>
                <input type='hidden' name='tailor_name' value='{$tailor[0]}'>
                <button class='button' name='action' value='approve'>Approve</button>
                <button class='button' name='action' value='reject'>Reject</button>
              </form>
            </td>
          </tr>";
        }
        ?>
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
        <?php
        // Example data
        $responses = [
          ["Alex Johnson", "+4455667788", "alex.johnson@example.com", "I have a query about the tailoring services."],
          ["Laura Wilson", "+5566778899", "laura.wilson@example.com", "Can you tailor wedding dresses?"],
          ["Chris Martin", "+6677889900", "chris.martin@example.com", "What are your operating hours?"],
          ["Megan Lee", "+7788990011", "megan.lee@example.com", "How long does it take to tailor a suit?"],
          ["David Kim", "+8899001122", "david.kim@example.com", "Do you provide alteration services?"],
        ];

        foreach ($responses as $response) {
          echo "<tr>
            <td>{$response[0]}</td>
            <td>{$response[1]}</td>
            <td>{$response[2]}</td>
            <td>{$response[3]}</td>
            <td>
              <form method='post' action=''>
                <input type='hidden' name='response_name' value='{$response[0]}'>
                <button class='button' name='action' value='done'>Done</button>
              </form>
            </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </section>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'approve') {
      $tailor_name = $_POST['tailor_name'];
      echo "<script>alert('Tailor $tailor_name approved and notification sent.');</script>";
    } elseif ($action === 'reject') {
      $tailor_name = $_POST['tailor_name'];
      echo "<script>alert('Tailor $tailor_name rejected and notification sent.');</script>";
    } elseif ($action === 'done') {
      $response_name = $_POST['response_name'];
      echo "<script>alert('Request from $response_name has been completed.');</script>";
    }
  }
  ?>
</body>
</html>
