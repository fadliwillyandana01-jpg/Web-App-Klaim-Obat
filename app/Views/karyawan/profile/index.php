<?= $this->extend('karyawan/layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* BODY & CARDS */
    .card {
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.12);
    }

    /* HEADER */
    h4, h5 {
        color: #0b6e4f; 
        font-weight: 700;
    }

    /* BUTTONS */
    .btn-success {
        border-radius: 12px;
        padding: 5px 15px;
        background: linear-gradient(90deg, #34d399, #3b82f6); 
        border: none;
        color: #fff;
        transition: transform 0.2s;
    }
    .btn-success:hover {
        transform: translateY(-2px);
        background: linear-gradient(90deg, #10b981, #2563eb);
    }
    .btn-outline-primary {
        border-radius: 12px;
        border: 2px solid #3b82f6;
        color: #3b82f6;
        transition: transform 0.2s, background 0.3s, color 0.3s;
    }
    .btn-outline-primary:hover {
        background: #3b82f6;
        color: #fff;
        transform: translateY(-2px);
    }
    .btn-outline-secondary {
        border-radius: 12px;
        border: 2px solid #6c757d;
        color: #6c757d;
        padding: 5px 15px;
        margin-bottom: 15px;
        display: inline-block;
        transition: transform 0.2s, background 0.3s, color 0.3s;
    }
    .btn-outline-secondary:hover {
        background: #6c757d;
        color: #fff;
        transform: translateY(-2px);
    }

    /* LIST GROUP */
    .list-group-item {
        border-radius: 10px;
        margin-bottom: 5px;
        border: 1px solid #e2e8f0;
        transition: background 0.2s;
    }
    .list-group-item:hover {
        background: #f0fdf4; 
    }

    .text-primary {
        color: #0d6efd !important;
    }

    .text-muted {
        color: #6c757d !important;
    }

</style>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <!-- TOMBOL KEMBALI KE DASHBOARD EMPLOYEE -->
<a href="<?= base_url('karyawan/dashboard') ?>" class="btn btn-outline-secondary">⬅️ Kembali</a>

        <div class="d-flex justify-content-between align-items-center mb-3 mt-2">
            <h4 class="mb-0">Profil Saya</h4>
            <a href="#" class="btn btn-outline-primary btn-sm">✏️ Edit Profil</a>
        </div>

        <hr>

        <!-- INFORMASI AKUN -->
        <div class="card card-profile shadow-sm mb-4">
            <div class="card-body">
                <h5>Informasi Akun</h5>
                <p><b>Nama:</b> <?= esc($user['full_name']) ?></p>
                <p><b>Username:</b> <?= esc($user['username']) ?></p>
                <p><b>Role:</b> <?= esc($user['role']) ?></p>
            </div>
        </div>

        <!-- DATA EMPLOYEE -->
        <div class="card card-employee shadow-sm mb-4">
            <div class="card-body">
                <h5>Data Employee</h5>
                <p><b>NIK:</b> <?= esc($employee['employee_nik']) ?></p>
                <p><b>Posisi:</b> <?= esc($employee['position']) ?></p>
                <p><b>Departemen:</b> <?= esc($employee['department']) ?></p>
                <p><b>Gaji:</b> Rp <?= number_format($employee['base_salary']) ?></p>
            </div>
        </div>

        <!-- TANGGUNGAN -->
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="text-primary mb-0">Tanggungan</h5>
            <a href="#" class="btn btn-success btn-sm">➕ Tambah</a>
        </div>

        <?php if (!empty($dependents)): ?>
            <ul class="list-group mt-3">
                <?php foreach ($dependents as $d): ?>
                    <li class="list-group-item">
                        <?= esc($d['name']) ?> — <small><?= esc($d['relation']) ?></small>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php else: ?>
            <p class="text-muted mt-3">Belum ada tanggungan</p>
        <?php endif; ?>

    </div>
</div>

<?= $this->endSection() ?>