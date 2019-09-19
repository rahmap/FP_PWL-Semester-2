<?php
session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Tambah Postingan</title>
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
        <h4 class="display-3 mb-4">Tambahkan Postingan</h4>
      </div>
    </div>
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12">
          <form class="" method="POST" action=" " enctype="multipart/form-data">
            <div class="form-group"> <label>Judul Postingan</label>
              <input type="text" name="judul" class="form-control" placeholder="Judul postingan"> </div>
            <div class="form-group"> <label>Thumbnail Artikel</label>
              <textarea type="text" name="tumb" class="form-control" placeholder="Thumbnail artikel"></textarea> </div>
            <div class="form-group"> <label>Keterangan</label>
              <textarea type="text" name="ket" class="form-control" placeholder="Keterangan artikel"></textarea>
              <small class="form-text text-muted" > Jangan lupa masukkan tag HTML.</small> </div>
            <div class="form-group"> <label>ID Post</label>
              <input type="text" name="id_post" class="form-control" placeholder="ID post"> </div>
            <div class="form-group"> <label>Category</label><br>
              <select name="category">
                <option value="android"> Android</option>
                <option value="komputer"> Komputer</option>
              </select> 
            </div>
            <div class="form-group"> <label>Link</label>
              <input type="text" name="link" class="form-control" placeholder="Link download"> </div>
            <div class="form-group"> <label>Gambar</label>
              <input type="file" name="gambar" class="form-control"> </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
          </form>
        </div>
      </div>
  </div>
</div>
<?php
include 'koneksi.php';
  if (isset($_POST['submit'])) {

    $category = $_POST['category'];
    $link = $_POST['link']; $link = addslashes($link);
    $ket = $_POST['ket']; $ket = addslashes($ket);
    $tumb = $_POST['tumb']; $tumb = addslashes($tumb);
    $id_post = $_POST['id_post']; $id_post = addslashes($id_post);
    $judul = addslashes($_POST['judul']); $judul = addslashes($judul);
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
    move_uploaded_file($tmpName, '../img/post/'. $namaFileBaru); 
    //UPLOAD GAMBAR

    if (empty($judul) OR empty($tumb) OR empty($id_post) OR empty($ket)) {
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
    $insert = mysqli_query($conn, "INSERT INTO postingan SET judul_post = '$judul', isi_post='$ket', category = '$category', tumb_post ='$tumb',
        id_post ='$id_post', link = '$link', gambar='$namaFileBaru' ");
      if ($insert) {
       echo '<script language="javascript">
           swal({
                title: "BERHASIL!",
                text: "Berhasil menembahkan postingan!",
                type: "success"
            }).then(function() {
                window.location = "tambah-post.php";
            });
      </script>';
      }else{
        echo '<script language="javascript">
           swal({
                title: "GAGAL!",
                text: "Gagal menembahkan postingan!",
                type: "error"
            }).then(function() {
                window.location = "tambah-post.php";
            });
      </script>';

      }
    }
  }
?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
