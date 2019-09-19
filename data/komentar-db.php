<?php 
include 'koneksi.php'; 
include 'komentar-conn.php';

session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Data Komentar</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
<body>
<?php


if (isset($_COOKIE['id'])) {
  $_SESSION['username'] = true;
}
if (isset($_SESSION['username'])) {  //PENUTUP CEK DI BAWAH
  if (isset($_COOKIE['username']) AND isset($_COOKIE['id'])) {
    $admin_cook = $_COOKIE['id'];
    if ($admin_cook != '1') {
      // header("location:index.php");
      die ('<script language="javascript">
           swal({
                title: "ANDA BUKAN ADMIN",
            }).then(function() {
                window.location = "../index.php";
            });
      </script>');
    }
  }
  $admin = $_SESSION['username'];
  if ($admin != "admin") {
      echo '<script language="javascript">
           swal({
                title: "ANDA BUKAN ADMIN",
            }).then(function() {
                window.location = "../index.php";
            });
      </script>';
  }
  else { // cek bawah
?>
  <style type="text/css">
    .table-striped>tbody>tr:nth-child(odd)>td, 
    .table-striped>tbody>tr:nth-child(odd)>th {
      background-color: #d9edf7;
    }
    .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
    background-color: #fcf8e3;
    }
  </style>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/"><i class="fa d-inline fa-lg fa fa-address-book"></i> Data User</a>
    </div>
  </nav>
  <?php

  $data_db = mysqli_query($conn_komen, "SELECT * FROM komen ORDER BY `nomer` ASC");
  //$result = mysqli_fetch_assoc($data_db); HANYA JIKA MENGGUNAKAN WHILE cek Admin.php
  ?>

  <div class="py-2">
    <div class="py-2">
      <div class="py-1 text-center">
        <h1 class="display-3 mb-4">Daftar Komentar User</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          </div>
          <table class="table table-striped table-hover table-condensed">
            <thead>
              <tr bgcolor="#e6e6e6">
                <th>Nomer</th>
                <th>Nama</th>
                <th>Komentar</th>
                <th>Waktu</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($data_db as $key) { ?> 
            <!-- JIKA MENGGUNAKAN FOREACH CUKUP QUERY NYA SAJA YANG JADI PENGULANGAN  -->
              <tr>
                <td><?php echo $key['nomer'] ?></td>
                <td><?php echo $key['nama'] ?></td>
                <td><?php echo $key['komentar'] ?></td>
                <td><?php echo $key['waktu'] ?></td>
                <td class="text-center"><a onclick="return confirm('Yakin anda akan menghapusnya ?')" href="delete-komen.php?id=<?php echo $key['nomer'] ?>">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php } }else{ header("location:../index.php"); } ?>
</body>
</html>
