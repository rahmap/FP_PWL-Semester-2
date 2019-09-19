<!DOCTYPE html>
<html>
<head>
  <title>Beruk Jantan - Login</title>
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="">
<?php
include 'data/koneksi.php';
session_start();

if (isset($_COOKIE['id'])) {
  $_SESSION['username'] = true;
}
if (isset($_SESSION['username'])) {
      die ('<script language="javascript">
         swal({
              title: "ANDA BELUM KELUAR",
          }).then(function() {
              window.location = "index.php";
          });
    </script>');
}
?>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="fa d-inline fa-lg fa-home"></i><b> <!--  HOME --> </b></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
        aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
    </div>
  </nav>
  <div class="py-3" style="margin-bottom: -50px">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center" >Login</h1>
      </div>
    </div>
  </div>
</div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <br>
          <br>
          <img class="d-block d-flex img-fluid justify-content-center rounded" src="img/bg.png"> </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12">
            <form class="" method="POST" action="data/prosses.php">
              <div class="form-group"> <label>Email or Username</label>
                <input type="text" name="email1" class="form-control" placeholder="Enter email or Username"> </div>
              <div class="form-group"> <label>Password</label>
                <input type="password" name="password1" class="form-control" placeholder="Password"> </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="ingat"> Remember me</label>
                </div>
              <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
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
