<?php
session_start();
if(empty($_SESSION['login'])){
    header('location:login.php');
}
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .gambar{
            max-width: 150px;
        }
    </style>

</head>

<body id="page-top">
  <div class="text-center mt-2">
    <h4>PEMERINTAH KABUPATEN KUTAI KARTANEGARA</h4>
    <h3>KECAMATAN TENGGARONG</h3>
    <p>Jl. Akhmad Muhsin KecamatanTenggarong Kab.Kutai Kartanegara - Kalimantan Timur</p>
  </div>
  <hr>
<h5 class="text-center mb-3">Laporan Pengaduan Masyarakat</h5>
<div class="">
  <div class="card-body">
    <table class="table table-bordered">
      <thead class="text-center">
        <tr>
          <th>No</th>
          <th>Pelapor</th>
          <th>Tanggal Pengaduan</th>
          <th>Isi Pengaduan</th>
          <th>Foto</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik=masyarakat.nik");
        while($data = mysqli_fetch_array($pengaduan)):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['tgl_pengaduan'] ?></td>
          <td><?= $data['isi_laporan'] ?></td>
          <td>
            <img src="../foto/<?= $data['foto'] ?>" class="gambar" alt="">
          </td>
          <td>
            <?php if($data['status']=='0'): ?>
              <span class="badge bg-warning text-light">Belum Diproses</span>

            <?php elseif($data['status']=='proses'): ?>
              <span class="badge bg-primary text-light">Sedang Diproses</span>

            <?php elseif($data['status']=='selesai'): ?>
              <span class="badge bg-success text-light">Selesai Diproses</span>
              <?php endif; ?>
          </td>
          
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <div class="text-right p-0">
    <p>Tenggarong, <?= date('d-M-Y'); ?></p>
    <p>Petugas</p>
    <br><br><br>
    <strong><?= $_SESSION['nama_petugas']; ?></strong>
  </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>