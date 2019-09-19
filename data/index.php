<?php include 'koneksi.php'; 
session_start();
if (!isset($_SESSION['username'])) { header("location:../"); }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Data User</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> 
  <link rel="stylesheet" type="text/css" href="../css/zoom.css">
</head>
<body>
<?php

//session_start();//echo $_SESSION['admin'];
// if (isset($_COOKIE['id']) != '1' OR isset($_SESSION['username']) != 'admin') {
//     die ('<script language="javascript">
//          swal({
//               title: "ANDA BUKAN ADMIN",
//           }).then(function() {
//               window.location = "../";
//           });
//     </script>');
// }
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
                window.location = "../";
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
                window.location = "../";
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
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <div class="btn-group mx-3" >
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa d-inline fa-lg fa fa-shopping-cart"></i> Data Shop </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="tambah-game.php"><i class="fa d-inline fa-lg fa fa-gamepad"></i> Tambah Data Game</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="data-sale.php"><i class="fa d-inline fa-lg fa fa fa-money"></i> Data Penjualan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="list-game.php"><i class="fa d-inline fa-lg fa fa-navicon"></i> List Game</a>
              </div>
          </div>
          <div class="btn-group">
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa d-inline fa-lg fa fa-wrench"></i> Tools </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="tambah-post.php"><i class="fa d-inline fa-lg fa fa-newspaper-o"></i> Tambahkan Postingan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="delete-post.php"><i class="fa d-inline fa-lg fa fa-times-rectangle-o"></i> Hapus Data Postingan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="tambah-user.php"><i class="fa d-inline fa-lg fa fa-user-plus"></i> Tambahkan User</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="komentar-db.php"><i class="fa d-inline fa-lg fa fa-comments-o"></i> Data Komentar</a>
              </div>
          </div>
      </div>
    </div>
  </div>
    </div>
  </nav>
  <?php

  $data_db = mysqli_query($conn, "SELECT * FROM data_user ORDER BY `id_user` ASC");
  //MEMBER TERDAFTAR
  $query_record = mysqli_query($conn, "SELECT COUNT(id_user) AS baris FROM data_user");
  $res_record = mysqli_fetch_assoc($query_record);
  //PENJUALAN
  $query_sales = mysqli_query($conn,"SELECT SUM(jml_barang) AS barang FROM nota WHERE status = 'Success' ");
  $res_sales = mysqli_fetch_assoc($query_sales);
  //KOMENTAR
  $query_komen = mysqli_query($conn, "SELECT COUNT(nomer) AS nomer FROM komen");
  $res_komen = mysqli_fetch_assoc($query_komen);
  //PENGHASILAN
  $query_uang = mysqli_query($conn, "SELECT SUM(total_harga) AS uang FROM nota WHERE status = 'Success' ");
  $res_uang = mysqli_fetch_assoc($query_uang);
  //POSTINGAN
  // $query_post = mysqli_query($conn, "SELECT COUNT(id_post) AS jumlah FROM postingan");
  // $res_post = mysqli_fetch_assoc($query_post);
  ?>
  <div class="py-3">
    <div class="py-2">
      <div class="py-1 text-center">
        <h1 class="display-3 mb-3">Data User</h1>
      </div>
    </div>  
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Members Terdaftar </div>
            <div class="card-body">
              <h1><i class="fa fa-users" style="font-size: 150%"></i> <?php echo $res_record['baris']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Game terjual </div>
            <div class="card-body">
              <h1><i class="fa fa-shopping-cart" style="font-size: 150%"></i> <?php echo $res_sales['barang']; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Jumlah Komentar </div>
            <div class="card-body">
              <h1><i class="fa fa-comments" style="font-size: 150%"></i> <?php echo $res_komen['nomer']; ?></h1>

            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header" style="font-weight: bolder"> Penghasilan </div>
            <div class="card-body">
              <h1><i class="fa fa-money" style="font-size: 150%"></i> $<?php echo $res_uang['uang']; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php

  $data_db = mysqli_query($conn, "SELECT * FROM data_user ORDER BY `id_user` ASC");

  ?>

  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          </div>
          <table class="table table-striped table-hover table-condensed">
            <thead>
              <tr bgcolor="#e6e6e6">
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th class="text-center">Gambar</th>
                <th class="text-center">Opsi</th>
              </tr>
            </thead>
            <tbody>
            <?php //while ($result = mysqli_fetch_assoc($data_db)) { HANYA JIKA MENGGUNAKAN WHILE
              foreach ($data_db as $key) { 
            ?><!-- JIKA MENGGUNAKAN FOREACH CUKUP QUERY NYA SAJA YANG JADI PENGULANGAN  -->
              <tr>
                <td><?php echo $key['id_user'] ?></td>
                <td><?php echo $key['fullname'] ?></td>
                <td><?php echo $key['username'] ?></td>
                <td><?php echo $key['email'] ?></td>
                <td><?php echo $key['password'] ?></td>
                <td class="text-center"><a href="index.php?id=<?php echo $key['id_user'] ?>" 
                  <?php if (isset($_GET['id'])){
                      echo 'data-toggle="modal" data-target="#download" ';
                  } ?> >
                  <img alt="Card image cap" width="30" src="../img_user/<?php echo $key['gambar'] ?>"></a></td>
                <td class="text-center"><a href="update.php?id=<?php echo $key['id_user'] ?>">Update</a> | 
                  <a onclick="return confirm('Yakin anda akan menghapusnya ?')" href="delete.php?id=<?php echo $key['id_user'] ?>">Delete</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL BOX -->
  
  <?php include 'modal_box.php'; ?>

  <!-- AKHIR BOX MODAL -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php } }else{ header("location:../"); } ?>
</body>
</html>
