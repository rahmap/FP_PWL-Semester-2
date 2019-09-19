<!DOCTYPE html>
<html>
<head>
	<title>Beruk Jantan - Logout</title>
</head>
  <meta charset="utf-8">
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
<body>
<?php
include 'koneksi.php';
	session_start();
	if (isset($_SESSION['username']) OR isset($_COOKIE['username'])) {
    setcookie('id','',time()-3600,'/','localhost');
    setcookie('username','',time()-3600,'/','localhost');
    setcookie('fn','',time()-3600,'/','localhost');
    // setcookie('admin','',time()-3600,'/','localhost');
      if (isset($_COOKIE['admin'])) {
        setcookie('admin','',time()-3600,'/','localhost');
      }
		
		session_destroy();

        echo '<script language="javascript">
         swal({
              title: "BERHASIL KELUAR!",
          }).then(function() {
              window.location = "../index.php";
          });
        </script>';
		
	}else{
		header("location:../index.php");
	}

?>
</body>
</html>
