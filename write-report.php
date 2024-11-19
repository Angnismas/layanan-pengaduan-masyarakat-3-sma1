<h2>Berikan Laporan</h2>
<div class="col-8">
<div class="card">
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-12 mb-3">
          <label for="isi">Ketik Aduanmu</label>
          <textarea name="isi" required class="form-control" id="isi" rows="4"></textarea>
        </div>
        <div class="col-12 mb-3">
          <label for="foto">Foto</label>
          <input type="file" name="foto" id="foto" class="form-control" required>
        </div>
        <button type="submit" name="lapor" class="btn btn-primary ml-3">Laporkan</button>
        <button type="reset" class="btn btn-warning ml-3">Reset</button>

    </form>
  </div>
</div>
</div>
<?php
if(isset($_POST['lapor'])){
  $tgl = date('Y-m-d');
  $nik = $_SESSION['nik'];
  $isi = htmlspecialchars($_POST['isi']);
  $status = 0;
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  $ekstensi = array('png','jpg','jpeg');
  $eks = explode('.',$foto);
  $eks = strtolower(end($eks));
  $namabaru = rand().'-'.$nik.'.'.$eks;
  if(in_array($eks,$ekstensi)){
    move_uploaded_file($tmp,'foto/'.$namabaru);
    $save = mysqli_query($koneksi, "INSERT INTO pengaduan VALUES('','$tgl','$nik','$isi','$namabaru','$status')");
    if($save){
      ?>
      <script>
        alert('Aduanmu Berhasil Dilaporkan, Silahkan Cek Laporanmu di Menu Riwayat Laporan');
        window.location.assign('?url=history-report');
      </script>
      <?php
    }
  }else{
    echo 'Maaf File yang Anda Berikan bukan Sebuah Gambar';
  }
}
?>