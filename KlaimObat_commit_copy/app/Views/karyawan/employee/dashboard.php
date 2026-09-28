<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Karyawan</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            background-color: #f8fafc;
            min-height: 100vh;
        }

        /* Container Sidebar agar punya lebar tetap dan tidak membuat konten menumpuk */
        .sidebar-wrapper {
            width: 260px;
            flex-shrink: 0;
        }

        /* Area Konten Utama */
        .main-container {
            flex-grow: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .alert-info {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            border: 1px solid #bae6fd;
        }

        .card {
            background: #ffffff;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
        }

        th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-approved {
            background: #dcfce7;
            color: #166534;
        }

        .badge-rejected {
            background: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>

<body>

    <!-- PEMANGGILAN SIDEBAR -->
    <div class="sidebar-wrapper">
        <?= $this->include('karyawan/layout/sidebar') ?>
    </div>

    <!-- AREA KONTEN UTAMA -->
    <div class="main-container">
        <h2 style="margin-bottom: 8px; color: #0f172a;">Dashboard Karyawan</h2>
        <p style="color: #64748b; margin-bottom: 24px;">Selamat datang, <strong><?= esc($employee['full_name'] ?? 'Karyawan') ?></strong></p>

        <?php if (session()->getFlashdata('success')) : ?>
            <div style="background: #d1e7dd; color: #0f5132; padding: 12px; margin-bottom: 16px; border-radius: 6px;">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Informational Banner -->
        <div class="alert-info">
            💡 Sisa plafon klaim Anda untuk tahun ini:
            <strong>Rp <?= number_format(max(0, (int) ($limit['max_claim_amount'] ?? 0) - (int) ($limit['used_amount'] ?? 0)), 0, ',', '.') ?></strong>
        </div>

        <!-- Tabel Riwayat Klaim -->
        <div class="card">
            <h3 style="color: #1e293b; font-size: 18px;">Riwayat Klaim</h3>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($claims)) : ?>
                        <?php foreach ($claims as $claim) : ?>
                            <tr>
                                <td><?= esc($claim['claim_date']) ?></td>
                                <td><?= esc($claim['claim_description']) ?></td>
                                <td>Rp <?= number_format($claim['claim_amount'], 0, ',', '.') ?></td>
                                <td>
                                    <?php
                                    $statusClass = 'badge-pending';
                                    if (in_array($claim['status'], ['APPROVED', 'DIBAYARKAN'])) $statusClass = 'badge-approved';
                                    if (in_array($claim['status'], ['REJECTED', 'DITOLAK'])) $statusClass = 'badge-rejected';
                                    ?>
                                    <span class="badge <?= $statusClass ?>">
                                        <?= esc($claim['status']) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" style="text-align: center; color: #94a3b8; padding: 24px;">
                                Belum ada pengajuan klaim
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>