<?php
session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Tambah Data Game</title>
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
<!--     <a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/data-shop.php"><i class="fa d-inline fa-lg fa fa-money"></i> Data Penjualan</a> -->
          <div class="btn-group" style="margin-left: 10px;">
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa d-inline fa-lg fa fa-shopping-cart"></i> Data Shop </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="tambah-game.php"><i class="fa d-inline fa-lg fa fa-gamepad"></i> Tambah Data Game</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="data-sale.php"><i class="fa d-inline fa-lg fa fa fa-money"></i> Data Penjualan</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="list-game.php"><i class="fa d-inline fa-lg fa fa-navicon"></i> List Game</a>
            </div>
          </div>
        </div>
  </div>
  </div>
</nav>
    <div class="py-3" style="margin-bottom: -50px">
      <div class="py-1 text-center">
        <h4 class="display-3 mb-4">Tambahkan Data Game</h4>
      </div>
    </div>
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12">
          <form class="" method="POST" action=" " enctype="multipart/form-data">
            <div class="form-group"> <label>Judul Game</label>
              <input type="text" name="judul" class="form-control" placeholder="Judul game"> </div>
            <div class="form-group"> <label>Keterangan</label>
              <textarea type="text" name="ket" class="form-control" placeholder="Keterangan game"> </textarea></div>
            <div class="form-group"> <label>Harga</label>
              <input type="text" name="harga" class="form-control" placeholder="Harga"> </div>
            <div class="form-group"> <label>ID Barang</label>
              <input type="text" name="id_brg" class="form-control" placeholder="ID barang"> </div>
            <div class="form-group"> <label>Gambar</label>
              <input type="file" name="gambar" class="form-control"> </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
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

    $ket = $_POST['ket']; $ket = htmlspecialchars($ket); $ket = addslashes($ket);
    $harga = $_POST['harga']; $harga = htmlspecialchars($harga); $harga = addslashes($harga);
    $id_brg = $_POST['id_brg']; $id_brg = htmlspecialchars($id_brg); $id_brg = addslashes($id_brg);
    $judul = htmlspecialchars($_POST['judul']); $judul = addslashes($judul);
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
    move_uploaded_file($tmpName, '../img_user/game/'. $namaFileBaru); 
    //UPLOAD GAMBAR

    if (empty($judul) OR empty($harga) OR empty($id_brg) OR empty($ket)) {
      echo '<script language="javascript">
            swal("GAGAL!", "Data harus diisi semua!", "error");
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
      mysqli_query($conn, "INSERT INTO data_game SET judul = '$judul',keterangan='$ket',harga='$harga',
        id_barang='$id_brg', gambar='$namaFileBaru' ");
      echo '<script language="javascript">
           swal({
                title: "BERHASIL!",
                text: "Berhasil menembahkan game!",
                type: "success"
            }).then(function() {
                window.location = "tambah-game.php";
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
