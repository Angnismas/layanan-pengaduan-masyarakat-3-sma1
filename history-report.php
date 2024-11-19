<h2>Riwayat Laporan</h2>
<div class="card">
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Pengaduan</th>
          <th>Isi Pengaduan</th>
          <th>Foto</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]'");
        while($data = mysqli_fetch_array($pengaduan)):
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $data['tgl_pengaduan'] ?></td>
          <td><?= $data['isi_laporan'] ?></td>
          <td>
            <img src="foto/<?= $data['foto'] ?>" class="gambar" alt="">
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
          <td>
            <a href="?url=detail-laporan&id=<?= $data['id_pengaduan']; ?>" class="btn btn-primary">Detail</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>