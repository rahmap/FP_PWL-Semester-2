<?php 
include 'koneksi.php'; 
session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Hapus Data Postingan</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
<body>
  </style>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/"><i class="fa d-inline fa-lg fa fa-address-book"></i> Data User</a>
    </div>
  </nav>
  <?php
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

  <div class="py-2">
    <div class="py-2">
      <div class="py-1 text-center">
        <h1 class="display-3 mb-4">Hapus Data Postingan</h1>
      </div>
    </div>
  <?php
  $data_db = mysqli_query($conn, "SELECT * FROM postingan ORDER BY nomer DESC ");
  //$result = mysqli_fetch_assoc($data_db); HANYA JIKA MENGGUNAKAN WHILE cek Admin.php

  //KOMPUTER
  $query_pc = mysqli_query($conn, "SELECT COUNT(category) AS category FROM postingan WHERE category = 'komputer' ");
  $res_pc = mysqli_fetch_assoc($query_pc);
  //ANDROID
  $query_android = mysqli_query($conn, "SELECT COUNT(category) AS category FROM postingan WHERE category = 'android' ");
  $res_android = mysqli_fetch_assoc($query_android);
  //POSTINGAN
  $query_post = mysqli_query($conn, "SELECT COUNT(id_post) AS jumlah FROM postingan");
  $res_post = mysqli_fetch_assoc($query_post);
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Jumlah Postingan </div>
            <div class="card-body">
              <h1><i class="fa fa-newspaper-o" style="font-size: 150%"></i> <?php echo $res_post['jumlah']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Jumlah Category 'Android' </div>
            <div class="card-body">
              <h1><i class="fa fa-mobile-phone" style="font-size: 150%"></i> <?php echo $res_android['category']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Jumlah Category 'Komputer' </div>
            <div class="card-body">
              <h1><i class="fa fa-television" style="font-size: 150%"></i> <?php echo $res_pc['category']; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- DISINI SEHARUSNYA POPULAR POST -->
    <div class="container py-3">
      <div class="row">
        <div class="col-md-12">
          </div>
          <table class="table table-striped table-hover table-condensed">
            <thead>
              <tr bgcolor="#e6e6e6">
                <th>ID Post</th>
                <th>Category Post</th>                
                <th>Judul Post</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($data_db as $key) { ?> 
            <!-- JIKA MENGGUNAKAN FOREACH CUKUP QUERY NYA SAJA YANG JADI PENGULANGAN  -->
              <tr>
                <td><?php echo $key['id_post'] ?></td>
                <td><?php echo $key['category'] ?></td> 
                <td><?php echo stripslashes($key['judul_post']); ?></td>
                <td class="text-center"><a onclick="return confirm('Yakin anda akan menghapusnya ?')" href="delete-post.php?id_post=<?php echo $key['id_post'] ?>">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_GET['id_post'])) {
    $query = mysqli_query($conn, "DELETE FROM postingan WHERE id_post = '".$_GET['id_post']."' ");
            if ($query) {
                die ('<script language="javascript">
                   swal({
                        title: "BERHASIL!",
                        text: "Postingan telah dihapus",
                    }).then(function() {
                        window.location = "delete-post.php";
                    });
                  </script>');
            }else{
                  die ('<script language="javascript">
                   swal({
                        title: "GAGAL!",
                        text: "Postingan gagal dihapus",
                    }).then(function() {
                        window.location = "delete-post.php";
                    });
                  </script>');
          }
  }
  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
