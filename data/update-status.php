<?php
session_start();  
include 'koneksi.php'; 
if (!isset($_GET['id'])) {
  header("location:data-sale.php"); }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin - Update Status Order</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"type="text/css">
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
if (isset($_POST['update'])) {
  $status = $_POST['status'];
  $update = mysqli_query($conn, "UPDATE nota SET status = '$status' WHERE id = '".$_GET['id']."' ");
      if ($update) {
            echo '<script language="javascript">
             swal({
                  title: "BERHASIL!",
                  text: "Status Order telah diupdate",
                  type: "success"
              }).then(function() {
                  window.location = "data-sale.php";
              });
            </script>';
      }else{
            echo '<script language="javascript">
                  swal("GAGAL!","Cek kembali data anda")
                  </script>';
      }
}

?>
    <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i><b> <!--  HOME --> </b></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false"
          aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
      </div>
    </nav>
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
              <form class="" method="POST" action="">
                <div class="form-group"> <label>Status Order</label>
                  <select name="status">
                    <option value="Pending"> PENDING</option>
                    <option value="Success"> SUCCESS</option>
                    <option value="Canceled"> CANCELED</option>
                  </select> </div>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>