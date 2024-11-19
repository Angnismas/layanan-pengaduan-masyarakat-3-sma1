<h2>
  Buat Tanggapan
</h2>
<div class="card">
  <div class="card-header">
    <a href="?url=verifikasi-laporan" class="btn btn-warning">Kembali</a>
  </div>
  <div class="card-body">
    <?php
    $id = $_GET['id'];
    $pengaduan = mysqli_query($koneksi,"SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE id_pengaduan='$id'");
    $data = mysqli_fetch_array($pengaduan);
    if(mysqli_num_rows($pengaduan)>0):
    ?>
    <h5><?= $data['tanggapan'] ?></h5>
    <small class="text-muted">Ditanggapi Tgl : <?= $data['tgl_tanggapan'] ?> -  Oleh : <?= $data['nama_petugas'] ?></small>
    <br>
    <a href="?url=selesai&id=<?= $id; ?>" class="btn btn-primary mt-2" onclick="return confirm('Apakah Anda Yakin Pengaduan Telah Diselesaikan ?')" >Selesaikan Pengaduan</a>
    <?php else :?>
    <form action="" method="post">
      <textarea name="tanggapan" class="form-control col-6" id="" rows="6"></textarea>
      <button type="submit" class="btn btn-primary mt-2" name="kirim">Kirim</button>
    </form>
    <?php endif ; ?>
  </div>
</div>
<?php
if(isset($_POST['kirim'])){
  $pengaduan = $_GET['id'];
  $tanggal = date('Y-m-d');
  $tanggapan = htmlspecialchars($_POST['tanggapan']);
  $petugas = $_SESSION['id_petugas'];

  $save = mysqli_query($koneksi,"INSERT INTO tanggapan VALUES('','$pengaduan','$tanggal','$tanggapan','$petugas')");
  if($save){
    ?>
    <script>
      alert('Pengaduan Telah Ditanggapi');
      window.location.assign('?url=verifikasi-laporan');
</script>
    <?php
  }
}
?>
