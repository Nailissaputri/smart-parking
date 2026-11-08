<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">
            Smart Parking
        </div>

        <ul class="menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#parking">Parking Availability</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
    </nav>

    <!-- HOME -->
    <section id="home" class="hero">

        <div class="hero-text">
            <h1>Parking Easier, Faster & Smarter.</h1>

            <p>
                Find available parking spaces and reserve
                your spot easily with our QR Code-based
                parking system.
            </p>

            <button class="btn">
                Find Parking
            </button>
        </div>

        <div class="hero-image">
            <img src="{{ asset('images/mobil2.jpg') }}" alt="Mobil">
        </div>

    </section>

    
    <!-- PARKING AVAILABILITY -->
    <section id="parking" class="parking-availability-section">

        <div class="parking-board">

            <div class="parking-header">
                <h2>Parking Availability</h2>

                <div class="parking-legend">
                    <div class="legend-item">
                        <span class="legend-color available-color"></span>
                        Available
                    </div>

                    <div class="legend-item">
                        <span class="legend-color occupied-color"></span>
                        Occupied
                    </div>

                     <div class="legend-item">
                        <span class="legend-color selected-color"></span>
                        Selected
                    </div>

                </div>
            </div>

            <div class="zone-tabs">
                <button class="zone-button active" data-zone="A">
                    Zona A
                </button>

                <button class="zone-button" data-zone="B">
                    Zona B
                </button>

                <button class="zone-button" data-zone="C">
                    Zona C
                </button>
            </div>

            <div class="parking-slots" id="parkingSlots"></div>

        </div>

    </section>

    <script>
        // Data contoh status parkir setiap zona
        const parkingData = {
            A: [
                false, false, true, false, true,
                true, true, true, false, true,
                false, true, true, true, false
            ],

            B: [
                true, false, true, true, false,
                false, true, true, true, false,
                true, true, false, true, true
            ],

            C: [
                false, true, true, false, true,
                true, false, true, false, true,
                true, false, true, true, false
            ]
        };

        const parkingSlots = document.getElementById('parkingSlots');
        const zoneButtons = document.querySelectorAll('.zone-button');

        let selectedSlot = null;

        function tampilkanSlot(zona) {
            parkingSlots.innerHTML = '';

            selectedSlot = null;

            parkingData[zona].forEach((tersedia, index) => {
                const nomor = String(index + 1).padStart(2, '0');

                const slot = document.createElement('div');

                slot.className = tersedia
                    ? 'parking-slot available'
                    : 'parking-slot occupied';

                slot.innerHTML = `
                    <div class="car-icon">
                        ${tersedia ? '🚘' : '🚙'}
                    </div>

                    <div class="slot-number">
                        ${zona}${nomor}
                    </div>

                    <div class="slot-status">
                        ${tersedia ? 'Available' : 'Occupied'}
                    </div>
                `;

                slot.addEventListener('click', function () {
                    if (!tersedia) return;

                    document.querySelectorAll('.parking-slot')
                        .forEach(item => item.classList.remove('selected'));

                    slot.classList.add('selected');
                    selectedSlot = `${zona}${nomor}`;
                });

                parkingSlots.appendChild(slot);
            });
        }

        zoneButtons.forEach(button => {
            button.addEventListener('click', function () {
                zoneButtons.forEach(item => item.classList.remove('active'));

                this.classList.add('active');

                tampilkanSlot(this.dataset.zone);
            });
        });

        // Menampilkan Zona A saat halaman dibuka
        tampilkanSlot('A');
    </script>

    <!-- ABOUT -->
    <section id="about" class="about">

        <div class="about-text">

            <h1>About Us</h1>

            <div class="line"></div>

            <h3>
                What is
                <span>Smart Parking?</span>
            </h3>

            <p>
                Smart Parking adalah sistem berbasis web
                yang membantu pengguna mengetahui
                ketersediaan slot parkir secara real-time.
                Sistem ini menggunakan QR Code untuk
                proses reservasi dan akses masuk maupun
                keluar area parkir.
            </p>

            <h2>Fitur Unggulan</h2>

            <div class="fitur">

                <div class="card">
                    Real-Time Monitoring
                </div>

                <div class="card">
                    QR Code Access
                </div>

                <div class="card">
                    Online Reservation
                </div>

                <div class="card">
                    Dashboard Monitoring
                </div>

            </div>

        </div>

        <div class="about-image">

            <div class="circle">
                <img src="{{ asset('images/mobil2.jpg') }}" alt="Mobil">
            </div>

        </div>

    </section>

</body>
</html>