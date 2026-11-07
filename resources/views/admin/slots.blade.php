
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Slot Parkir - SmartParking</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #100b1d;
            color: #fff;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #1b122b;
            padding: 28px 18px;
            position: fixed;
            height: 100vh;
            border-right: 1px solid #342447;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #c69aff;
            margin: 0 0 35px 10px;
        }

        .logo i {
            margin-right: 8px;
        }

        .menu-title {
            color: #8f829f;
            font-size: 11px;
            margin: 25px 10px 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar a {
            display: block;
            color: #c8bdd5;
            text-decoration: none;
            padding: 13px 14px;
            margin: 5px 0;
            border-radius: 9px;
            font-size: 14px;
            transition: .2s;
        }

        .sidebar a i {
            width: 25px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #7139a6;
            color: white;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 25px;
        }

        .topbar p {
            color: #a99bb8;
            font-size: 13px;
            margin-top: 7px;
        }

        .admin {
            background: #211631;
            padding: 10px 16px;
            border-radius: 10px;
            color: #d8c5ed;
            font-size: 13px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat {
            background: #211631;
            border: 1px solid #38264c;
            padding: 22px;
            border-radius: 14px;
        }

        .stat p {
            color: #a99bb8;
            font-size: 13px;
        }

        .stat h2 {
            font-size: 28px;
            margin-top: 12px;
        }

        .stat i {
            color: #c69aff;
            font-size: 20px;
        }

        .panel {
            background: #211631;
            border: 1px solid #38264c;
            border-radius: 14px;
            padding: 23px;
            margin-bottom: 22px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .panel-header h2 {
            font-size: 18px;
        }

        .panel-header p {
            color: #a99bb8;
            font-size: 12px;
            margin-top: 6px;
        }

        .filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        select, input {
            background: #160f23;
            border: 1px solid #49345e;
            color: white;
            padding: 10px 12px;
            border-radius: 8px;
            outline: none;
        }

        .zone-title {
            color: #c69aff;
            margin: 22px 0 14px;
            font-size: 14px;
        }

        .slot-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(90px, 1fr));
            gap: 13px;
        }

        .slot {
            background: #153c32;
            border: 1px solid #28785d;
            border-radius: 10px;
            padding: 18px 8px;
            text-align: center;
            cursor: pointer;
            transition: .2s;
        }

        .slot:hover {
            transform: translateY(-3px);
        }

        .slot.occupied {
            background: #48232e;
            border-color: #a8495c;
        }

        .slot i {
            font-size: 21px;
            margin-bottom: 10px;
        }

        .slot strong {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .slot small {
            color: #d3c9dc;
            font-size: 11px;
        }

        .legend {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 22px;
            color: #c8bdd5;
            font-size: 12px;
        }

        .legend span {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .available-dot { background: #36bd8a; }
        .occupied-dot { background: #d45b70; }

        .notice {
            color: #a99bb8;
            font-size: 12px;
            margin-top: 15px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
                width: calc(100% - 210px);
                padding: 20px;
            }

            .slot-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 16px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .slot-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="logo">
            <i class="fas fa-square-parking"></i> SmartParking
        </div>

        <div class="menu-title">Menu Utama</div>

        <a href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-house"></i> Dashboard
        </a>

        <a href="{{ url('/admin/slots') }}" class="active">
            <i class="fas fa-car"></i> Data Slot Parkir
        </a>

        <a href="{{ url('/admin/reservasi') }}">
            <i class="fas fa-calendar-check"></i> Data Reservasi
        </a>

        <a href="{{ url('/admin/pengguna') }}">
            <i class="fas fa-users"></i> Data Pengguna
        </a>

        <a href="{{ url('/admin/riwayat') }}">
            <i class="fas fa-clock-rotate-left"></i> Riwayat Parkir
        </a>

        <a href="{{ url('/admin/scan-qr') }}">
            <i class="fas fa-qrcode"></i> Scan QR Code
        </a>

        <div class="logout">
            <a href="{{ url('/login') }}">
                <i class="fas fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </aside>

    <main class="main">

        <div class="topbar">
            <div>
                <h1>Data Slot Parkir</h1>
                <p>Kelola dan pantau ketersediaan seluruh slot parkir.</p>
            </div>

            <div class="admin">
                <i class="fas fa-user-shield"></i> Administrator
            </div>
        </div>

        <section class="summary">
            <div class="stat">
                <i class="fas fa-square-parking"></i>
                <p>Total Slot Parkir</p>
                <h2 id="totalSlot">15</h2>
            </div>

            <div class="stat">
                <i class="fas fa-circle-check"></i>
                <p>Slot Tersedia</p>
                <h2 id="availableSlot">10</h2>
            </div>

            <div class="stat">
                <i class="fas fa-car"></i>
                <p>Slot Terisi</p>
                <h2 id="occupiedSlot">5</h2>
            </div>
        </section>

        <section class="panel">
            <div class="panel-header">
                <div>
                    <h2>Monitoring Slot Parkir</h2>
                    <p>Pilih slot untuk melihat atau mengubah statusnya.</p>
                </div>

                <div class="filters">
                    <select id="filterZona" onchange="filterSlot()">
                        <option value="semua">Semua Zona</option>
                        <option value="A">Zona A</option>
                        <option value="B">Zona B</option>
                        <option value="C">Zona C</option>
                    </select>

                    <input type="text" id="cariSlot"
                           placeholder="Cari kode slot..."
                           oninput="filterSlot()">
                </div>
            </div>

            <div id="daftarSlot">

                <h3 class="zone-title">ZONA A</h3>
                <div class="slot-grid">
                    <div class="slot" data-zona="A" data-kode="A01" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>A01</strong><small>Tersedia</small>
                    </div>
                    <div class="slot occupied" data-zona="A" data-kode="A02" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>A02</strong><small>Terisi</small>
                    </div>
                    <div class="slot" data-zona="A" data-kode="A03" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>A03</strong><small>Tersedia</small>
                    </div>
                    <div class="slot" data-zona="A" data-kode="A04" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>A04</strong><small>Tersedia</small>
                    </div>
                    <div class="slot occupied" data-zona="A" data-kode="A05" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>A05</strong><small>Terisi</small>
                    </div>
                </div>

                <h3 class="zone-title">ZONA B</h3>
                <div class="slot-grid">
                    <div class="slot" data-zona="B" data-kode="B01" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>B01</strong><small>Tersedia</small>
                    </div>
                    <div class="slot occupied" data-zona="B" data-kode="B02" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>B02</strong><small>Terisi</small>
                    </div>
                    <div class="slot" data-zona="B" data-kode="B03" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>B03</strong><small>Tersedia</small>
                    </div>
                    <div class="slot" data-zona="B" data-kode="B04" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>B04</strong><small>Tersedia</small>
                    </div>
                    <div class="slot occupied" data-zona="B" data-kode="B05" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>B05</strong><small>Terisi</small>
                    </div>
                </div>

                <h3 class="zone-title">ZONA C</h3>
                <div class="slot-grid">
                    <div class="slot" data-zona="C" data-kode="C01" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>C01</strong><small>Tersedia</small>
                    </div>
                    <div class="slot occupied" data-zona="C" data-kode="C02" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>C02</strong><small>Terisi</small>
                    </div>
                    <div class="slot" data-zona="C" data-kode="C03" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>C03</strong><small>Tersedia</small>
                    </div>
                    <div class="slot" data-zona="C" data-kode="C04" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>C04</strong><small>Tersedia</small>
                    </div>
                    <div class="slot occupied" data-zona="C" data-kode="C05" onclick="ubahStatus(this)">
                        <i class="fas fa-car"></i><strong>C05</strong><small>Terisi</small>
                    </div>
                </div>

            </div>

            <div class="legend">
                <span><i class="dot available-dot"></i> Tersedia</span>
                <span><i class="dot occupied-dot"></i> Terisi</span>
            </div>

            <p class="notice">
                * Klik salah satu slot untuk mengubah status sementara.
                Data pada halaman ini masih berupa contoh dan belum terhubung ke database.
            </p>
        </section>

    </main>

    <script>
        function hitungSlot() {
            const slots = document.querySelectorAll('.slot');
            let tersedia = 0;
            let terisi = 0;

            slots.forEach(slot => {
                if (slot.classList.contains('occupied')) {
                    terisi++;
                } else {
                    tersedia++;
                }
            });

            document.getElementById('totalSlot').textContent = slots.length;
            document.getElementById('availableSlot').textContent = tersedia;
            document.getElementById('occupiedSlot').textContent = terisi;
        }

        function ubahStatus(slot) {
            slot.classList.toggle('occupied');

            const status = slot.querySelector('small');

            if (slot.classList.contains('occupied')) {
                status.textContent = 'Terisi';
            } else {
                status.textContent = 'Tersedia';
            }

            hitungSlot();
        }

        function filterSlot() {
            const zona = document.getElementById('filterZona').value;
            const cari = document.getElementById('cariSlot').value.toUpperCase();
            const slots = document.querySelectorAll('.slot');

            slots.forEach(slot => {
                const cocokZona = zona === 'semua' || slot.dataset.zona === zona;
                const cocokKode = slot.dataset.kode.includes(cari);

                slot.style.display = cocokZona && cocokKode ? 'block' : 'none';
            });

            document.querySelectorAll('.zone-title').forEach(judul => {
                const zonaJudul = judul.textContent.trim().slice(-1);
                const tampil = zona === 'semua' || zonaJudul === zona;
                judul.style.display = tampil ? 'block' : 'none';
            });
        }

        hitungSlot();
    </script>

</body>
</html>
