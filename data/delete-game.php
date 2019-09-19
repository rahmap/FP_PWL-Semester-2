<?php include 'koneksi.php';
if (!isset($_GET['id_barang'])) {
  header("location:list-game.php");
  } ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Delete Game</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
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
else if (isset($_COOKIE['admin']) OR isset($_SESSION['admin'])) {
        $query = mysqli_query($conn, "DELETE FROM data_game WHERE id_barang = '".$_GET['id_barang']."' ");
          if ($query) {
              die ('<script language="javascript">
                 swal({
                      title: "BERHASIL!",
                      text: "Game telah dihapus",
                  }).then(function() {
                      window.location = "list-game.php";
                  });
                </script>');
          }else{
                die ('<script language="javascript">
                 swal({
                      title: "GAGAL!",
                      text: "Game gagal dihapus",
                  }).then(function() {
                      window.location = "list-game.php";
                  });
                </script>');
        }
      }
else{ header("location:../"); }


?>
</body>
</html>