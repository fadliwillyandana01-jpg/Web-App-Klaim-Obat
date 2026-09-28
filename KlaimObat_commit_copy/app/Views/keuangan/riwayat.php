<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pencairan</title>

    <!-- CSS GLOBAL & KEUANGAN -->
    <link rel="stylesheet" href="<?= base_url('css/keuangan-ui.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/keuangan.css') ?>">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #f3f4f6;
        }

        .status-bayar {
            background: #22c55e;
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-tolak {
            background: #ef4444;
            color: #fff;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <!-- SIDEBAR -->
        <?= $this->include('keuangan/layout/sidebar') ?>


        <!-- MAIN CONTENT -->
        <div class="main">

            <div class="topbar">
                <h1>Riwayat Pencairan</h1>
            </div>

            <div style="margin-bottom: 15px;">
                <a href="<?= base_url('keuangan/exportPdf') ?>" target="_blank" class="btn btn-primary" style="text-decoration:none; display:inline-block; padding:8px 16px; background:#4f46e5; color:#fff; border-radius:6px;">
                    📄 Export PDF
                </a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Tanggal Proses</th>
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
                                <td>Rp <?= number_format((float)($k['claim_amount'] ?? 0), 0, ',', '.') ?></td>

                                <!-- STATUS -->
                                <td>
                                    <?php if ($k['status'] === 'DIBAYARKAN_KEUANGAN'): ?>
                                        <span class="status-bayar">DIBAYAR</span>
                                    <?php elseif ($k['status'] === 'DITOLAK_KEUANGAN'): ?>
                                        <span class="status-tolak">DITOLAK</span>
                                    <?php else: ?>
                                        <span>-</span>
                                    <?php endif; ?>
                                </td>

                                <!-- TANGGAL PROSES -->
                                <td>
                                    <?= !empty($k['paid_at'])
                                        ? date('d-m-Y H:i', strtotime($k['paid_at']))
                                        : (!empty($k['claim_date']) ? date('d-m-Y', strtotime($k['claim_date'])) : '-') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" style="text-align:center; padding:20px; color:#6b7280;">
                                Belum ada riwayat pencairan klaim.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>