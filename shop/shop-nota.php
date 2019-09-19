<?php
session_start();   
if (!isset($_SESSION['username']) AND !isset($_COOKIE['username'])) {
  header("location:../index.php");
} ?>
<!DOCTYPE html>
<html>
<head>
  <title>Member - Nota Belanja</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/komentar.css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

</head>
<body>
<?php include '../data/koneksi.php';


?>
<nav class="navbar navbar-expand-md bg-secondary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
    <a style="margin-right: -835px" class="btn navbar-btn btn-primary ml-2 text-white" href="../user/member.php"><i class="fa d-inline fa-lg  fa fa-id-badge"></i> My Profile</a>  <!-- NAVBAR UPDATE PROFILE -->
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
    <a class="btn navbar-btn btn-primary ml-2 text-white" href="shop.php"><i class="fa d-inline fa-lg  fa fa-shopping-cart"></i> Shop</a>  <!-- NAVBAR UPDATE PROFILE -->
  </div>
</nav>
<div class="container py-4">

  <h1>Nota Belanja</h1><hr>
  <table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr>
                <th class="text-center">Item</th>
                <th class="text-center">QTY</th>
                <th class="text-center">Unit Price</th>
                <th class="text-center">Order Time</th>
                <th class="text-center">Order Status</th>
            </tr>
<?php
if (isset($_COOKIE['username'])) {
  $query = mysqli_query($conn, "SELECT * FROM nota WHERE username = '". $_COOKIE['fn']."' ");
}
else if (isset($_SESSION['username'])) {
  $query = mysqli_query($conn, "SELECT * FROM nota WHERE username = '".$_SESSION['fullname']."' ");
}

//error_reporting(0);
  $i = 0;
foreach ($query as $key) {
  // $key['id_barang'] = str_replace('-', ' ', $key['id_barang']); //NGGAK JADI TERPAKAI
  // $key['jml_barang'] = str_replace('-', ' ', $key['jml_barang']);
  
  $i++;
  if($key['total_harga'] != 0){
?>
            <tr>
                <td><?php echo $key['id_barang'] ?></td>
                <td class="text-center"><?php echo $key['jml_barang'] ?></td>
                <td class="text-center">$<?php echo $key['total_harga'] ?></td>
                <td class="text-center"><?php echo $key['waktu_order']; ?></td>
                <td class="text-center"><button class="btn btn-sm <?php if($key['status'] == 'Pending')echo 'btn-warning'; else if($key['status'] == 'Success') echo 'btn-success'; else if($key['status'] == 'Canceled') echo 'btn-danger';?>"><?php echo $key['status'] ?></button></td> 
            </tr>
<?php 
  // $sum += $key['total_harga'];
} } //AKHIR FOREACH DAN IF
?>
<?php

if (isset($_COOKIE['username'])) {
  $total = mysqli_query($conn,"SELECT SUM(total_harga) AS total FROM nota WHERE status = 'Success' AND username = '".$_COOKIE['fn']."' "); 
}
else if (isset($_SESSION['username'])) {
  $total = mysqli_query($conn,"SELECT SUM(total_harga) AS total FROM nota WHERE status = 'Success'  AND username = '".$_SESSION['fullname']."' "); 
}
//SUM JUMLAH HARGA
$res = mysqli_fetch_assoc($total); 
$tot_harga = $res['total'];
?>
            <tr>
                <th colspan="4"><span class="pull-right">Total belanja 'Success'</span></th>
                <th>$<?php if($tot_harga == 0 )echo ' '.'0'; else echo $tot_harga; ?></th>
            </tr>
            <tr>
                <td><!-- <button type="submit" name="beli" class="btn btn-success pull-left">Checkout</button> --></td>
                <td colspan="4"><a href="shop.php" class="btn btn-primary pull-right">Continue Shopping</a></td>            
            </tr>
        </tbody>
    </table>
    <?php
      if (isset($_COOKIE['username'])) {
        $query_email = mysqli_query($conn, "SELECT email FROM data_user WHERE fullname = '".$_COOKIE['fn']."' "); 
      }
      else if (isset($_SESSION['username'])) {
        $query_email = mysqli_query($conn, "SELECT email FROM data_user WHERE fullname = '".$_SESSION['fullname']."' ");
      }
      $res_email = mysqli_fetch_assoc($query_email); 
      
    ?>
<div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> <b>Information</b> </div>
            <div class="card-body">
              <p>License game akan dikirimkan ke alamat Email anda, yaitu : <b><?php echo $res_email['email'];  ?></b></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
if (!isset($key['id_barang'])) {
        die ('<script language="javascript">
           swal({
                title: "NOTA BELANJA KOSONG",
                type: "error",
            }).then(function() {
                window.location = "shop.php";
            });
      </script>');
}
?>          
<!-- DISINI FILE YANG SAYA CUT -->   
</div>
  <div class="py-1 bg-dark text-white" style="margin-top: 100px;">
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
