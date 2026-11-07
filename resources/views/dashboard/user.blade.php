
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking - User Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #090820;
            color: white;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 230px;
            background: #090820;
            padding: 25px 15px;
            border-right: 1px solid #282044;
            flex-shrink: 0;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            margin: 0 10px 40px;
        }

        .brand span {
            color: #DB1FFF;
        }

        .menu-title {
            color: #aaa2c5;
            font-size: 11px;
            margin: 25px 12px 12px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #ddd7ef;
            padding: 14px 13px;
            border-radius: 10px;
            margin-bottom: 9px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(120deg, #7030EF, #DB1FFF);
            color: white;
        }

        /* MAIN */
        .main {
            flex: 1;
            min-width: 0;
            background: #100c29;
        }

        .topbar {
            height: 75px;
            background: #171039;
            border-bottom: 1px solid #302052;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 30px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            background: linear-gradient(120deg, #7030EF, #DB1FFF);
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-weight: bold;
        }

        .content {
            padding: 28px;
        }

        .heading {
            margin-bottom: 20px;
        }

        .heading h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .heading p {
            color: #bbb2d3;
            font-size: 14px;
        }

        /* PANEL */
        .panel {
            background: #171330;
            border: 1px solid #34245b;
            border-radius: 16px;
            padding: 18px;
        }

        .overview {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 16px;
            margin-bottom: 18px;
        }

        .panel-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
        }

        .panel-title h2 {
            font-size: 20px;
        }

        .legend {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            font-size: 11px;
            color: #d5cde9;
        }

        .legend span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 3px;
            display: inline-block;
        }

        .available-dot { background: #00d99a; }
        .occupied-dot { background: #ff315b; }
        .selected-dot { background: #7030EF; }

        /* ZONES */
        .zones {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 14px;
        }

        .zone-btn {
            padding: 12px;
            border: 1px solid #393052;
            border-radius: 10px;
            background: #211c3d;
            color: white;
            cursor: pointer;
        }

        .zone-btn.active {
            background: linear-gradient(120deg, #7030EF, #DB1FFF);
            border-color: #DB1FFF;
        }

        /* PARKING SLOTS */
        .slots {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 9px;
        }

        .slot {
            background: #073c37;
            border: 1px solid #087c68;
            border-radius: 10px;
            min-height: 85px;
            padding: 10px 5px;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 7px;
        }

        .slot .car-icon {
            font-size: 22px;
        }

        .slot .slot-name {
            font-size: 13px;
        }

        .slot .slot-status {
            font-size: 10px;
            color: #00e6a4;
        }

        .slot.occupied {
            background: #48172e;
            border-color: #9c234d;
            cursor: not-allowed;
        }

        .slot.occupied .slot-status {
            color: #ff5375;
        }

        .slot.selected {
            background: #41128c;
            border: 2px solid #DB1FFF;
            box-shadow: 0 0 15px #7030EF;
        }

        .slot.selected .slot-status {
            color: #e6baff;
        }

        /* IMAGE PANEL */
        .parking-image {
            min-height: 100%;
            position: relative;
            overflow: hidden;
            padding: 0;
            background: #211344;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .parking-image img {
            width: 100%;
            height: 100%;
            min-height: 340px;
            object-fit: contain;
            background: linear-gradient(140deg, #211344, #090820);
        }

        .image-caption {
            position: absolute;
            left: 18px;
            bottom: 18px;
            background: rgba(112, 48, 239, .9);
            padding: 15px 22px;
            border-radius: 12px;
        }

        .image-caption h2 {
            font-size: 30px;
        }

        .image-caption p {
            font-size: 13px;
        }

        /* LOWER SECTIONS */
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .field label {
            display: block;
            font-size: 13px;
            color: #d2c9e6;
            margin-bottom: 8px;
        }

        .field input,
        .field select {
            width: 100%;
            padding: 13px;
            border: 1px solid #393052;
            border-radius: 9px;
            background: #211c3d;
            color: white;
            outline: none;
        }

        .field input:focus,
        .field select:focus {
            border-color: #DB1FFF;
        }

        .reserve-btn {
            width: 100%;
            padding: 14px;
            margin-top: 17px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(100deg, #7030EF, #DB1FFF);
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .reserve-btn:hover {
            opacity: .85;
        }

        /* TABLE */
        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 380px;
        }

        th, td {
            padding: 13px 9px;
            border-bottom: 1px solid #30264d;
            text-align: left;
            font-size: 12px;
        }

        th {
            color: #bdb1d9;
            background: #211c3d;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 15px;
            background: #064c3e;
            color: #00e6a4;
        }

        .status.cancelled {
            background: #50172d;
            color: #ff8aa3;
        }

        .empty {
            color: #aaa2c5;
            text-align: center;
        }

        /* OTHER SECTIONS */
        .extra-section {
            margin-top: 18px;
        }

        .vehicle-card {
            background: #211c3d;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #393052;
            margin-top: 10px;
        }

        .vehicle-card p {
            color: #bbb2d3;
            margin-top: 7px;
            font-size: 13px;
        }

        .logout {
            color: #ff91ac !important;
        }

        @media (max-width: 1050px) {
            .overview,
            .bottom-grid {
                grid-template-columns: 1fr;
            }

            .parking-image img {
                max-height: 300px;
            }
        }

        @media (max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .menu {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 5px;
            }

            .content {
                padding: 16px;
            }

            .slots {
                grid-template-columns: repeat(3, 1fr);
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <span>SMART</span>PARKING
        </div>

        <p class="menu-title">MENU UTAMA</p>

        <nav class="menu">
            <a href="#dashboard" class="active">⌂ Dashboard</a>
            <a href="#reservations">▣ Reservations</a>
            <a href="#vehicles">▣ Vehicles</a>
            <a href="#history">◷ Parking History</a>
        </nav>

        <p class="menu-title">AKUN</p>

        <nav class="menu">
            <a href="#reservation-form">+ Buat Reservasi</a>
            <a href="{{ url('/login') }}" class="logout">↪ Logout</a>
        </nav>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">

        <header class="topbar">
            <div class="profile">
                <div class="avatar">U</div>
                <span>Pengguna</span>
            </div>
        </header>

        <div class="content" id="dashboard">

            <div class="heading">
                <h1>Parking Overview</h1>
                <p>Lihat ketersediaan slot parkir dan pilih zona untuk reservasi.</p>
            </div>

            <!-- PARKING OVERVIEW -->
            <div class="overview">

                <section class="panel">

                    <div class="panel-title">
                        <h2>Parking Slots</h2>

                        <div class="legend">
                            <span><i class="dot available-dot"></i> Available</span>
                            <span><i class="dot occupied-dot"></i> Occupied</span>
                            <span><i class="dot selected-dot"></i> Selected</span>
                        </div>
                    </div>

                    <div class="zones">
                        <button class="zone-btn active" onclick="pilihZona('A', this)">Zona A</button>
                        <button class="zone-btn" onclick="pilihZona('B', this)">Zona B</button>
                        <button class="zone-btn" onclick="pilihZona('C', this)">Zona C</button>
                    </div>

                    <div class="slots" id="slotContainer"></div>

                </section>

                <!-- CAR IMAGE -->
                <section class="panel parking-image">
                    <img src="{{ asset('images/mobil2.jpg') }}" alt="Mobil Smart Parking">

                    <div class="image-caption">
                        <h2 id="availableCount">0</h2>
                        <p>Available Slots</p>
                    </div>
                </section>

            </div>

            <!-- QUICK RESERVATION AND MY RESERVATION -->
            <div class="bottom-grid">

                <section class="panel" id="reservation-form">

                    <div class="panel-title">
                        <h2>▣ Quick Reservation</h2>
                    </div>

                    <p style="color:#bbb2d3;font-size:13px;margin-bottom:18px;">
                        Pilih zona dan slot parkir yang kamu inginkan.
                    </p>

                    <form id="reservationForm">

                        <div class="form-grid">

                            <div class="field">
                                <label>Zona Parkir</label>
                                <select id="zonaForm">
                                    <option value="A">Zona A</option>
                                    <option value="B">Zona B</option>
                                    <option value="C">Zona C</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Slot Parkir</label>
                                <select id="slotForm" required>
                                    <option value="">Pilih Slot</option>
                                </select>
                            </div>

                            <div class="field">
                                <label>Tanggal</label>
                                <input type="date" id="tanggal" required>
                            </div>

                            <div class="field">
                                <label>Jam Masuk</label>
                                <input type="time" id="jam" required>
                            </div>

                        </div>

                        <button type="submit" class="reserve-btn">
                            ▣ Pesan Sekarang
                        </button>

                    </form>

                    <div id="qrInfo" style="display:none;margin-top:15px;padding:15px;background:#211c3d;border-radius:10px;">
                        <h3>Informasi Reservasi</h3>
                        <p id="qrText" style="margin-top:10px;color:#d5cde9;font-size:13px;"></p>
                        <p style="margin-top:8px;color:#DB1FFF;font-size:12px;">
                            QR Code akan tersedia setelah fitur QR dihubungkan.
                        </p>
                    </div>

                </section>

                <section class="panel" id="reservations">

                    <div class="panel-title">
                        <h2>Reservasi Saya</h2>
                    </div>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Zona</th>
                                    <th>Slot</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody id="reservationList">
                                <tr>
                                    <td colspan="5" class="empty">
                                        Belum ada reservasi.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </section>

            </div>

            <!-- VEHICLES -->
            <section class="panel extra-section" id="vehicles">
                <div class="panel-title">
                    <h2>Vehicles / Kendaraan Saya</h2>
                </div>

                <div class="vehicle-card">
                    <h3>🚗 Data Kendaraan</h3>
                    <p>Belum ada kendaraan yang ditambahkan.</p>
                    <p>Fitur pengelolaan kendaraan dapat dihubungkan berikutnya.</p>
                </div>
            </section>

            <!-- PARKING HISTORY -->
            <section class="panel extra-section" id="history">
                <div class="panel-title">
                    <h2>Parking History</h2>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Zona</th>
                                <th>Slot</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody id="historyList">
                            <tr>
                                <td colspan="4" class="empty">
                                    Belum ada riwayat parkir.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </main>
</div>

<script>
    // DATA SLOT PARKIR SIMULASI
    const dataSlot = {
        A: [
            { id: 'A01', status: 'available' },
            { id: 'A02', status: 'occupied' },
            { id: 'A03', status: 'available' },
            { id: 'A04', status: 'occupied' },
            { id: 'A05', status: 'available' },
            { id: 'A06', status: 'available' },
            { id: 'A07', status: 'available' },
            { id: 'A08', status: 'available' },
            { id: 'A09', status: 'occupied' },
            { id: 'A10', status: 'available' },
            { id: 'A11', status: 'occupied' },
            { id: 'A12', status: 'available' },
            { id: 'A13', status: 'available' },
            { id: 'A14', status: 'available' },
            { id: 'A15', status: 'occupied' }
        ],

        B: [
            { id: 'B01', status: 'available' },
            { id: 'B02', status: 'available' },
            { id: 'B03', status: 'occupied' },
            { id: 'B04', status: 'available' },
            { id: 'B05', status: 'occupied' },
            { id: 'B06', status: 'available' },
            { id: 'B07', status: 'available' },
            { id: 'B08', status: 'occupied' },
            { id: 'B09', status: 'available' },
            { id: 'B10', status: 'available' },
            { id: 'B11', status: 'available' },
            { id: 'B12', status: 'occupied' },
            { id: 'B13', status: 'available' },
            { id: 'B14', status: 'available' },
            { id: 'B15', status: 'available' }
        ],

        C: [
            { id: 'C01', status: 'occupied' },
            { id: 'C02', status: 'available' },
            { id: 'C03', status: 'available' },
            { id: 'C04', status: 'available' },
            { id: 'C05', status: 'occupied' },
            { id: 'C06', status: 'available' },
            { id: 'C07', status: 'available' },
            { id: 'C08', status: 'occupied' },
            { id: 'C09', status: 'available' },
            { id: 'C10', status: 'available' },
            { id: 'C11', status: 'available' },
            { id: 'C12', status: 'available' },
            { id: 'C13', status: 'occupied' },
            { id: 'C14', status: 'available' },
            { id: 'C15', status: 'available' }
        ]
    };

    let zonaAktif = 'A';
    let slotTerpilih = null;
    let riwayatReservasi = [];

    // MENAMPILKAN SLOT
    function tampilkanSlot(zona) {
        zonaAktif = zona;

        const container = document.getElementById('slotContainer');
        const select = document.getElementById('slotForm');

        container.innerHTML = '';
        select.innerHTML = '<option value="">Pilih Slot</option>';

        let tersedia = 0;

        dataSlot[zona].forEach(slot => {
            const div = document.createElement('button');

            div.type = 'button';
            div.className = 'slot';

            if (slot.status === 'occupied') {
                div.classList.add('occupied');
            }

            if (slotTerpilih === slot.id) {
                div.classList.add('selected');
            }

            if (slot.status === 'available') {
                tersedia++;

                div.innerHTML = `
                    <span class="car-icon">🚘</span>
                    <span class="slot-name">${slot.id}</span>
                    <span class="slot-status">Available</span>
                `;

                div.onclick = () => pilihSlot(slot.id);

                const option = document.createElement('option');
                option.value = slot.id;
                option.textContent = slot.id;
                select.appendChild(option);

            } else {
                div.innerHTML = `
                    <span class="car-icon">🚗</span>
                    <span class="slot-name">${slot.id}</span>
                    <span class="slot-status">Occupied</span>
                `;
                div.disabled = true;
            }

            container.appendChild(div);
        });

        document.getElementById('availableCount').textContent = tersedia;

        document.getElementById('zonaForm').value = zona;
        document.getElementById('slotForm').value = slotTerpilih || '';
    }

    // PILIH ZONA
    function pilihZona(zona, tombol) {
        document.querySelectorAll('.zone-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        tombol.classList.add('active');
        slotTerpilih = null;

        tampilkanSlot(zona);
    }

    // PILIH SLOT
    function pilihSlot(nomor) {
        slotTerpilih = nomor;
        document.getElementById('slotForm').value = nomor;
        tampilkanSlot(zonaAktif);
    }

    // GANTI ZONA DARI FORM
    document.getElementById('zonaForm').addEventListener('change', function() {
        const zona = this.value;

        document.querySelectorAll('.zone-btn').forEach(btn => {
            btn.classList.toggle(
                'active',
                btn.textContent.trim() === 'Zona ' + zona
            );
        });

        slotTerpilih = null;
        tampilkanSlot(zona);
    });

    // PILIH SLOT DARI FORM
    document.getElementById('slotForm').addEventListener('change', function() {
        slotTerpilih = this.value || null;
        tampilkanSlot(zonaAktif);
    });

    // PROSES RESERVASI SIMULASI
    document.getElementById('reservationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const zona = document.getElementById('zonaForm').value;
        const slot = document.getElementById('slotForm').value;
        const tanggal = document.getElementById('tanggal').value;
        const jam = document.getElementById('jam').value;

        if (!slot) {
            alert('Silakan pilih slot parkir terlebih dahulu.');
            return;
        }

        const data = dataSlot[zona].find(item => item.id === slot);

        if (!data || data.status !== 'available') {
            alert('Slot tersebut tidak tersedia.');
            return;
        }

        data.status = 'occupied';

        riwayatReservasi.push({
            zona: zona,
            slot: slot,
            tanggal: tanggal,
            jam: jam,
            status: 'Aktif'
        });

        tampilkanReservasi();

        document.getElementById('qrInfo').style.display = 'block';
        document.getElementById('qrText').textContent =
            'Reservasi ' + slot + ' di Zona ' + zona +
            ' pada tanggal ' + tanggal + ' pukul ' + jam;

        slotTerpilih = null;
        tampilkanSlot(zona);

        alert('Reservasi simulasi berhasil dibuat!');
    });

    // TAMPILKAN DAFTAR RESERVASI
    function tampilkanReservasi() {
        const list = document.getElementById('reservationList');

        list.innerHTML = '';

        riwayatReservasi.forEach((item, index) => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${item.zona}</td>
                <td>${item.slot}</td>
                <td>${item.tanggal}</td>
                <td>${item.jam}</td>
                <td><span class="status">${item.status}</span></td>
            `;

            list.appendChild(row);
        });

        if (riwayatReservasi.length === 0) {
            list.innerHTML = `
                <tr>
                    <td colspan="5" class="empty">Belum ada reservasi.</td>
                </tr>
            `;
        }

        tampilkanRiwayat();
    }

    // TAMPILKAN RIWAYAT
    function tampilkanRiwayat() {
        const list = document.getElementById('historyList');

        const selesai = riwayatReservasi.filter(
            item => item.status !== 'Aktif'
        );

        if (selesai.length === 0) {
            list.innerHTML = `
                <tr>
                    <td colspan="4" class="empty">Belum ada riwayat parkir.</td>
                </tr>
            `;
            return;
        }

        list.innerHTML = selesai.map(item => `
            <tr>
                <td>${item.zona}</td>
                <td>${item.slot}</td>
                <td>${item.tanggal}</td>
                <td>${item.status}</td>
            </tr>
        `).join('');
    }

    // TANGGAL DEFAULT HARI INI
    const tanggalInput = document.getElementById('tanggal');
    const hariIni = new Date();
    const tahun = hariIni.getFullYear();
    const bulan = String(hariIni.getMonth() + 1).padStart(2, '0');
    const hari = String(hariIni.getDate()).padStart(2, '0');

    tanggalInput.value = `${tahun}-${bulan}-${hari}`;
    tanggalInput.min = `${tahun}-${bulan}-${hari}`;

    // TAMPILKAN ZONA PERTAMA
    tampilkanSlot('A');
</script>

</body>
</html>
