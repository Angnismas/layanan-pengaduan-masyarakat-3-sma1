<div class="card">
  <div class="card-header">
    <a href="?url=petugas" class="btn btn-warning">Kembali</a>
  </div>
  <div class="card-body">
    <h3>Form Tambah Petugas</h3>
    <form action="" method="post">
      <div class="row mb-1">
        <label for="" class="col-md-2">Nama</label>
        <div class="col-md-6">
          <input type="text" name="nama" placeholder="Nama Petugas" required id="" class="form-control">
        </div>
      </div>

      <div class="row mb-1">
        <label for="" class="col-md-2">Username</label>
        <div class="col-md-6">
          <input type="text" name="username" placeholder="Username Petugas" required id="" class="form-control">
        </div>
      </div>

      <div class="row mb-1">
        <label for="" class="col-md-2">Password</label>
        <div class="col-md-6">
          <input type="password" name="password" placeholder="Password Petugas" required id="" class="form-control">
        </div>
      </div>

      <div class="row mb-1">
        <label for="" class="col-md-2">No Telepon</label>
        <div class="col-md-6">
          <input type="number" name="telp" placeholder="No Telp Petugas" required id="" class="form-control">
        </div>
      </div>

      <div class="row mb-1">
        <label for="" class="col-md-2">Level</label>
        <div class="col-md-6">
          <select name="level" id="" class="form-control">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
          </select>
        </div>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>
    </form>
  </div>
</div>


<?php
if(isset($_POST['simpan'])){
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars(strtolower($_POST['username']));
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $telp = htmlspecialchars($_POST['telp']);
    $level = $_POST['level'];

    include 'koneksi.php';

    $cek = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username'");
    if(mysqli_num_rows($cek)>0){
        ?>
        <script>
            alert('NIK/Username Sudah Terdaftar');
        </script>
        <?php
    }else{
        $register = mysqli_query($koneksi,"INSERT INTO petugas VALUES('','$nama','$username','$password','$telp','$level')");
        if($register){
            ?>
            <script>
                alert('Petugas Berhasil Ditambahkan');
                window.location.assign('?url=petugas');
            </script>
            <?php
        }
    }
}