<div class="sidebar">
  <h2 class="logo">💊 Klaim Obat</h2>

  <ul style="list-style: none; padding: 0; margin: 0; width: 100%;">
    <li style="margin-bottom: 8px;">
      <a href="<?= base_url('keuangan') ?>" class="<?= url_is('keuangan') || url_is('keuangan/dashboard') ? 'active' : '' ?>">Dashboard</a>
    </li>
    <li style="margin-bottom: 8px;">
      <a href="<?= base_url('keuangan/klaim') ?>" class="<?= url_is('keuangan/klaim') ? 'active' : '' ?>">Klaim</a>
    </li>
    <li style="margin-bottom: 8px;">
      <a href="<?= base_url('keuangan/riwayat') ?>" class="<?= url_is('keuangan/riwayat') ? 'active' : '' ?>">Riwayat</a>
    </li>
    <li class="logout" style="margin-top: 20px;">
      <a href="<?= base_url('logout') ?>" onclick="return confirm('Yakin ingin keluar?')" style="color: #ef4444;">Logout</a>
    </li>
  </ul>
</div>