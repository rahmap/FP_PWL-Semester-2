<!DOCTYPE html>
<html>
<head>
  <title>Beruk Jantan - Prosses Login</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
<body>

<?php
  include 'koneksi.php';
  if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email1']);
    $pass = htmlspecialchars($_POST['password1']);
    //STRTOLOWER
    $email = strtolower($email);
    //STR_REPLACE
    $email = str_replace(' ', '', $email);
    //VALUE FORM

    //LOGIN
    $user_login = mysqli_query($conn, "SELECT * FROM data_user WHERE (email='$email' OR username='$email') 
                                       AND password='$pass' ");
    $result = mysqli_fetch_array($user_login);

    $username_session = $result['username']; //username = DB
    $id_user_session = $result['id_user'];
    $email_session = $result['email'];
    $pass_session = $result['password'];
    
    $data_db = mysqli_query($conn, "SELECT fullname FROM data_user WHERE (email = '$email') OR (username = '$email') ");
    $result_fullname = mysqli_fetch_assoc($data_db);

    $fname = $result_fullname['fullname']; //FULLNAME

    $username_login = $result['username']; //username = DB
    $email_login = $result['email']; //email = nama row di DB Table
    $password_login = $result['password']; //password = nama row di DB Table

    if (empty($email) OR empty($pass)) {
      echo '<script language="javascript">
              swal({
                   title: "GAGAL!",
                   text: "Data harus diisi semua",
                   type: "error"
               }).then(function() {
                   window.location = "../login.php";
               });
        </script>';
    }
    else{
      
      if (($email == $email_login AND $pass == $password_login) OR ($email == $username_login AND $pass == $password_login)){
        if (isset($_POST['ingat'])) {
          setcookie('id',$result['id_user'],time()+3600,'/','localhost');
          setcookie('username',hash('Sha256', $result['username']),time() +3600,'/','localhost');
          setcookie('fn',$result_fullname['fullname'],time()+3600,'/','localhost');
          if ($email == 'admin' OR $email == 'admin@admin') {
            setcookie('admin',hash('Sha256','fullakses'),time()+3600,'/','localhost');
          }
        }
      session_start();
      $_SESSION['username'] = $username_session;
      $_SESSION['id_user'] = $id_user_session;
      $_SESSION['email'] = $email_session;
      $_SESSION['password'] = $pass_session;
      $_SESSION['fullname'] = $fname;
          if ($email == 'admin' OR $email == 'admin@admin') {
            $ses_admin = 'admin';
            $_SESSION['admin'] = $ses_admin;
          }
        echo '<script language="javascript">
              swal({
                   title: "BERHASIL LOGIN!",
                   text: "Have Fun",
                   type: "success"
               }).then(function() {
                   window.location = "../index.php?welcome=home";
               });
        </script>';
      // header("location:index.php?welcome=home");



      }
      else{
        echo '<script language="javascript">
              swal({
                   title: "GAGAL!",
                   text: "Username atau Password Salah",
                   type: "error"
               }).then(function() {
                   window.location = "../login.php";
               });
        </script>';
      }
    }
  }
?>
</body>
</html>