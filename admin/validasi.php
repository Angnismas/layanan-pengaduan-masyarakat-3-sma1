<?php
mysqli_query($koneksi, "UPDATE pengaduan SET status='proses' WHERE id_pengaduan='$_GET[id]'")
?>

<script>
  alert('Pengaduan Telah Diverifikasi');
  window.location.assign('?url=verifikasi-laporan');
</script>