<?php
session_start(); // Start session to store TUsername

include('connection.php');

// Function to normalize text for session key
function normalizeText($text) {
    return strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $text));
}

// Clear existing store session data if requested
if (isset($_GET['clear']) && $_GET['clear'] == 'true') {
    $_SESSION = array(); // Clear all session variables
}

// Process form submission if any
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission here if needed
    // Example:
    // if (isset($_POST['submit'])) {
    //     // Handle form data
    // }
}

$sql = "SELECT t.*, GROUP_CONCAT(DISTINCT sp.Name SEPARATOR ', ') AS ServiceNames, 
                GROUP_CONCAT(DISTINCT st.Name SEPARATOR ', ') AS ServiceTypes
                FROM tailor t
                LEFT JOIN servicedetails sd ON t.TUsername = sd.TUsername
                LEFT JOIN serviceprovided sp ON sd.ServiceID = sp.ServiceID
                LEFT JOIN servicetype st ON sd.TypeID = st.TypeID
                WHERE t.Status = 'verified' 
                GROUP BY t.TUsername";

$result = $conn->query($sql);

// Clear session data for old stores if any
foreach ($_SESSION as $key => $value) {
    if (strpos($key, 'store_') === 0) {
        unset($_SESSION[$key]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailor Kita Stores</title>
    <link rel="stylesheet" href="storeSearching.css">
</head>
<body>
    <header id="header">
        <h1>F4</h1>
        <nav>
            <ul>
                <li style="color: red;"><a href="storeSearching.php">Stores</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
        <div class="contact">
            <a href="https://wa.me/qr/DMJ2DG5J7LDUF1">
                <img src="image/whatsapp.png" alt="WhatsApp" style="height:20px; width:20px; margin-right:5px;">
                +60103344971
            </a>
            <a href="customerProfile.php">
                <img src="image/loginaccount.png" alt="Login" style="height:20px; width:20px; margin-left:5px;">
            </a>
        </div>
    </header>
    <br>
    <form id="filter-form">
        <div class="filters">
            <details>
                <summary>Services Provided</summary>
                <div id="services-required">
                <label><input type="checkbox" name="services-required[]" value="Blouses Kids"> Blouses Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Blouses Adult"> Blouses Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Skirt Kids"> Skirt Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Skirt Adult"> Skirt Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Baju Kebaya Kids"> Baju Kebaya Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Baju Kebaya Adult"> Baju Kebaya Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Baju Kurung Kids"> Baju Kurung Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Baju Kurung Adult"> Baju Kurung Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Cheongsam/Qipao Kids"> Cheongsam/Qipao Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Cheongsam/Qipao Adult"> Cheongsam/Qipao Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Saree Blouses Kids"> Saree Blouses Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Saree Blouses Adult"> Saree Blouses Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Jeans Kids"> Jeans Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Jeans Adult"> Jeans Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Baju Melayu Kids"> Baju Melayu Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Baju Melayu Adult"> Baju Melayu Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="T-shirts Kids"> T-shirts Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="T-shirts Adult"> T-shirts Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Polo Shirts Kids"> Polo Shirts Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Polo Shirts Adult"> Polo Shirts Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Shorts Kids"> Shorts Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Shorts Adult"> Shorts Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Uniforms Kids"> Uniforms Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Uniforms Adult"> Uniforms Adult</label>
                    <label><input type="checkbox" name="services-required[]" value="Costumes Kids"> Costumes Kids</label>
                    <label><input type="checkbox" name="services-required[]" value="Costumes Adult"> Costumes Adult</label>
                </div>
            </details>
            <details>
                <summary>Location</summary>
                <div id="location-filter">
                    <input type="text" name="location" id="location-input" placeholder="Enter location">
                </div>
            </details>
        </div>
    </form>

    <div class="store-list">
    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $storeName = isset($row['StoreName']) ? htmlspecialchars($row['StoreName']) : 'Store Name Not Available';
            $address = isset($row['Address']) ? htmlspecialchars($row['Address']) : 'Address Not Available';
            $ranking = isset($row['Ranking']) ? htmlspecialchars($row['Ranking']) : 0;
            $serviceNames = isset($row['ServiceNames']) ? htmlspecialchars($row['ServiceNames']) : 'No services';
            $serviceTypes = isset($row['ServiceTypes']) ? htmlspecialchars($row['ServiceTypes']) : 'No service types';
            $location = isset($row['Location']) ? htmlspecialchars($row['Location']) : '';

            // Store TUsername and other details in session
            $_SESSION['store_' . normalizeText($storeName)] = [
                'TUsername' => isset($row['TUsername']) ? $row['TUsername'] : '',
                'StoreName' => $storeName,
                'Address' => $address,
                'Ranking' => $ranking,
                'ServiceNames' => $serviceNames,
                'ServiceTypes' => $serviceTypes,
                'Location' => $location
            ];

            echo '<div class="store Tailor" data-service="' . htmlspecialchars($serviceNames) . '" data-location="' . htmlspecialchars($location) . '" data-storename="' . htmlspecialchars($storeName) . '" data-address="' . htmlspecialchars($address) . '" data-ranking="' . htmlspecialchars($ranking) . '">';
            echo '<h2>' . $storeName . '</h2>';
            echo '<p>' . $address . '</p>';
            echo '<p>Rating: ' . $ranking . '<img src="image/star.png" style="height:15px; width:15px;"></p>';
            echo '<p>Types of Services: ' . $serviceTypes . '</p>';
            echo '<ul>';
            foreach (explode(', ', $serviceNames) as $service) {
                echo '<li>' . htmlspecialchars($service) . '</li>';
            }
            echo '</ul>';
            echo '<button class="book-appointment-button" data-storename="' . htmlspecialchars($storeName) . '">Book Appointment</button>';
            echo '</div>';
        }
    } else {
        echo '<p>Sorry, no shops are available.</p>';
    }

    $conn->close();
    ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const servicesRequired = document.querySelectorAll('input[name="services-required[]"]');
            const locationInput = document.querySelector('#location-input');
            const allStores = document.querySelectorAll('.store');
            const bookButtons = document.querySelectorAll('.book-appointment-button');

            function normalizeText(text) {
                return text.toLowerCase().replace(/\s+/g, '').replace(/[^a-z0-9]/g, '');
            }

            function updateStoreList() {
                const selectedServicesRequired = Array.from(servicesRequired).filter(checkbox => checkbox.checked).map(checkbox => normalizeText(checkbox.value));
                const locationQuery = normalizeText(locationInput.value);

                let visibleStores = 0;

                allStores.forEach(store => {
                    const storeServices = store.dataset.service.split(', ').map(service => normalizeText(service));
                    const storeAddress = normalizeText(store.dataset.address);

                    const isServiceRequiredMatch = selectedServicesRequired.length === 0 || selectedServicesRequired.some(service => storeServices.includes(service));
                    const isLocationMatch = locationQuery === '' || storeAddress.includes(locationQuery);

                    if (isServiceRequiredMatch && isLocationMatch) {
                        store.style.display = 'block';
                        visibleStores++;
                    } else {
                        store.style.display = 'none';
                    }
                });

                const storeListDiv = document.querySelector('.store-list');
                if (visibleStores === 0) {
                    storeListDiv.innerHTML = '<p>Sorry, no shops are available.</p>';
                }
            }

            servicesRequired.forEach(checkbox => checkbox.addEventListener('change', updateStoreList));
            locationInput.addEventListener('input', updateStoreList);

            updateStoreList();

            bookButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const storeName = this.getAttribute('data-storename');

                    // Retrieve details from session based on storeName
                    const storeDetails = <?php echo json_encode($_SESSION['store_' . normalizeText($storeName)]); ?>;
                    const TUsername = storeDetails.TUsername;
                    const address = storeDetails.Address;
                    const ranking = storeDetails.Ranking;
                    const services = storeDetails.ServiceNames;
                    const location = storeDetails.Location;

                    const url = `tailorStore.php?storename=${encodeURIComponent(storeName)}&address=${encodeURIComponent(address)}&ranking=${encodeURIComponent(ranking)}&services=${encodeURIComponent(services)}&location=${encodeURIComponent(location)}&TUsername=${encodeURIComponent(TUsername)}`;
                    window.location.href = url;
                });
            });
        });
    </script>
</body>
</html>
