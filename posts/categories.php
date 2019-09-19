<?php include '../data/koneksi.php'; session_start(); 
if (!isset($_GET['id'])) {
  header("location:../index.php"); }  
?>
<!DOCTYPE html>
<html>

<head>
  <title>Beruk Jantan - Home</title>
  <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/komentar.css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="bg-dark">
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
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a href="#" class="active nav-link"> <i class="fa fa-star"></i>&nbsp;Popular Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="postingan.php?id_post=vainglory_apk"><b>Vainglory</b></a>
            </li>
            <li class="nav-item">
              <a href="postingan.php?id_post=sublime_text_3" class="nav-link"><b>Sublime Text 3</b></a>
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
              <a href="categories.php?id=<?php echo $res_android['category'] ?>" class="nav-link">Android</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categories.php?id=<?php echo $res_pc['category'] ?>">PC</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-4 text-dark bg-light">
    <div class="container">
      <div class="row">
        <?php 
        $query_post = mysqli_query($conn, "SELECT * FROM postingan WHERE category = '".$_GET['id']."' ");
        foreach ($query_post as $key) {
        ?>
        <div class="col-md-4 my-3">
          <div class="card">
            <img class="img-fluid" src="../img/post/<?php echo$key['gambar'] ?>" alt="Card image">
            <div class="card-body">
              <h6 class="card-subtitle"><b><?php echo stripslashes($key['judul_post']); ?></b>
                <br> </h6>
              <p class="card-text p-y-1 text-left"><?php echo $key['tumb_post']; ?></p>
              <a href="postingan.php?id_post=<?php echo $key['id_post'] ?>" class="card-link">Read More</a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

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