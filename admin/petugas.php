<h2>Data Petugas</h2>
<div class="card">
  <div class="card-body">
    <a href="?url=tambah-petugas" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>No Telp</th>
          <th>Level</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbdy>
        <?php
        $no = 1;
        $masyarakat = mysqli_query($koneksi,"SELECT * FROM petugas WHERE id_petugas!='$_SESSION[id_petugas]' ");
        while($data=mysqli_fetch_array($masyarakat)):
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nama_petugas'] ?></td>
          <td><?= $data['username'] ?></td>
          <td><?= $data['telp'] ?></td>
          <td><?= $data['level'] ?></td>
          <td>
          <a href="?url=hapus-petugas&id=<?= $data['id_petugas'] ?>" onclick="return confirm('Anda Yakin Petugas Akan Dihapus ?')" class="btn btn-danger btn-circle">
            <i class="fas fa-trash"></i>
          </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbdy>
    </table>
  </div>
</div>