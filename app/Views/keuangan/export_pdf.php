<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Klaim Keuangan</title>

    <style>
        @page {
            margin: 20px 25px 40px 25px;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 10pt;
            color: #1f2937;
        }

        /* Header Menggunakan Layout Tabel Agar Didukung Dompdf */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            border-bottom: 2px solid #4f46e5;
            padding-bottom: 8px;
        }

        .header-table td {
            border: none;
            padding: 0;
        }

        .header-title {
            text-align: center;
            color: #4f46e5;
            font-size: 16pt;
            font-weight: bold;
            margin: 0;
        }

        /* Tabel Data */
        table.data-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        table.data-table thead th {
            background-color: #4f46e5;
            color: #ffffff;
            font-weight: bold;
            padding: 7px 5px;
            border: 1px solid #c7d2fe;
            text-align: center;
            font-size: 9.5pt;
        }

        table.data-table tbody td {
            padding: 6px 5px;
            border: 1px solid #e5e7eb;
            text-align: center;
            font-size: 9pt;
        }

        table.data-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        /* Stylings Status Badge untuk Dompdf */
        .status-DIBAYARKAN_KEUANGAN {
            background-color: #16a34a;
            color: #ffffff;
            font-weight: bold;
            padding: 3px 6px;
            font-size: 8.5pt;
        }

        .status-DITOLAK_KEUANGAN {
            background-color: #dc2626;
            color: #ffffff;
            font-weight: bold;
            padding: 3px 6px;
            font-size: 8.5pt;
        }

        table.data-table tfoot td {
            font-weight: bold;
            background-color: #e0e7ff;
            padding: 7px;
            text-align: center;
            border: 1px solid #c7d2fe;
        }

        footer {
            position: fixed;
            bottom: -20px;
            left: 0;
            right: 0;
            font-size: 8.5pt;
            color: #6b7280;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            padding-top: 5px;
        }

        .page-number:after {
            content: counter(page);
        }
    </style>
</head>
<body>

<!-- HEADER -->
<table class="header-table">
    <tr>
        <td class="header-title">LAPORAN KLAIM KEUANGAN</td>
    </tr>
</table>

<!-- TABEL DATA -->
<table class="data-table">
    <thead>
        <tr>
            <th width="4%">No</th>
            <th width="16%">Nama</th>
            <th width="10%">NIK</th>
            <th width="12%">Jabatan</th>
            <th width="12%">Departemen</th>
            <th width="8%">ID Klaim</th>
            <th width="14%">Nominal</th>
            <th width="14%">Status</th>
            <th width="10%">Tanggal</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $total_all = 0;
    $no = 1;
    if (!empty($klaim)):
        foreach ($klaim as $k):
            $total_all += (float) ($k['claim_amount'] ?? 0);
            $tanggal = !empty($k['paid_at']) 
                ? date('d-m-Y', strtotime($k['paid_at'])) 
                : (!empty($k['claim_date']) ? date('d-m-Y', strtotime($k['claim_date'])) : '-');
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td style="text-align: left;"><?= esc($k['full_name'] ?? '-') ?></td>
            <td><?= esc($k['employee_nik'] ?? '-') ?></td>
            <td><?= esc($k['position'] ?? '-') ?></td>
            <td><?= esc($k['department'] ?? '-') ?></td>
            <td>#<?= esc($k['claim_id'] ?? '-') ?></td>
            <td style="text-align: right;">Rp <?= number_format((float)($k['claim_amount'] ?? 0), 0, ',', '.') ?></td>
            <td>
                <span class="status-<?= esc($k['status']) ?>">
                    <?= esc(str_replace('_', ' ', $k['status'])) ?>
                </span>
            </td>
            <td><?= $tanggal ?></td>
        </tr>
    <?php 
        endforeach;
    else: 
    ?>
        <tr>
            <td colspan="9">Tidak ada data laporan klaim.</td>
        </tr>
    <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" style="text-align: right;">Total Keseluruhan:</td>
            <td colspan="3" style="text-align: left; font-size: 10pt;">Rp <?= number_format($total_all, 0, ',', '.') ?></td>
        </tr>
    </tfoot>
</table>

<!-- FOOTER -->
<footer>
    Dicetak pada: <?= date('d-m-Y H:i') ?> | Halaman <span class="page-number"></span>
</footer>

</body>
</html>