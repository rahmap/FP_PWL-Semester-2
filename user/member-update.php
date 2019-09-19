<?php
include '../data/koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Member - Update Profile</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
<body>
<?php
if (isset($_COOKIE['username']) AND isset($_COOKIE['id'])) {

  $id1 = $_COOKIE['id'];
  $cookie_user1 = $_COOKIE['username'];
  
  $result = mysqli_query($conn, "SELECT username,email,password,fullname,gambar FROM data_user WHERE id_user = '$id1' ");
  $row = mysqli_fetch_assoc($result);

  if ($cookie_user1 === hash('Sha256', $row['username'])) {
    $_SESSION['id_user'] = true;
  }
  if (isset($_POST['update'])) {

  $pass = htmlspecialchars($_POST['password']);
  $pass1 = htmlspecialchars($_POST['password1']);
  $pass1_fix = htmlspecialchars($_POST['password1-fix']);

  $psw_row_db = $row['password']; //PASSWORD DI DB
    if (empty($pass) OR empty($pass1) OR empty($pass1_fix)) {
        echo '<script language="javascript">
                swal({
                     title: "FORM BELUM DI ISI SEMUA!",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }

    else if ($pass != $psw_row_db) {
        echo '<script language="javascript">
                swal({
                     title: "GAGAL!",
                     text: "Kata sandi lama salah",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }
    else if ($pass1 != $pass1_fix){
          echo '<script language="javascript">
                swal({
                     title: "GAGAL!",
                     text: "Kata sandi tidak cocok dengan kata sandi konfirmasi",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }
    else if ($pass == $pass1_fix AND $pass == $pass1){
          echo '<script language="javascript">
                swal({
                     title: "GAGAL!",
                     text: "Kata sandi baru sama dengan kata sandi lama",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }
    else{
      $update = mysqli_query($conn, "UPDATE data_user SET  password = '$pass1' 
                                    WHERE id_user = '".$_COOKIE['id']."' ");
        if ($update) {
        session_destroy();
        setcookie('id','',time()-3600,'/','localhost');
        setcookie('username','',time()-3600,'/','localhost');
        setcookie('fn','',time()-3600,'/','localhost');
          if (isset($_COOKIE['admin'])) {
            setcookie('admin','',time()-3600,'/','localhost');
          }
        echo '<script language="javascript">
                swal({
                     title: "Data anda telah diupdate!",
                     text: "Silahkan login kembali",
                     type: "success"
                 }).then(function() {
                     window.location = "../index.php";
                 });
               </script>';
         }else{
            echo '<script language="javascript">
              swal("GAGAL!","Cek kembali data anda")
              </script>';
         }
      
    }
  }
}
else if (isset($_SESSION['username'])) {

  $result = mysqli_query($conn, "SELECT username,email,password,fullname,gambar FROM data_user WHERE id_user = '".$_SESSION['id_user']."' ");
  $row = mysqli_fetch_assoc($result);

  if (isset($_POST['update'])) {

  $pass = htmlspecialchars($_POST['password']);
  $pass1 = htmlspecialchars($_POST['password1']);
  $pass1_fix = htmlspecialchars($_POST['password1-fix']);


    $psw_row_db = $row['password'];
    if (empty($pass) OR empty($pass1) OR empty($pass1_fix)) {
        echo '<script language="javascript">
                swal({
                     title: "FORM BELUM DI ISI SEMUA!",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }

    else if ($pass != $psw_row_db) {
        echo '<script language="javascript">
                swal({
                     title: "GAGAL!",
                     text: "Kata sandi lama salah",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }
    else if ($pass1 != $pass1_fix){
          echo '<script language="javascript">
                swal({
                     title: "GAGAL!",
                     text: "Kata sandi tidak cocok dengan kata sandi konfirmasi",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }
    else if ($pass == $pass1_fix AND $pass == $pass1){
          echo '<script language="javascript">
                swal({
                     title: "GAGAL!",
                     text: "Kata sandi baru sama dengan kata sandi lama",
                 }).then(function() {
                     window.location = "member-update.php";
                 });
          </script>';
    }
    else{
      $update = mysqli_query($conn, "UPDATE data_user SET  password = '$pass1' 
                                    WHERE id_user = '".$_SESSION['id_user']."' ");
        if ($update) {
        session_destroy();
        setcookie('id','',time()-3600);
        setcookie('username','',time()-3600);
        setcookie('fn','',time()-3600);
        echo '<script language="javascript">
                swal({
                     title: "Data anda telah diupdate!",
                     text: "Silahkan login kembali",
                     type: "success"
                 }).then(function() {
                     window.location = "../index.php";
                 });
               </script>';
         }else{
            echo '<script language="javascript">
              swal("GAGAL!","Cek kembali data anda")
              </script>';
         }
      
    }
  }
}
?>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i><b> <!--  HOME --> </b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
          <a class="btn navbar-btn btn-primary ml-2 text-white" href="member.php"><i class="fa d-inline fa-lg  fa fa-id-badge"></i> My Profile</a>
    </div>
  </nav>
  <div class="py-2">
  	<div class="py-2 text-center">
  		<h1 class="display-3 mb-4">Perbarui Data Anda</h1>
  	</div>
    <div class="container">
      <div class="row">

        <div class="col-md-12">

          <div class="col-md-12">

            <form class="" method="POST" action="">
<!--               <div class="form-group text-center"> <label><b>Photo</b></label><br> //PHOTO UPDATE
                  <img width="300" class="rounded" src="../img_user/<?php //echo $row['gambar'] ?>"><br></div> -->

              <div class="form-group"> <label><b>Full Name</b></label>
                <input type="text" name="" class="form-control" readonly
                value="<?php echo $row['fullname'] ?>"> </div>

              <div class="form-group"> <label><b>Username</b></label>
                <input type="text" name="" class="form-control" readonly
                value="<?php echo $row['username'] ?>"> </div>

              <div class="form-group"> <label><b>Email</b></label>
                <input type="email" name="" class="form-control" readonly
                value="<?php echo $row['email'] ?>"> </div>

              <div class="form-group"> <label><b>Password Lama</b></label>
                <input type="password" name="password" class="form-control"> </div>

              <div class="form-group"> <label><b>Password Baru</b></label>
                <input type="password" name="password1" class="form-control"> </div>

              <div class="form-group"> <label><b>Konfirmasi Password Baru</b></label>
                <input type="password" name="password1-fix" class="form-control"> </div>

              <button type="submit" class="btn btn-primary" name="update">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1 bg-dark text-white" style="margin-top: 40px">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Rahmatvv - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <?php   if (!isset($_SESSION['id_user'])) {
            header("location:../index.php");
  } ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
