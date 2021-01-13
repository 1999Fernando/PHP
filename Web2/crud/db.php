<?php
session_start();
$_SESSION['user_id']='1';
$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'test2'
) or die(mysqli_erro($mysqli));
?>
