<!DOCTYPE html>
<html>

<head>
  <title>Beruk Jantan - Home</title>
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/komentar.css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="bg-dark">
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="fa d-inline fa-lg fa-home"></i></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
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
  // print_r($_COOKIE);
    include 'data/koneksi.php'; 
    session_start();
    if (isset($_COOKIE['username'])) {
          echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="data/logout.php"><i class="fa d-inline fa-lg fa fa-sign-out"></i> Log Out</a>';
          if ($_COOKIE['id'] == '1') {
            echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="data/"><i class="fa d-inline fa-lg fa fa-wrench"></i> Admin Panel</a>';
          }else{
             echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="user/member.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Member Area</a>'; }
    }
    else if(isset($_SESSION['username'])){
          echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="data/logout.php"><i class="fa d-inline fa-lg fa fa-sign-out"></i> Log Out</a>';
          if ($_SESSION['username'] == 'admin') {
            echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="data/"><i class="fa d-inline fa-lg fa fa-wrench"></i> Admin Panel</a>';
          }else{
             echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="user/member.php"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Member Area</a>'; }
    }
    else{
        echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="login.php"><i class="fa d-inline fa-lg fa fa-sign-in"></i> Sign in</a>';
        echo '<a class="btn navbar-btn btn-primary ml-2 text-white" href="register.php"><i class="fa d-inline fa-lg fa-address-card-o"></i> Register</a>';
    }
  ?> 
  </nav>
  <div class="py-5 text-center opaque-overlay" style="background-image: url(img/bg.png);">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 text-white">
          <h1 class="display-3 mb-4">Download, Sharing And Buy Game</h1>
          <p class="lead mb-5">Sebuah website tempat download berbagai macam game, aplikasi, berbagi tips dan menjual game original</p>
            <h1 class="display-3 mb-4">
              <?php 
              if (isset($_GET['welcome'])) {
                  $welcome=$_GET['welcome'];
                  if ($welcome == "home") {
                    if(isset($_COOKIE['id'])){
                      echo "Welcome ".$_COOKIE['fn'];
                    }
                    else if (isset($_SESSION['username'])) {  
                      echo "Welcome ".$_SESSION['fullname']; }}}
              ?>
            </h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link"> <i class="fa fa-star"></i>&nbsp;Popular Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="posts/postingan.php?id_post=vainglory_apk"><b>Vainglory</b></a>
            </li>
            <li class="nav-item">
              <a href="posts/postingan.php?id_post=sublime_text_3" class="nav-link"><b>Sublime Text 3</b></a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a href="#" class="active nav-link"> <i class="fa fa-align-center"></i>&nbsp; Categories</a>
            </li>
            <?php
              $query_android = mysqli_query($conn, "SELECT category FROM postingan WHERE category = 'android' ");
              $query_pc = mysqli_query($conn, "SELECT category FROM postingan WHERE category = 'komputer' ");
              $res_android = mysqli_fetch_assoc($query_android);
              $res_pc = mysqli_fetch_assoc($query_pc);
            ?>
            <li class="nav-item">
              <a href="posts/categories.php?id=<?php echo $res_android['category'] ?>" class="nav-link">Android</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="posts/categories.php?id=<?php echo $res_pc['category'] ?>">PC</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1 text-dark bg-light">
    <div class="container">
      <div class="row">
        <?php 
        $query_post = mysqli_query($conn, "SELECT * FROM postingan");
        foreach ($query_post as $key) {
        ?>
        <div class="col-md-4 my-3">
          <div class="card">
            <img class="img-fluid" src="img/post/<?php echo$key['gambar'] ?>" alt="Card image">
            <div class="card-body">
              <h6 class="card-subtitle"><b><?php echo stripslashes($key['judul_post']); ?></b>
                <br> </h6>
              <p class="card-text p-y-1 text-left"><?php echo $key['tumb_post']; ?></p>
              <a href="posts/postingan.php?id_post=<?php echo $key['id_post'] ?>" class="card-link">Read More</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="py-4 bg-light" id="tulis">
    <div class="container">
      <div class="row bg-light">
        <div class="">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a href="#" class="page-link" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php include 'data/komentar-conn.php';include 'data/koneksi.php';
          include 'data/inc-komen.php'; ?> <!-- INCLUDE KOMENTAR -->
  <div class="py-1 bg-dark text-white" id="komentar">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 Rahmatvv - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>