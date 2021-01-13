<?php

include('C:/xampp/htdocs/Web2/crud/db.php');

if (isset($_POST['save_task'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $query = "INSERT INTO usuario(name, email, password) VALUES ('$name', '$email', '$password')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
