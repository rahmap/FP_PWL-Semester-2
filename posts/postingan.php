<?php include '../data/koneksi.php'; session_start(); 
if (!isset($_GET['id_post'])) {
  header("location:../index.php"); }  
?>
<!DOCTYPE html>
<html>

<head>
  <title>Beruk Jantan - Download dan Sharing Tips</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><i class="fa d-inline fa-lg fa-home"></i></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="alert('Not Found')">Contact us</a>
          </li>
        </ul>
        <form class="form-inline m-0">
          <input class="form-control mr-2" id="pencarian" type="text" placeholder="Cari...">
          <input class="btn btn-primary " type="button" onclick="searchFn()" value="Search"> </form>
      </div>
    </div>
  <?php
    include '../data/koneksi.php'; 

    if (isset($_COOKIE['username'])) {
          echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/logout.php"><i class="fa d-inline fa-lg fa fa-sign-out"></i> Log Out</a>';
          if ($_COOKIE['id'] == '1') {
            echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/"><i class="fa d-inline fa-lg fa fa-wrench"></i> Admin Panel</a>';
          }else{
             echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../user/member.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Member Area</a>'; }
    }
    else if(isset($_SESSION['username'])){
          echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/logout.php"><i class="fa d-inline fa-lg fa fa-sign-out"></i> Log Out</a>';
          if ($_SESSION['username'] == 'admin') {
            echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../data/"><i class="fa d-inline fa-lg fa fa-wrench"></i> Admin Panel</a>';
          }else{
             echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../user/member.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Member Area</a>'; }
    }
    else{
        echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../login.php"><i class="fa d-inline fa-lg fa fa-sign-in"></i> Sign in</a>';
        echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="../register.php"><i class="fa d-inline fa-lg fa-address-card-o"></i> Register</a>';
    }
  ?>
  </nav>
  <?php 
    $query_post = mysqli_query($conn, "SELECT * FROM postingan WHERE id_post = '".$_GET['id_post']."' ");
    $post = mysqli_fetch_assoc($query_post);
  ?>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center display-3 text-primary"><?php echo stripslashes($post['judul_post']); ?></h1>
        </div>
      </div>
    </div>
  </div>
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <img class="img-fluid d-block w-50 mx-auto rounded" src="../img/post/<?php echo $post['gambar'] ?>"> </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="text-justify my-3"><?php echo $post['isi_post'] ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <?php
          if ($post['link'] != null) {          
            if (isset($_COOKIE['username']) OR isset($_SESSION['username'])) {
              echo '<a class="btn btn-success" target="_blank" href="'.$post['link'].'">DOWNLOAD</a>';
            }else{
              echo '<a class="btn btn-danger"  data-toggle="modal" data-target="#download" href="" >DOWNLOAD <i class="fa d-inline fa-lg fa-lock -circle-o"></i></a>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
    <hr>
  <div class="py-5">
    <div class="container">
      <div class="row">
<!--         <div class="col-md-4 text-left">
          <a class="btn btn-primary" href="clash-of-clans.php">Previous </a>
        </div> -->
        <div class="col-md-12 text-center">
          <a href="../index.php" class="btn btn-outline-primary">Home</a>
        </div>
<!--         <div class="col-md-4 text-right">
          <a class="btn btn-primary text-right" href="angry-birds.php">Next</a>
        </div> -->
      </div>
    </div>
  </div>
  <div class="py-1 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Rahmatvv - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL BOX -->
  <div class="modal" id="download">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tidak Bisa Download !</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Untuk download anda harus login terlebih dahulu.</p>
        </div>
        <div class="modal-footer">
          <a href="../login.php"><button type="button" class="btn btn-primary">Login</button></a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>