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

    <!-- PARKING -->
    <section id="parking" class="parking">

        <h2>Parking Availability</h2>

        <div class="slot-container">

            <div class="slot available">
                A1 <br>
                Tersedia
            </div>

            <div class="slot occupied">
                A2 <br>
                Terisi
            </div>

            <div class="slot available">
                A3 <br>
                Tersedia
            </div>

            <div class="slot occupied">
                A4 <br>
                Terisi
            </div>

        </div>

    </section>

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