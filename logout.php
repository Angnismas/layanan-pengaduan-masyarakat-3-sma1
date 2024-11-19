<?php
session_start();
session_destroy();
?>
<script>
  alert('You Succesfully Logged out');
  window.location.assign('login.php');
</script>