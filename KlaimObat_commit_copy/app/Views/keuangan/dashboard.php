<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keuangan</title>

    <!-- CSS GLOBAL & DASHBOARD -->
    <link rel="stylesheet" href="<?= base_url('css/keuangan-ui.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/keuangan.css') ?>">
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <?= $this->include('keuangan/layout/sidebar') ?>
    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="topbar">
            <h1>Dashboard Statistik Per Karyawan</h1>
        </div>

        <?php $karyawanData = $karyawanData ?? []; ?>

        <!-- SEARCH + NAV -->
        <div class="dashboard-controls">
            <button class="nav-btn" onclick="prevKaryawan()">◀</button>
            <input type="text" id="searchNama" class="search-box" placeholder="Cari nama karyawan...">
            <button class="nav-btn" onclick="searchKaryawan()">Search</button>
            <button class="nav-btn" onclick="nextKaryawan()">▶</button>
        </div>

        <!-- KARYAWAN CARD -->
        <div class="karyawan-card">
            <h2 id="namaKaryawan">-</h2>
            <div class="stats-row">
                <div class="stat-box klaim">
                    <div>Total Klaim</div>
                    <h3 id="totalKlaim">0</h3>
                </div>
                <div class="stat-box total">
                    <div>Total Nominal</div>
                    <h3 id="totalNominal">0</h3>
                </div>
                <div class="stat-box limit">
                    <div>Plafon</div>
                    <h3 id="limitKlaim">0</h3>
                </div>
            </div>
            <canvas id="chartKaryawan"></canvas>
        </div>

    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    &copy; <?= date('Y') ?> Dashboard Keuangan
</div>

<!-- MODERN POPUP -->
<div id="popupOverlay" class="modern-popup-overlay">
    <div id="modernPopup" class="modern-popup">
        <p id="popupMessage">Nama tidak ditemukan!</p>
        <button onclick="closePopup()">OK</button>
    </div>
</div>

<!-- SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    window.karyawanData = <?= json_encode($karyawanData) ?>;
</script>
<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
</body>
</html>