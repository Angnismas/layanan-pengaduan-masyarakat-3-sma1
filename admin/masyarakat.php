<h2>Data Masyarakat</h2>
<div class="card">
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Username</th>
          <th>No Telp</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbdy>
        <?php
        $no = 1;
        $masyarakat = mysqli_query($koneksi,"SELECT * FROM masyarakat");
        while($data=mysqli_fetch_array($masyarakat)):
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['nik'] ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['username'] ?></td>
          <td><?= $data['telp'] ?></td>
          <td>
          <a href="" class="btn btn-danger btn-circle">
            <i class="fas fa-trash"></i>
          </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbdy>
    </table>
  </div>
</div>