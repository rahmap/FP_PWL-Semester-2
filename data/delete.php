<?php include 'koneksi.php';
if (!isset($_GET['id'])) {
  header("location:index.php");
  } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Delete Data User</title>
    <meta charset="utf-8">
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>
<body>
<?php
session_start();
if (!isset($_COOKIE['admin']) AND !isset($_SESSION['admin'])) {
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

    if (isset($_GET['id'])) {
      $id_admin = $_GET['id'];
      if ($id_admin == 1) {
        echo '<script language="javascript">
         swal({
              title: "GAGAL!",
              text: "Data admin tidak dapat dihapus",
          }).then(function() {
              window.location = "index.php";
          });
        </script>';
      }
      else{
        $query = mysqli_query($conn, "DELETE FROM data_user WHERE id_user = '".$_GET['id']."' ");
        // $sql_foto = @mysqli_query($conn, "SELECT gambar FROM data_user where id_user = '".$_GET['id']."' ");
        // $array_foto = mysqli_fetch_assoc($sql_foto);

        // $path = "../img_user/$array_foto";
        // chown($path, 666);
        // unlink($path);
        
          if ($query) {
              echo '<script language="javascript">
                 swal({
                      title: "BERHASIL!",
                      text: "Data telah dihapus",
                  }).then(function() {
                      window.location = "index.php";
                  });
                </script>';
          }else{
                echo '<script language="javascript">
                 swal({
                      title: "GAGAL!",
                      text: "Data gagal dihapus",
                  }).then(function() {
                      window.location = "index.php";
                  });
                </script>';
        }
      }
    }
  }
}else{ header("location:../index.php"); }


?>
</body>
</html>

