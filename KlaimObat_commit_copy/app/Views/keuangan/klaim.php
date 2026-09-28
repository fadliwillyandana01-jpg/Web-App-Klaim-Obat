<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klaim Disetujui HRD</title>

    <!-- CSS GLOBAL & UI KEUANGAN -->
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
                <h1>Klaim Disetujui HRD</h1>
            </div>

            <!-- NOTIFIKASI FLASH MESSAGE -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" style="padding:10px; background:#dcfce7; color:#15803d; border-radius:6px; margin-bottom:15px;">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" style="padding:10px; background:#fee2e2; color:#b91c1c; border-radius:6px; margin-bottom:15px;">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- TABEL DATA KLAIM -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($klaim)): ?>
                        <?php foreach ($klaim as $k): ?>
                            <tr>
                                <td>#<?= esc($k['claim_id']) ?></td>
                                <td><?= esc($k['full_name']) ?></td>
                                <td><?= esc($k['employee_nik']) ?></td>
                                <td><?= esc($k['position']) ?></td>
                                <td><?= esc($k['department']) ?></td>
                                <td>Rp <?= number_format((float)$k['claim_amount'], 0, ',', '.') ?></td>
                                <td>
                                    <div style="display:flex; gap:6px; justify-content:center;">

                                        <!-- FORM BAYAR -->
                                        <form method="post" action="<?= base_url('keuangan/bayar/' . $k['claim_id']) ?>">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-success">Bayarkan</button>
                                        </form>

                                        <!-- FORM TOLAK -->
                                        <form method="post"
                                            action="<?= base_url('keuangan/tolak/' . $k['claim_id']) ?>"
                                            onsubmit="return confirm('Yakin mau menolak klaim ini?')">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger">Tolak</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align:center; padding: 20px; color: #6b7280;">
                                Belum ada pengajuan klaim baru yang disetujui oleh HRD.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>