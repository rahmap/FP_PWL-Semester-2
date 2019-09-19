<?php
session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - List Game</title>
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
<!--     <a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/tambah-game.php"><i class="fa d-inline fa-lg fa fa-gamepad"></i> Tambah Data Game</a> -->
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
</nav>
<?php
$query_game = mysqli_query($conn, "SELECT * FROM data_game");
$query_jumlah = mysqli_query($conn, "SELECT * FROM data_game");
?>
<div class="container py-5">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Data Game
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
<?php
// $jumlah = array();
// $jumlah['1'] = 'a';
// $jumlah['2'] = 'b';
// $jumlah['3'] = 'c';
$i=1;
$a=1;
$b=1;
foreach ($query_game as $key) {
?>
          <form action="#" method="POST">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../img_user/game/<?php echo $key['gambar'] ?>" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h3 class="product-name"><strong><?php echo $key['judul'] ?></strong></h3>
                            <h4>
                                <small><?php echo $key['keterangan'] ?></small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 30px;margin-left: 50px;">
                                <h2><small><?php echo "$".$key['harga'] ?> <span class="text-muted"></span></small></h2>
                            </div>
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="margin-left: -50px;margin-top: 100px;">
                                <h4><small><span class="text-muted"><a onclick="return confirm('Yakin anda akan menghapusnya ?')" href="delete-game.php?id_barang=<?php echo $key['id_barang'] ?>">Delete</a></span></small></h4>
                            </div>
                        </div>
                    </div>
                    <hr>
<?php } ?> <!-- END FOREACH -->
                    <!-- END PRODUCT -->
            </div>
            </div>
          </form>
        </div>
</div>
  <div class="py-1 bg-dark text-white" style="margin-top: 175px;">
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
