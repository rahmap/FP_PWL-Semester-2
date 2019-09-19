<?php
include '../data/koneksi.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Member - My Profile</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
<body>
<?php
if (isset($_COOKIE['username']) AND isset($_COOKIE['id'])) {


  $id = $_COOKIE['id'];
  $cookie_user = $_COOKIE['username'];
  
  $result = mysqli_query($conn, "SELECT username,email,password,fullname,gambar FROM data_user 
                                WHERE id_user = '$id' ");
  $row = mysqli_fetch_assoc($result);

  if ($cookie_user === hash('Sha256', $row['username'])) {
    $_SESSION['id_user'] = true;
  } 
}
else if (isset($_SESSION['username'])) {

  $result = mysqli_query($conn, "SELECT username,email,password,fullname,gambar FROM data_user 
                                WHERE id_user = '".$_SESSION['id_user']."' ");
  $row = mysqli_fetch_assoc($result);
}
?>
<nav class="navbar navbar-expand-md bg-secondary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i><b> <!--  HOME --> </b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
      aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
    <a class="btn navbar-btn btn-primary ml-2 text-white" href="../shop/shop.php"><i class="fa d-inline fa-lg  fa fa-shopping-cart"></i> Shop</a>  <!-- NAVBAR SHOP -->
  </div>
</nav>
<div class="py-5" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <img  class="card-img-top" src="../img_user/<?php echo $row['gambar'] ?>" alt="Card image cap">
          <ul class="list-group list-group-flush">
            <li class="list-group-item" style="background: #EFAB0A">
              <em>Full Name</em>
                <p style="font-size: 20px"><b><?php echo $row['fullname'] ?></b></p>
            </li>
            <li class="list-group-item" style="background: #FFD944">
              <em>Username</em>
                <p style="font-size: 20px"><b><?php echo $row['username'] ?></b></p>
            </li>
            <li class="list-group-item" style="background: #04CA95">
              <em>Email</em>
                <p style="font-size: 20px"><b><?php echo $row['email'] ?></b></p>
            </li>
            <li class="list-group-item" style="background: #42E1F4">
              <em>Password</em>
                <p><b>*********</b></p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="text-center" style="margin-bottom: 40px; margin-top: -30px">
    <div class="col-12">
      <a href="member-update.php"><button type="submit" class="btn btn-danger"><i class="fa d-inline fa-lg  fa fa-edit"></i> Update Profile</button></a>
  </div>
</div>
  <div class="py-1 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Rahmatvv - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
<?php   if (!isset($_SESSION['id_user'])) {
  header("location:../index.php");
  } ?>