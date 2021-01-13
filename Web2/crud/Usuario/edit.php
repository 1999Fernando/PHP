<?php
include("C:/xampp/htdocs/Web2/crud/db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuario WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $emial = $row['email'];
    $pass = $row['password'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['name'];
  $correo = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $query = "UPDATE usuario set name = '$nombre', email = '$correo', password = '$password' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('C:/xampp/htdocs/Web2/crud/includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Name">
        </div>
        <div class="form-group">
          <input name="email" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Email">
        </div>
        <div class="form-group">
          <input name="password" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Password">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('C:/xampp/htdocs/Web2/crud/includes/footer.php'); ?>
