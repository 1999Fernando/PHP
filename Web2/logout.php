<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /Web2/index.php');
?>
