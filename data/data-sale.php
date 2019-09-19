<?php
session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Data Penjualan</title>
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
  <?php
  //PENJUALAN
  $query_sales = mysqli_query($conn,"SELECT SUM(jml_barang) AS barang FROM nota WHERE status = 'Success' ");
  $res_sales = mysqli_fetch_assoc($query_sales);
  //JUMLAH GAME
  $query_game = mysqli_query($conn, "SELECT COUNT(id) AS nomer FROM data_game");
  $res_game = mysqli_fetch_assoc($query_game);

  //PENDING SUCCESS CANCELED
  $query_pending = mysqli_query($conn, "SELECT COUNT(jml_barang) AS pending FROM nota WHERE status = 'Pending' ");
  $res_pending = mysqli_fetch_assoc($query_pending);
  $query_success = mysqli_query($conn, "SELECT COUNT(jml_barang) AS success FROM nota WHERE status = 'Success' ");
  $res_success = mysqli_fetch_assoc($query_success);
  $query_canceled = mysqli_query($conn, "SELECT COUNT(jml_barang) AS canceled FROM nota WHERE status = 'Canceled' ");
  $res_canceled = mysqli_fetch_assoc($query_canceled);
  //PENDING SUCCESS CANCELED

  //PENGHASILAN
  $query_uang = mysqli_query($conn, "SELECT SUM(total_harga) AS uang FROM nota WHERE status = 'Success' ");
  $res_uang = mysqli_fetch_assoc($query_uang);
  //NOTA
  $query_nota = mysqli_query($conn, "SELECT * FROM nota ");
  //$res_nota = mysqli_fetch_assoc($query_nota);
  ?>

  <div class="py-3">
    <div class="py-2">
      <div class="py-1 text-center">
        <h1 class="display-3 mb-4">Data Penjualan</h1>
      </div>
    </div>  
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Order Success </div>
            <div class="card-body">
              <h1><i class="fa fa-check-square-o" style="font-size: 150%"></i> <?php echo $res_success['success']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Order Pending </div>
            <div class="card-body">
              <h1><i class="fa fa-clock-o" style="font-size: 150%"></i> <?php echo $res_pending['pending']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Order Dibatalkan </div>
            <div class="card-body">
              <h1><i class="fa fa-close" style="font-size: 150%"></i> <?php echo $res_canceled['canceled']; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Penghasilan </div>
            <div class="card-body">
              <h1><i class="fa fa-money" style="font-size: 150%"></i> </i> $<?php echo $res_uang['uang']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Jumlah Game </div>
            <div class="card-body">
              <h1><i class="fa fa-gamepad" style="font-size: 150%"></i> <?php echo $res_game['nomer']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Game Terjual </div>
            <div class="card-body">
              <h1><i class="fa fa-shopping-cart" style="font-size: 150%"></i> <?php echo $res_sales['barang']; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          </div>
          <table class="table table-striped table-hover table-condensed">
            <thead>
              <tr>
                  <th>ID Order</th>
                  <th>Nama Game</th>
                  <th>Jumlah Barang</th>
                  <th>Total Harga</th>
                  <th>Pembeli</th>
                  <th class="text-center">Waktu Order</th>
                  <th class="text-center">Status Order</th>
              </tr>
            </thead>
              <tbody>
              <?php while ($result = mysqli_fetch_assoc($query_nota)) : 
                
              ?><!-- JIKA MENGGUNAKAN FOREACH CUKUP QUERY NYA SAJA YANG JADI PENGULANGAN  -->                                            
                <tr>
                  <td><?php echo $result['id'] ?></td>
                  <td><?php echo $result['id_barang'] ?></td>
                  <td><?php echo $result['jml_barang'] ?></td>
                  <td>$ <?php echo $result['total_harga'] ?></td>
                  <td><?php echo $result['username'] ?></td>
                  <td class="text-center"><?php echo $result['waktu_order'] ?></td>
                  <td class="text-center">
                    <a href="update-status.php?id=<?php echo $result['id'] ?>">
                    <button class="btn btn-sm <?php if($result['status'] == 'Pending')echo 'btn-warning'; else if($result['status'] == 'Success') echo 'btn-success'; else if($result['status'] == 'Canceled') echo 'btn-danger';?>"><?php echo $result['status'] ?></button>
                    </a></td>
                </tr>
              <?php endwhile; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
