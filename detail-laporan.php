<?php
$id=$_GET['id'];
$pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_array($pengaduan);
?>

<h2>Detail Laporan</h2>
<div class="card">
  <div class="card-body">
    <div class="card">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="foto/<?= $data['foto'] ?>" class="img-fluid rounded-start" alt="">
        </div>
        <div class="col-md-8 p-0">
          <p class="card-text mt-3 ">
            <?= $data['isi_laporan']; ?>
          </p>
          <small class="text-muted">
            Diadukan Pada Tanggal : <?= $data['tgl_pengaduan']; ?> - 
            Status Pengaduan : <?php if($data['status']=='0'): ?>
              <span class="badge bg-warning text-light">Belum Diproses</span>

            <?php elseif($data['status']=='proses'): ?>
              <span class="badge bg-primary text-light">Sedang Diproses</span>

            <?php elseif($data['status']=='selesai'): ?>
              <span class="badge bg-success text-light">Selesai Diproses</span>
              <?php endif; ?>
          </small>
          <br>
          <a href="?url=history-report" class="btn btn-info mt-3">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mt-4">
  <div class="card-header">Tanggapan Petugas</div>
  <div class="card-body">
  <?php 
$tanggapan = mysqli_query($koneksi,"SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE id_pengaduan='$id'");

if(mysqli_num_rows($tanggapan) > 0):
    while ($row = mysqli_fetch_array($tanggapan)): // Mengambil data dari $tanggapan
?>
    <p class="card-text mt-3">
        <?= $row['tanggapan']; ?>
    </p>
    <small class="text-muted">
        Ditanggapi Pada Tanggal: <?= $row['tgl_tanggapan']; ?> - 
        Oleh: <?= $row['nama_petugas']; ?>
    </small>
<?php 
    endwhile; // Akhiri loop while
else: 
?>
    <div class="alert alert-danger">
        Maaf Pengaduan Anda Belum Ditanggapi
    </div>
<?php endif; ?>
  </div>
</div>