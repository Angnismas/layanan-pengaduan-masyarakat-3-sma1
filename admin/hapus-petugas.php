<?php
mysqli_query($koneksi,"DELETE FROM petugas WHERE id_petugas='$_GET[id]'");
?>
<script>
  alert('Petugas Telah Berhasil Di Hapus');
  window.location.assign('?url=petugas');
</script>