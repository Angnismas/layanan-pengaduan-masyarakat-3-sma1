<h2>Daftar Pengaduan Masyarakat</h2>
<div class="card">
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Pelapor</th>
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
          <td>
          <?php if($data['status']=='0'): ?>
              <a href="?url=validasi&id=<?= $data['id_pengaduan'] ?>" onclick="return confirm('Apakah Anda Yakin Pengaduan Akan di Verifikasi ?')" class="btn btn-danger">Verifikasi Laporan</a>

            <?php elseif($data['status']=='proses'): ?>
              <a href="?url=tanggapan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-warning">Tanggapi Laporan</a>
            <?php elseif($data['status']=='selesai'): ?>
              <a href="?url=detail-laporan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-info">Detail Pengaduan</a>
              <?php endif; ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>