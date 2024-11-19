<h2>Dashboard</h2>
<div class="card">
  <div class="card-body">
    <p>
      Hai, <?= $_SESSION['nama_petugas']?>
    </p>
    <h4>
      Selamat Datang Di Web Pengaduan Masyarakat (E-REPORT)
    </h4>
    <p>
      Anda Login Sebagai : <?= $_SESSION['level'] ?>
    </p>

    <a href="?url=verifikasi-laporan" class="btn btn-primary">Verifikasi Laporan</a>
  </div>
</div>