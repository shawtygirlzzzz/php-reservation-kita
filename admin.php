<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css">

    <script>
        function approveTailor(button, id) {
            var row = button.parentNode.parentNode;
            row.style.display = 'none';
            // Send AJAX request to update status
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updatestatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert('Tailor approved and notification sent.');
                }
            };
            xhr.send("id=" + id + "&action=approve");
        }

        function rejectTailor(button, id) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            // Send AJAX request to update status
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updatestatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert('Tailor rejected and notification sent.');
                }
            };
            xhr.send("id=" + id + "&action=reject");
        }

        function done(button, id) {
            var row = button.parentNode.parentNode;
            row.style.display = 'none';
            // Send AJAX request to update status
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updatestatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert('The request has been completed');
                }
            };
            xhr.send("id=" + id + "&action=done");
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
        <?php
        $sql = "SELECT * FROM tailor WHERE status = 'Pending'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['StoreName'] . "</td>";
                echo "<td>" . $row['StartTime'] . "</td>";
                echo "<td>" . $row['EndTime'] . "</td>";
                echo "<td><a href='qualifications/" . $row['QualifyFile'] . "' class='button'>Download</a></td>";
                echo "<td>" . $row['QualifyDes'] . "</td>";
                echo "<td>";
                echo "<button class='button' onclick='approveTailor(this, " . $row['TUsername'] . ")'>Approve</button>";
                echo "<button class='button' onclick='rejectTailor(this, " . $row['TUsername'] . ")'>Reject</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No pending approvals</td></tr>";
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
        $sql = "SELECT * FROM contactus WHERE status = 'Pending'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['ContactNo'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Message'] . "</td>";
                echo "<td><button class='button' onclick='done(this, " . $row['ContactID'] . ")'>Done</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No responses</td></tr>";
        }
        ?>
        </tbody>
    </table>
</section>

<section id="tables">
    <h2 class="title">Tables</h2>
    <div class="title">
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
        <?php
        $sql = "SELECT * FROM serviceprovided";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ServiceID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Description'] . "</td>";
                echo "<td>" . $row['TypeID'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No services provided</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <table id="reservationTable" style="display: none;">
        <thead>
        <tr>
            <th>ReservationID</th>
            <th>CustomerName</th>
            <th>Contanct Number</th>
            <th>Reservation Date</th>
            <th>Reservation Time</th>
            <th>Address</th>
            <th>Description</th>
            <th>Status</th>
            <th>Customer Username</th>
            <th>Tailor Username</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM reservation";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ConfirmationNo'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['ContactNo'] . "</td>";
                echo "<td>" . $row['PreferredDate'] . "</td>";
                echo "<td>" . $row['PreferredTime'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['Description'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "<td>" . $row['CUsername'] . "</td>";
                echo "<td>" . $row['TUsername'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No reservations</td></tr>";
        }
        ?>
        </tbody>
    </table>
</section>

<footer>
    <p>&copy; 2023 F4. All rights reserved.</p>
</footer>
</body>
</html>
