
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Smart Parking</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        :root {
            --purple: #7938ef;
            --purple-light: #a16bff;
            --dark: #100d27;
            --sidebar: #17132f;
            --background: #f5f4fa;
            --text: #25213b;
            --muted: #9994ad;
        }

        body {
            background: var(--background);
            color: var(--text);
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 255px;
            background: var(--sidebar);
            color: white;
            padding: 27px 18px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            overflow-y: auto;
        }

        .brand {
            font-size: 23px;
            font-weight: 800;
            padding: 0 12px;
            margin-bottom: 42px;
        }

        .brand span {
            color: #a16bff;
        }

        .menu-title {
            color: #77718f;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin: 25px 12px 13px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #bcb7d0;
            text-decoration: none;
            padding: 13px 14px;
            border-radius: 10px;
            margin-bottom: 7px;
            font-size: 13px;
            transition: .3s;
        }

        .menu a i {
            width: 18px;
            text-align: center;
        }

        .menu a:hover,
        .menu a.active {
            background: linear-gradient(110deg, #7938ef, #9b4dff);
            color: white;
            box-shadow: 0 7px 20px #7938ef40;
        }

        .sidebar-bottom {
            margin-top: 40px;
        }

        /* MAIN */
        .main {
            margin-left: 255px;
            width: calc(100% - 255px);
            padding: 30px 35px;
            min-width: 0;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .topbar h1 {
            font-size: 25px;
            font-weight: 800;
        }

        .topbar p {
            color: var(--muted);
            font-size: 12px;
            margin-top: 7px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 10px 16px;
            border-radius: 12px;
            box-shadow: 0 3px 15px #00000008;
        }

        .avatar {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            background: #eee5ff;
            color: var(--purple);
            border-radius: 12px;
        }

        .admin-profile h4 {
            font-size: 12px;
        }

        .admin-profile p {
            font-size: 10px;
            color: var(--muted);
            margin-top: 4px;
        }

        /* STATISTICS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 21px;
            border-radius: 16px;
            box-shadow: 0 4px 18px #1a123008;
            border: 1px solid #f0edf7;
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 17px;
        }

        .icon-purple { background: #eee7ff; color: #7938ef; }
        .icon-green { background: #e3f8ed; color: #20a66a; }
        .icon-red { background: #ffe9eb; color: #e14d63; }
        .icon-orange { background: #fff0dc; color: #e99730; }

        .stat-card p {
            font-size: 12px;
            color: var(--muted);
            margin-top: 17px;
        }

        .stat-card h2 {
            font-size: 28px;
            margin-top: 8px;
        }

        .stat-card small {
            display: block;
            margin-top: 8px;
            color: #9994ad;
            font-size: 10px;
        }

        /* BANNER */
        .banner {
            min-height: 210px;
            border-radius: 18px;
            margin-bottom: 25px;
            padding: 35px;
            color: white;
            background:
                linear-gradient(90deg, #17102eeF 0%, #32145bd9 48%, #35145b55 100%),
                url("{{ asset('images/mobil2.jpg') }}") center/cover;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .banner-content {
            max-width: 480px;
        }

        .banner small {
            color: #d6baff;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .banner h2 {
            font-size: 27px;
            line-height: 1.4;
            margin: 12px 0;
        }

        .banner p {
            font-size: 12px;
            color: #ddd4ee;
            line-height: 1.8;
        }

        .banner button {
            margin-top: 19px;
            background: white;
            color: #7130e5;
            border: none;
            border-radius: 8px;
            padding: 11px 17px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        /* SECTION */
        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
            margin-bottom: 23px;
        }

        .panel {
            background: white;
            border-radius: 16px;
            padding: 23px;
            box-shadow: 0 4px 18px #1a123008;
            border: 1px solid #f0edf7;
            margin-bottom: 23px;
            min-width: 0;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 22px;
        }

        .panel-header h3 {
            font-size: 15px;
        }

        .panel-header p {
            color: var(--muted);
            font-size: 10px;
            margin-top: 6px;
        }

        .view-all {
            color: var(--purple);
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
        }

        /* SLOT */
        .zone-tabs {
            display: flex;
            gap: 9px;
            margin-bottom: 18px;
        }

        .zone-tabs button {
            border: 1px solid #e9e5f1;
            background: white;
            color: #77718f;
            border-radius: 7px;
            padding: 8px 16px;
            font-size: 11px;
            cursor: pointer;
        }

        .zone-tabs button.active {
            background: var(--purple);
            color: white;
            border-color: var(--purple);
        }

        .slot-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .slot {
            min-height: 85px;
            border-radius: 11px;
            border: 1px solid #c8efd9;
            background: #edfaf3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 7px;
        }

        .slot i {
            font-size: 19px;
            color: #24a66b;
        }

        .slot strong {
            font-size: 11px;
        }

        .slot span {
            font-size: 9px;
            color: #269b68;
        }

        .slot.occupied {
            background: #fff0f1;
            border-color: #ffd0d4;
        }

        .slot.occupied i,
        .slot.occupied span {
            color: #dc5262;
        }

        .legend {
            display: flex;
            gap: 20px;
            margin-top: 18px;
            font-size: 10px;
            color: #77718f;
        }

        .dot {
            width: 8px;
            height: 8px;
            display: inline-block;
            border-radius: 50%;
            margin-right: 5px;
        }

        .dot-green { background: #24a66b; }
        .dot-red { background: #dc5262; }

        /* QUICK ACTION */
        .quick-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .quick-action {
            border: 1px solid #eeeaf5;
            border-radius: 12px;
            padding: 17px 10px;
            background: #fff;
            text-decoration: none;
            color: var(--text);
            transition: .2s;
        }

        .quick-action:hover {
            border-color: var(--purple);
            transform: translateY(-3px);
        }

        .quick-action i {
            display: block;
            color: var(--purple);
            font-size: 20px;
            margin-bottom: 12px;
        }

        .quick-action strong {
            display: block;
            font-size: 11px;
        }

        .quick-action span {
            display: block;
            color: var(--muted);
            font-size: 9px;
            margin-top: 5px;
        }

        /* TABLE */
        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #f0edf5;
            text-align: left;
            font-size: 11px;
        }

        th {
            color: #9690a8;
            font-weight: 600;
            background: #faf9fc;
        }

        td {
            color: #514b65;
        }

        .status {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
        }

        .status.active {
            color: #15945c;
            background: #e5f8ee;
        }

        .status.busy {
            color: #d64b5b;
            background: #ffeaed;
        }

        .status.waiting {
            color: #ce8b24;
            background: #fff4df;
        }

        /* ACTIVITY */
        .activity-item {
            display: flex;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #f1eef6;
        }

        .activity-icon {
            min-width: 34px;
            height: 34px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            background: #eee7ff;
            color: var(--purple);
        }

        .activity-item strong {
            display: block;
            font-size: 11px;
        }

        .activity-item p {
            color: var(--muted);
            font-size: 10px;
            margin-top: 5px;
        }

        .activity-item small {
            color: #aaa4ba;
            font-size: 9px;
        }

        /* RESPONSIVE */
        @media(max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 700px) {
            .sidebar {
                position: relative;
                width: 100%;
            }

            .layout {
                display: block;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
            }

            .slot-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .banner {
                padding: 23px;
            }

            .banner h2 {
                font-size: 21px;
            }
        }

        @media(max-width: 420px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">
            <i class="fa-solid fa-square-parking"></i>
            Smart<span>Parking</span>
        </div>

        <p class="menu-title">MENU UTAMA</p>

        <nav class="menu">
            <a href="#dashboard" class="active">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
            <a href="#slots">
                <i class="fa-solid fa-car"></i> Data Slot Parkir
            </a>
            <a href="#reservasi">
                <i class="fa-solid fa-calendar-check"></i> Data Reservasi
            </a>
            <a href="#pengguna">
                <i class="fa-solid fa-users"></i> Data Pengguna
            </a>
            <a href="#riwayat">
                <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Parkir
            </a>
        </nav>

        <p class="menu-title">LAINNYA</p>

        <nav class="menu">
            <a href="#aksi">
                <i class="fa-solid fa-qrcode"></i> Scan QR Code
            </a>
            <a href="#aktivitas">
                <i class="fa-solid fa-chart-line"></i> Aktivitas Sistem
            </a>
        </nav>

        <div class="sidebar-bottom">
            <nav class="menu">
                <a href="{{ url('/login') }}">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar
                </a>
            </nav>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main" id="dashboard">

        <header class="topbar">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Selamat datang kembali! Berikut ringkasan sistem Smart Parking.</p>
            </div>

            <div class="admin-profile">
                <div class="avatar">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div>
                    <h4>Administrator</h4>
                    <p>Admin Smart Parking</p>
                </div>
            </div>
        </header>

        <!-- STATISTIK -->
        <section class="stats">
            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-purple">
                        <i class="fa-solid fa-square-parking"></i>
                    </div>
                </div>
                <p>Total Slot Parkir</p>
                <h2 id="totalSlot">20</h2>
                <small>Jumlah seluruh slot parkir</small>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-green">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
                <p>Slot Tersedia</p>
                <h2 id="availableSlot">12</h2>
                <small>Slot yang dapat digunakan</small>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-red">
                        <i class="fa-solid fa-car"></i>
                    </div>
                </div>
                <p>Slot Terisi</p>
                <h2 id="occupiedSlot">8</h2>
                <small>Slot sedang digunakan</small>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon icon-orange">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                </div>
                <p>Total Reservasi</p>
                <h2>5</h2>
                <small>Data reservasi contoh</small>
            </div>
        </section>

        <!-- BANNER -->
        <section class="banner">
            <div class="banner-content">
                <small>SMART PARKING MANAGEMENT SYSTEM</small>
                <h2>Parkir Lebih Mudah,<br>Modern dan Terorganisir</h2>
                <p>Kelola ketersediaan slot parkir, reservasi, dan aktivitas kendaraan melalui satu dashboard.</p>
                <button onclick="document.getElementById('slots').scrollIntoView({behavior:'smooth'})">
                    Lihat Slot Parkir <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </section>

        <!-- MONITORING DAN AKSI -->
        <div class="content-grid">

            <section class="panel" id="slots">
                <div class="panel-header">
                    <div>
                        <h3>Monitoring Slot Parkir</h3>
                        <p>Pantau kondisi slot parkir secara langsung pada tampilan ini</p>
                    </div>
                    <a href="#slots" class="view-all">Lihat Semua</a>
                </div>

                <div class="zone-tabs">
                    <button class="active" onclick="pilihZona('A', this)">Zona A</button>
                    <button onclick="pilihZona('B', this)">Zona B</button>
                    <button onclick="pilihZona('C', this)">Zona C</button>
                </div>

                <div class="slot-grid" id="slotContainer"></div>

                <div class="legend">
                    <span><i class="dot dot-green"></i> Tersedia</span>
                    <span><i class="dot dot-red"></i> Terisi</span>
                </div>
            </section>

            <section class="panel" id="aksi">
                <div class="panel-header">
                    <div>
                        <h3>Aksi Cepat</h3>
                        <p>Akses menu pengelolaan sistem</p>
                    </div>
                </div>

                <div class="quick-actions">
                    <a href="#slots" class="quick-action">
                        <i class="fa-solid fa-square-plus"></i>
                        <strong>Kelola Slot</strong>
                        <span>Monitoring slot parkir</span>
                    </a>

                    <a href="#reservasi" class="quick-action">
                        <i class="fa-solid fa-calendar-plus"></i>
                        <strong>Reservasi</strong>
                        <span>Informasi reservasi</span>
                    </a>

                    <a href="#pengguna" class="quick-action">
                        <i class="fa-solid fa-user-group"></i>
                        <strong>Pengguna</strong>
                        <span>Data pengguna sistem</span>
                    </a>

                    <a href="#riwayat" class="quick-action">
                        <i class="fa-solid fa-file-lines"></i>
                        <strong>Laporan</strong>
                        <span>Riwayat aktivitas parkir</span>
                    </a>
                </div>
            </section>
        </div>

        <!-- RESERVASI -->
        <section class="panel" id="reservasi">
            <div class="panel-header">
                <div>
                    <h3>Reservasi Terbaru</h3>
                    <p>Contoh informasi reservasi tempat parkir</p>
                </div>
                <a href="#reservasi" class="view-all">Lihat Semua</a>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID RESERVASI</th>
                            <th>NAMA PENGGUNA</th>
                            <th>KENDARAAN</th>
                            <th>SLOT</th>
                            <th>WAKTU</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#RSV001</td>
                            <td>Andi Saputra</td>
                            <td>Mobil</td>
                            <td>A01</td>
                            <td>08:00</td>
                            <td><span class="status active">Aktif</span></td>
                        </tr>
                        <tr>
                            <td>#RSV002</td>
                            <td>Budi Santoso</td>
                            <td>Motor</td>
                            <td>A03</td>
                            <td>08:30</td>
                            <td><span class="status busy">Terpakai</span></td>
                        </tr>
                        <tr>
                            <td>#RSV003</td>
                            <td>Siti Rahma</td>
                            <td>Mobil</td>
                            <td>A05</td>
                            <td>09:00</td>
                            <td><span class="status waiting">Menunggu</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- PENGGUNA -->
        <section class="panel" id="pengguna">
            <div class="panel-header">
                <div>
                    <h3>Informasi Pengguna</h3>
                    <p>Ringkasan pengelolaan pengguna sistem</p>
                </div>
            </div>

            <p style="font-size:12px;color:#9994ad;line-height:1.8">
                Bagian ini disiapkan untuk menampilkan data pengguna yang terdaftar
                pada sistem Smart Parking. Data akan ditampilkan setelah fitur
                pengguna dihubungkan dengan database.
            </p>
        </section>

        <!-- RIWAYAT DAN AKTIVITAS -->
        <div class="content-grid">

            <section class="panel" id="riwayat">
                <div class="panel-header">
                    <div>
                        <h3>Riwayat Parkir</h3>
                        <p>Contoh aktivitas kendaraan</p>
                    </div>
                </div>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Slot</th>
                                <th>Aktivitas</th>
                                <th>Waktu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A01</td>
                                <td>Kendaraan Masuk</td>
                                <td>08:00</td>
                                <td><span class="status busy">Terisi</span></td>
                            </tr>
                            <tr>
                                <td>A03</td>
                                <td>Kendaraan Keluar</td>
                                <td>08:30</td>
                                <td><span class="status active">Selesai</span></td>
                            </tr>
                            <tr>
                                <td>A05</td>
                                <td>Reservasi</td>
                                <td>09:00</td>
                                <td><span class="status waiting">Menunggu</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section class="panel" id="aktivitas">
                <div class="panel-header">
                    <div>
                        <h3>Aktivitas Sistem</h3>
                        <p>Contoh aktivitas terbaru</p>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div>
                        <strong>Kendaraan memasuki area parkir</strong>
                        <p>Slot A01 digunakan oleh pengguna.</p>
                        <small>08:00 WIB</small>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fa-solid fa-qrcode"></i>
                    </div>
                    <div>
                        <strong>Reservasi berhasil dibuat</strong>
                        <p>Reservasi slot A05.</p>
                        <small>09:00 WIB</small>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div>
                        <strong>Kendaraan meninggalkan parkir</strong>
                        <p>Slot A03 kembali tersedia.</p>
                        <small>09:30 WIB</small>
                    </div>
                </div>
            </section>
        </div>

        <p style="text-align:center;color:#aaa4ba;font-size:10px;padding:10px">
            © 2026 Smart Parking Management System
        </p>

    </main>
</div>

<script>
    // Data simulasi untuk tampilan slot parkir
    const dataZona = {
        A: [false, false, true, false, true, false, true, false, false, false],
        B: [false, true, false, true, false, false, true, false, false, true],
        C: [false, false, false, true, false, true, false, false, true, false]
    };

    let zonaAktif = 'A';

    function tampilkanSlot(zona) {
        const container = document.getElementById('slotContainer');
        container.innerHTML = '';

        dataZona[zona].forEach((terisi, index) => {
            const nomor = String(index + 1).padStart(2, '0');

            const slot = document.createElement('div');
            slot.className = terisi ? 'slot occupied' : 'slot';

            slot.innerHTML = `
                <i class="fa-solid fa-car"></i>
                <strong>${zona}${nomor}</strong>
                <span>${terisi ? 'Terisi' : 'Tersedia'}</span>
            `;

            container.appendChild(slot);
        });

        hitungSlot();
    }

    function pilihZona(zona, tombol) {
        zonaAktif = zona;

        document.querySelectorAll('.zone-tabs button').forEach(btn => {
            btn.classList.remove('active');
        });

        tombol.classList.add('active');
        tampilkanSlot(zona);
    }

    function hitungSlot() {
        const semua = Object.values(dataZona).flat();
        const terisi = semua.filter(status => status).length;
        const tersedia = semua.length - terisi;

        document.getElementById('totalSlot').textContent = semua.length;
        document.getElementById('occupiedSlot').textContent = terisi;
        document.getElementById('availableSlot').textContent = tersedia;
    }

    // Tampilkan zona A saat halaman dibuka
    tampilkanSlot(zonaAktif);

    // Menu aktif saat diklik
    document.querySelectorAll('.menu a[href^="#"]').forEach(link => {
        link.addEventListener('click', function () {
            document.querySelectorAll('.menu a').forEach(item => {
                item.classList.remove('active');
            });

            this.classList.add('active');
        });
    });
</script>

</body>
</html>
