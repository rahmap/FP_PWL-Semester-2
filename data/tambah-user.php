<?php
session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Tambah User</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
<body class="">
<?php
include 'koneksi.php';
if (!isset($_COOKIE['admin']) AND !isset($_SESSION['admin'])) {
    die ('<script language="javascript">
         swal({
              title: "ANDA BUKAN ADMIN",
          }).then(function() {
              window.location = "../";
          });
    </script>');
}
?>
<nav class="navbar navbar-expand-md bg-secondary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i><b> <!--  HOME --> </b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
      aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
      <ul class="navbar-nav"></ul>
    </div>
    <a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/"><i class="fa d-inline fa-lg fa fa fa-address-book"></i> Data User</a>
  </div>
</nav>
    <div class="py-3" style="margin-bottom: -50px">
      <div class="py-1 text-center">
        <h4 class="display-3 mb-4">Tambahkan Data User</h4>
      </div>
    </div>
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12">
          <form class="" method="POST" action=" " enctype="multipart/form-data">
            <div class="form-group"> <label>Full Name</label>
              <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name"> </div>
            <div class="form-group"> <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter Username"> </div>
            <div class="form-group"> <label>Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email"> </div>
            <div class="form-group"> <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password"> </div>
            <div class="form-group"> <label>Photo</label>
              <input type="file" name="gambar" class="form-control"> </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambahkan User</button>
          </form>
        </div>
      </div>
<!--       <div class="col-md-6">
        <br><br>
        <img class="img-fluid d-block rounded" src="img/bg.png"> </div>
    </div> -->
  </div>
</div>
<?php
include 'koneksi.php';
  if (isset($_POST['submit'])) {

    $username = $_POST['username']; $username=htmlspecialchars($username);
    $email = $_POST['email']; $email=htmlspecialchars($email);
    $pass = $_POST['password']; $pass=htmlspecialchars($pass);
    $fullname = htmlspecialchars($_POST['fullname']);
    //strtolower
    $username = strtolower($username);
    $email = strtolower($email);
    //str_replace
    $username = str_replace(' ','',$username);
    $email = str_replace(' ','',$email);
    //penampungan value form


    //UPLOAD GAMBAR
    $namaFile = $_FILES['gambar']['name'];
    //$ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    $extensiGambarValid = ['jpg','jpeg','png','gif'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;
    move_uploaded_file($tmpName, '../img_user/'. $namaFileBaru); 
    //UPLOAD GAMBAR

    $query_cek_data = mysqli_query($conn, "SELECT username,email FROM data_user 
                                          WHERE username='$username' OR email='$email' ");
    $cek_data = mysqli_num_rows($query_cek_data);

    //CEK FULLNAME DB
    // $q_fn = mysqli_query($conn, "SELECT fullname FROM data_user WHERE fullname = '$fullname' ");
    // $cek_fn = mysqli_num_rows($q_fn);
    //CEK FULLNAME DB

    if (empty($username) OR empty($email) OR empty($pass) OR empty($fullname)) {
      echo '<script language="javascript">
            swal("GAGAL!", "Data harus diisi semua!", "error");
            </script>';      
    }
    // else if ($cek_fn) {
    //   echo '<script language="javascript">
    //         swal("GAGAL!", "Full Name Sudah Ada Yang Menggunakan!");
    //         </script>'; 
    // }
    else if ($cek_data) {
      echo '<script language="javascript">
            swal("GAGAL!", "Username atau Email Sudah Ada Yang Menggunakan!");
            </script>'; 
    }
    else if(is_numeric($fullname)){
      echo '<script language="javascript">
            swal("GAGAL!","Full Name harus huruf semua");
            </script>';
    }
    else if(is_numeric($username)){
      echo '<script language="javascript">
            swal("GAGAL!","Username harus di awali huruf");
            </script>';
    }
    else if ($error === 4) {
      echo '<script language="javascript">
            swal("GAGAL!","Gambar belum di pilih");
            </script>';
    }
    else if (!in_array($extensiGambar, $extensiGambarValid)) {
      echo '<script language="javascript">
            swal("GAGAL!","Anda memilih bukan gambar");
            </script>';
    }
    else{
      //include 'mailgun/email.php'; //Kirim email mailgun
      mysqli_query($conn, "INSERT INTO data_user SET fullname = '$fullname',username='$username',email='$email',
        password='$pass', gambar='$namaFileBaru' ");
      echo '<script language="javascript">
           swal({
                title: "BERHASIL!",
                text: "Berhasil menembahkan user!",
                type: "success"
            }).then(function() {
                window.location = "tambah-user.php";
            });
      </script>';
    }
  }
?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
