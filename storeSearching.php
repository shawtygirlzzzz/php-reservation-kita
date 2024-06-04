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
                    <li style="color: red;"><a href="storeSearching.html" style="color: red;">Stores</a></li>
                    <li><a href="service.html">Services</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </nav>
            <div class="contact">
                <a href="https://wa.me/qr/DMJ2DG5J7LDUF1">
                    <img src="image/whatsapp.png"alt="WhatsApp" style="height:20px; width:20px; margin-right:5px;">
                    +60103344971
                </a>
                <a href="login.html">
                    <img src="image/loginaccount.png" alt="Login" style="height:20px; width:20px; margin-left:5px;">
                </a>
            </div>
        </header>

        <div class="filters">
            <label for="types-of-services">Types of Services
                <select id="types-of-services">
                    <option value="">Select a Service</option>
                    <option value="Medical">Medical</option>
                    <option value="Spa">Spa</option>
                    <option value="Tailor">Tailor</option>
                </select>
            </label>
            <label for="services-required">Services Required
                <select id="services-required" disabled>
                    <option value="" disabled selected>Select a Service Required</option>
                </select>
            </label>
            <label for="location">Location
                <select id="location">
                    <option value="">Select a Location</option>
                    <option value="Ayer Keroh">Ayer Keroh</option>
                    <option value="Durian Tunggal">Durian Tunggal</option>
                    <option value="Batu Berendam">Batu Berendam</option>
                    <option value="Bukit Katil">Bukit Katil</option>
                    <option value="Cheng">Cheng</option>
                    <option value="Masjid Tanah">Masjid Tanah</option>
                    <option value="Bandaraya Melaka">Bandaraya Melaka</option>
                </select>
            </label>
        </div>
        <div class="store-list">
            <div class="store tailor" data-service="Tailor" data-location="Ayer Keroh">
                <h2>Fairytale Tailor Shop</h2>
                <p>7, Jalan Komersial TAKH 2, Taman Ayer Keroh Heights, 76450 Ayer Keroh, Melaka</p>
                <p>Rating: ⭐⭐⭐⭐☆ (12 reviews)</p>
                <ul>
                    <li>Women's Custom Made Tailoring</li>
                    <li>Men's Custom Made Tailoring</li>
                    <li>Repairs/Alterations</li>
                </ul>
                <a href="tailorProfile.html" class="button">Book Appointment</a>
            </div>
            <div class="store medical" data-service="Medical" data-location="Bukit Katil">
                <h2>HealthPlus Family Clinic</h2>
                <p>20, Jalan Medika 5, Bukit Katil, 75450 Melaka</p>
                <p>Rating: ⭐⭐⭐⭐⭐ (25 reviews)</p>
                <ul>
                    <li>Laboratory Testing</li>
                    <li>Vaccinations</li>
                    <li>Screening and Treatment</li>
                </ul>
                <a href="tailorProfile.html" class="button">Book Appointment</a>  
            </div>
            <div class="store medical" data-service="Medical" data-location="Bukit Katil">
                <h2>OneMedic Clinic</h2>
                <p>10A, Jalan Bunga Raya 5, Bukit Katil, 75450 Melaka</p>
                <p>Rating: ⭐⭐⭐⭐⭐ (25 reviews)</p>
                <ul>
                    <li>Vaccinations</li>
                    <li>Specialized Treatment</li>
                </ul>
                <a href="tailorProfile.html" class="button">Book Appointment</a>  
            </div>
            <div class="store tailor" data-service="Tailor" data-location="Durian Tunggal">
                <h2>Elegant Suits</h2>
                <p>15, Taman Sutera, 76100 Durian Tunggal, Melaka</p>
                <p>Rating: ⭐⭐⭐⭐ (18 reviews)</p>
                <ul>
                    <li>Women's Custom Made Tailoring</li>
                </ul>
                <a href="tailorProfile.html" class="button">Book Appointment</a>
            </div>
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
