<?php
session_start();   
if (!isset($_SESSION['username']) AND !isset($_COOKIE['username'])) {
  header("location:../index.php");
} ?>
<!DOCTYPE html>
<html>
<head>
  <title>Member - Beli Game</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/komentar.css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

</head>
<body>

<?php

include '../data/koneksi.php';

$query_game = mysqli_query($conn, "SELECT * FROM data_game");
$query_jumlah = mysqli_query($conn, "SELECT * FROM data_game");
?>

<?php  
$i = 0;
foreach ($query_jumlah as $key) {
  $i++;
  if (isset($_POST['cek-nota'."$i"])) {
    
    //$user = $_SESSION['username'];
    
    $waktu_order = $_POST['waktu'];
  //error_reporting(0);


    
    $jumlah[$i] = $_POST['jumlah-barang'."$i"];
    $game[$i] = $_POST['game'."$i"];
    $judul = $key['judul'];
    $harga = $key['harga'] *= $jumlah[$i];
    // $total = $jumlah[$i] * $harga;
    // $total_harga += $total;
    // $game_all .= $game[$i];
    // $jumlah_all .= $jumlah[$i];
  
    // $_SESSION['game'] = $game_all; $gem = $_SESSION['game'];
    // $_SESSION['jumlah'] = $jumlah_all; $qty = $_SESSION['jumlah'];
    // $insert = mysqli_query($conn, "INSERT INTO nota SET id_barang = '$game_all', jml_barang = '$jumlah_all', 
    //                               total_harga = '$total_harga', username = '".$_SESSION['fullname']."', waktu_order = '$waktu_order' ");


      if ($jumlah[$i] == 0) {
            die ('<script language="javascript">
                 swal({
                      title: "GAGAL MEMBELI",
                      text: "Anda tidak membeli apapun",
                      type: "error",
                  }).then(function() {
                      window.location = "shop.php";
                  });
            </script>');
      }else{
        if (isset($_COOKIE['username'])) {
          $insert = mysqli_query($conn, "INSERT INTO nota SET id_barang = '$game[$i]', jml_barang = '$jumlah[$i]', 
                    total_harga = '$harga', username = '".$_COOKIE['fn']."', waktu_order = '$waktu_order', status = 'Pending' ");
        }
        else if (isset($_SESSION['username'])) {
          $insert = mysqli_query($conn, "INSERT INTO nota SET id_barang = '$game[$i]', jml_barang = '$jumlah[$i]', 
                    total_harga = '$harga', username = '".$_SESSION['fullname']."', waktu_order = '$waktu_order', status = 'Pending' ");
        }
      }      if ($insert) {
          // header("location:shop-nota.php");
          // echo "BERHASIL";
            die ('<script language="javascript">
                 swal({
                      title: "BERHASIL MEMBELI",
                      type: "success",
                  }).then(function() {
                      window.location = "shop.php";
                  });
            </script>');
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
    <a style="margin-right: -800px" class="btn navbar-btn btn-primary ml-2 text-white" href="../user/member.php"><i class="fa d-inline fa-lg  fa fa-id-badge"></i> My Profile</a>  <!-- NAVBAR UPDATE PROFILE -->
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
    <a class="btn navbar-btn btn-primary ml-2 text-white" href="shop-nota.php"><i class="fa d-inline fa-lg  fa fa-shopping-basket"></i> Cek Nota</a>  <!-- NAVBAR UPDATE PROFILE -->
  </div>
</nav>
<div class="container py-5">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shopping cart
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
// $i++;
// echo $jumlah[$i];
?>
          <form action="#" method="POST">
                    <div class="row">
                        <input style="display: none;" name="waktu" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y H:i'); ?>"></input>
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="../img_user/game/<?php echo $key['gambar'] ?>" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                          <!-- GAME -->
                          <input style="display: none;" name="game<?php echo $a; $a++; ?>" value="<?php echo $key['judul'] ?>"></input>
                          <!-- GAME -->
                            <h4 class="product-name"><strong><?php echo $key['judul'] ?></strong></h4>
                            <h4>
                                <small><?php echo $key['keterangan'] ?></small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong><?php echo "$".$key['harga'] ?> <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">

                                    <input type="number" step="1" max="99" min="0" value="0" title="Qty" class="qty text-center" size="4" name="jumlah-barang<?php echo $i; $i++; ?>">
                                    <button style="margin-top: 220px; margin-right: -90px;" type="submit" 
                                    name="cek-nota<?php echo $b; $b++; ?>" class="btn btn-success pull-right">Checkout</button> <!-- TOMBOL SUMBIT -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
<?php } ?> <!-- END FOREACH -->
                    <!-- END PRODUCT -->
            </div>
            <div class="card-footer">
                <div class="pull-right" style="margin: 10px">
                    <!-- <a href="" class="btn btn-success pull-right">Cek Nota</a> -->
                    <button type="reset" name="reset" class="btn btn-danger "style="margin-right: 10px">Reset</button>
                    <!-- <button type="submit" name="cek-nota" class="btn btn-success pull-right">Checkout</button> -->
                    
                </div>
            </div>
          </form>
        </div>
</div>
</nav>
  <div class="py-1 bg-dark text-white" style="margin-top: 175px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Rahmatvv - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://use.fontawesome.com/c560c025cf.js"></script> 
  <script type="text/javascript" src="js/custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
