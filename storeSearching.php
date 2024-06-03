<!DOCTYPE html>
<html>
    <head>
        <title>Tailor Kita Stores</title>
        <link rel="stylesheet" href="storeSearching.css">
    </head>
    <body>
        <header>
            <h1>F4</h1>
            <nav>
                <ul>
                    <li style="color: red;"><a href="storeSearching.php" style="color: red;">Stores</a></li>
                    <li><a href="service.php">Services</a></li>
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
        </header>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="filters">
                <label for="types-of-services">Types of Services
                    <select id="types-of-services" name="types-of-services" onchange="this.form.submit()">
                        <option value="">Select a Service</option>
                        <option value="Medical" <?php if(isset($_POST['types-of-services']) && $_POST['types-of-services'] == 'Medical') echo 'selected'; ?>>Medical</option>
                        <option value="Spa" <?php if(isset($_POST['types-of-services']) && $_POST['types-of-services'] == 'Spa') echo 'selected'; ?>>Spa</option>
                        <option value="Tailor" <?php if(isset($_POST['types-of-services']) && $_POST['types-of-services'] == 'Tailor') echo 'selected'; ?>>Tailor</option>
                    </select>
                </label>
                <label for="services-required">Services Required
                    <select id="services-required" name="services-required" onchange="this.form.submit()" <?php if(!isset($_POST['types-of-services']) || empty($_POST['types-of-services'])) echo 'disabled'; ?>>
                        <option value="" disabled selected>Select a Service Required</option>
                        <?php
                        if(isset($_POST['types-of-services']) && !empty($_POST['types-of-services'])) {
                            $services = [
                                'Medical' => [
                                    'Vaccinations' => ['Hepatitis A', 'Hepatitis B', 'Rabies', 'Rotavirus', 'Chickenpox', 'HPV', 'Tetanus'],
                                    'Laboratory Testing' => ['Blood test', 'Urine test'],
                                    'Screening and Treatment' => ['High cholesterol', 'High blood pressure', 'Diabetes'],
                                    'Specialized Treatment' => ['Cardiology', 'Dermatology', 'Dentistry', 'ENT', 'Physical therapy']
                                ],
                                'Spa' => [
                                    'Facial Treatment' => ['Skin analysis', 'Cleansing', 'Mask', 'Toning', 'Hydration', 'Paraffin treatments'],
                                    'Body Treatment' => ['Sauna', 'Steam room', 'Massage', 'Salt scrub', 'Herbal body masks', 'Waxing'],
                                    'Nail Services' => ['Manicures', 'Pedicures', 'Paraffin treatment']
                                ],
                                'Tailor' => [
                                    'Repairs/Alterations' => ['Shortening', 'Hemming', 'Cuffs', 'Mending Services', 'Sewing', 'Patching', 'Bonding', 'Sashiko', 'Darning', 'Other Basic Repair'],
                                    'Women\'s Custom Made Tailoring' => ['Blouse', 'Salwar Suit', 'Patiala Suit', 'Pant Suit', 'Baju Kebaya', 'Baju Kurung Moden', 'Baju Kurung Kedah', 'Baju Kurung Pahang', 'Saree Fall Pico', 'Other Women\'s dresses'],
                                    'Men\'s Custom Made Tailoring' => ['Shirt and Pants', 'Jeans', 'Kurta', 'Trouser', 'Men suits', 'Baju Melayu Teluk Belanga', 'Other Men\'s dresses']
                                ]
                            ];

                            $selectedType = $_POST['types-of-services'];
                            foreach($services[$selectedType] as $service => $details) {
                                $value = strtolower(str_replace(' ', '', $service));
                                echo "<option value=\"$value\"";
                                if(isset($_POST['services-required']) && $_POST['services-required'] == $value) echo ' selected';
                                echo ">$service</option>";
                            }
                        }
                        ?>
                    </select>
                </label>
                <label for="location">Location
                    <select id="location" name="location" onchange="this.form.submit()">
                        <option value="">Select a Location</option>
                        <option value="Ayer Keroh" <?php if(isset($_POST['location']) && $_POST['location'] == 'Ayer Keroh') echo 'selected'; ?>>Ayer Keroh</option>
                        <option value="Durian Tunggal" <?php if(isset($_POST['location']) && $_POST['location'] == 'Durian Tunggal') echo 'selected'; ?>>Durian Tunggal</option>
                        <option value="Batu Berendam" <?php if(isset($_POST['location']) && $_POST['location'] == 'Batu Berendam') echo 'selected'; ?>>Batu Berendam</option>
                        <option value="Bukit Katil" <?php if(isset($_POST['location']) && $_POST['location'] == 'Bukit Katil') echo 'selected'; ?>>Bukit Katil</option>
                        <option value="Cheng" <?php if(isset($_POST['location']) && $_POST['location'] == 'Cheng') echo 'selected'; ?>>Cheng</option>
                        <option value="Masjid Tanah" <?php if(isset($_POST['location']) && $_POST['location'] == 'Masjid Tanah') echo 'selected'; ?>>Masjid Tanah</option>
                        <option value="Bandaraya Melaka" <?php if(isset($_POST['location']) && $_POST['location'] == 'Bandaraya Melaka') echo 'selected'; ?>>Bandaraya Melaka</option>
                    </select>
                </label>
            </div>
        </form>

        <div class="store-list">
            <?php
            $stores = [
                [
                    'name' => 'Fairytale Tailor Shop',
                    'address' => '7, Jalan Komersial TAKH 2, Taman Ayer Keroh Heights, 76450 Ayer Keroh, Melaka',
                    'rating' => '⭐⭐⭐⭐☆ (12 reviews)',
                    'services' => ['Women\'s Custom Made Tailoring', 'Men\'s Custom Made Tailoring', 'Repairs/Alterations'],
                    'serviceType' => 'Tailor',
                    'location' => 'Ayer Keroh'
                ],
                [
                    'name' => 'HealthPlus Family Clinic',
                    'address' => '20, Jalan Medika 5, Bukit Katil, 75450 Melaka',
                    'rating' => '⭐⭐⭐⭐⭐ (25 reviews)',
                    'services' => ['Laboratory Testing', 'Vaccinations', 'Screening and Treatment'],
                    'serviceType' => 'Medical',
                    'location' => 'Bukit Katil'
                ],
                [
                    'name' => 'OneMedic Clinic',
                    'address' => '10A, Jalan Bunga Raya 5, Bukit Katil, 75450 Melaka',
                    'rating' => '⭐⭐⭐⭐⭐ (25 reviews)',
                    'services' => ['Vaccinations', 'Specialized Treatment'],
                    'serviceType' => 'Medical',
                    'location' => 'Bukit Katil'
                ],
                [
                    'name' => 'Elegant Suits',
                    'address' => '15, Taman Sutera, 76100 Durian Tunggal, Melaka',
                    'rating' => '⭐⭐⭐⭐ (18 reviews)',
                    'services' => ['Women\'s Custom Made Tailoring'],
                    'serviceType' => 'Tailor',
                    'location' => 'Durian Tunggal'
                ]
            ];

            foreach($stores as $store) {
                $isServiceTypeMatch = !isset($_POST['types-of-services']) || $_POST['types-of-services'] == '' || strtolower($store['serviceType']) == strtolower($_POST['types-of-services']);
                $isServiceRequiredMatch = !isset($_POST['services-required']) || $_POST['services-required'] == '' || array_search($_POST['services-required'], array_map(function($s) { return strtolower(str_replace(' ', '', $s)); }, $store['services'])) !== false;
                $isLocationMatch = !isset($_POST['location']) || $_POST['location'] == '' || $store['location'] == $_POST['location'];

                if ($isServiceTypeMatch && $isServiceRequiredMatch && $isLocationMatch) {
                    echo '<div class="store '.$store['serviceType'].'" data-service="'.$store['serviceType'].'" data-location="'.$store['location'].'">';
                    echo '<h2>'.$store['name'].'</h2>';
                    echo '<p>'.$store['address'].'</p>';
                    echo '<p>Rating: '.$store['rating'].'</p>';
                    echo '<ul>';
                    foreach($store['services'] as $service) {
                        echo '<li>'.$service.'</li>';
                    }
                    echo '</ul>';
                    echo '<a href="tailorProfile.php" class="button">Book Appointment</a>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const services = {
                    'Medical': {
                        'Vaccinations': ['Hepatitis A', 'Hepatitis B', 'Rabies', 'Rotavirus', 'Chickenpox', 'HPV', 'Tetanus'],
                        'Laboratory Testing': ['Blood test', 'Urine test'],
                        'Screening and Treatment': ['High cholesterol', 'High blood pressure', 'Diabetes'],
                        'Specialized Treatment': ['Cardiology', 'Dermatology', 'Dentistry', 'ENT', 'Physical therapy']
                    },
                    'Spa': {
                        'Facial Treatment': ['Skin analysis', 'Cleansing', 'Mask', 'Toning', 'Hydration', 'Paraffin treatments'],
                        'Body Treatment': ['Sauna', 'Steam room', 'Massage', 'Salt scrub', 'Herbal body masks', 'Waxing'],
                        'Nail Services': ['Manicures', 'Pedicures', 'Paraffin treatment']
                    },
                    'Tailor': {
                        'Repairs/Alterations': ['Shortening', 'Hemming', 'Cuffs', 'Mending Services', 'Sewing', 'Patching', 'Bonding', 'Sashiko', 'Darning', 'Other Basic Repair'],
                        'Women\'s Custom Made Tailoring': ['Blouse', 'Salwar Suit', 'Patiala Suit', 'Pant Suit', 'Baju Kebaya', 'Baju Kurung Moden', 'Baju Kurung Kedah', 'Baju Kurung Pahang', 'Saree Fall Pico', 'Other Women\'s dresses'],
                        'Men\'s Custom Made Tailoring': ['Shirt and Pants', 'Jeans', 'Kurta', 'Trouser', 'Men suits', 'Baju Melayu Teluk Belanga', 'Other Men\'s dresses']
                    }
                };

                const typesOfServices = document.getElementById('types-of-services');
                const servicesRequired = document.getElementById('services-required');
                const locationDropdown = document.getElementById('location');
                const storeList = document.querySelector('.store-list');
                const allStores = document.querySelectorAll('.store');

                function updateServicesDropdown() {
                    const type = typesOfServices.value;
                    servicesRequired.innerHTML = '<option value="" disabled selected>Select a Service Required</option>';

                    if (type) {
                        servicesRequired.disabled = false;
                        if (services[type]) {
                            Object.keys(services[type]).forEach(category => {
                                const option = document.createElement('option');
                                option.value = category.toLowerCase().replace(/\s+/g, '');
                                option.text = category;
                                servicesRequired.appendChild(option);
                            });
                        }
                    } 
                    
                    else {
                        servicesRequired.disabled = true;
                    }
                    updateStoreList();
                }

                function normalizeText(text) {
                    return text.toLowerCase().replace(/\s+/g, '').replace(/[^a-z0-9]/g, '');
                }

                function updateStoreList() {
                    const selectedService = normalizeText(typesOfServices.value);
                    const selectedServiceRequired = normalizeText(servicesRequired.value);
                    const selectedLocation = locationDropdown.value;

                    storeList.innerHTML = '';

                    allStores.forEach(store => {
                        const service = normalizeText(store.dataset.service);
                        const location = store.dataset.location;
                        const servicesList = Array.from(store.querySelectorAll('li')).map(li => normalizeText(li.textContent.trim()));

                        const isServiceTypeMatch = !selectedService || service === selectedService;
                        const isServiceRequiredMatch = !selectedServiceRequired || servicesList.some(s => s.includes(selectedServiceRequired));
                        const isLocationMatch = !selectedLocation || location === selectedLocation;

                        if (isServiceTypeMatch && isServiceRequiredMatch && isLocationMatch) {
                            storeList.appendChild(store.cloneNode(true));
                        }
                    });
                }

                typesOfServices.addEventListener('change', updateServicesDropdown);
                servicesRequired.addEventListener('change', updateStoreList);
                locationDropdown.addEventListener('change', updateStoreList);

                updateServicesDropdown(); 
            });
        </script>
    </body>
</html>
