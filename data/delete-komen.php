<?php include 'koneksi.php'; include 'komentar-conn.php';
if (!isset($_GET['id'])) {
  header("location:komentar-db.php");
  } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Delete Komentar</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>
<body>
<?php
session_start();
if (!isset($_COOKIE['admin'])) {
    die ('<script language="javascript">
         swal({
              title: "ANDA BUKAN ADMIN",
          }).then(function() {
              window.location = "../";
          });
    </script>');
}
if (isset($_SESSION['username'])) {
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
  else if ($admin == "admin") {
        $query = mysqli_query($conn_komen, "DELETE FROM komen WHERE nomer = '".$_GET['id']."' ");
          if ($query) {
              echo '<script language="javascript">
                 swal({
                      title: "BERHASIL!",
                      text: "Data telah dihapus",
                  }).then(function() {
                      window.location = "komentar-db.php";
                  });
                </script>';
          }else{
                echo '<script language="javascript">
                 swal({
                      title: "GAGAL!",
                      text: "Data gagal dihapus",
                  }).then(function() {
                      window.location = "komentar-db.php";
                  });
                </script>';
        }
      }
}else{ header("location:../index.php"); }


?>
</body>
</html>