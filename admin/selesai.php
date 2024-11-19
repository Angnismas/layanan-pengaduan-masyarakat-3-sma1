<?php
mysqli_query($koneksi, "UPDATE pengaduan SET status='selesai' WHERE id_pengaduan='$_GET[id]'")
?>

<script>
  alert('Pengaduan Telah Selesai Diproses');
  window.location.assign('?url=verifikasi-laporan');
</script>