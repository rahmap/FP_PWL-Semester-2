<?php 

  if (isset($_POST['submit'])) {
     $nautor = $_POST['nama-autor'];
     $komen_form = $_POST['komentar']; $komen_form = addslashes($komen_form);
     $waktu = $_POST['waktu'];
     // $komen_form=strip_tags($komen_form, '<a><b><i>');
     $komen_form=htmlspecialchars($komen_form);
     
    
    if (empty($komen_form)) {
      echo '<script language="javascript">
           swal({
                title: "Isi komentar dulu!",
            }).then(function() {
                window.location = "index.php#tulis";
            });
      </script>';
    }
    else {
      $kirim_komen = mysqli_query($conn_komen, "INSERT INTO komen SET nama = '$nautor', komentar = '$komen_form', waktu ='$waktu' ");
    }
  }
  ?>
  <!-- FORM KOMENTAR -->
  <hr>
    <div class="py-5" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="" method="POST" action="#komentar" >
            <div class="form-group" >
              <input style="display: none;" name="waktu" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y H:i'); ?>"></input>
              <input style="width: 250px;" type="text" name="nama-autor" readonly class="pb-name-textarea form-control" value="<?php 
              if(isset($_COOKIE['id'])){
                    echo $_COOKIE['fn']; }
                  else if (isset($_SESSION['username'])) {  
                    echo $_SESSION['fullname']; } else echo "Anonymous" ?>"> </div>
            <textarea placeholder="Tulis komentarmu di sini!" name="komentar" class="pb-cmnt-textarea"></textarea>
                <button type="submit" class="btn btn-primary" name="submit" >Kirim Komentar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- FORM KOMENTAR -->
  <?php include 'komentar-conn.php'; include 'koneksi.php';
    $data = mysqli_query($conn_komen, "SELECT * FROM komen ORDER BY 'nomer' ASC ");
    $warna = 0;
  ?>
<?php while ($hasil = mysqli_fetch_assoc($data)) { //PERULANGAN DI SINI
    $penulis = $hasil['nama'];
    $gambar_user = mysqli_query($conn, "SELECT gambar FROM data_user WHERE fullname = '$penulis' ");
    $g_user = mysqli_fetch_assoc($gambar_user);
?>
<ul class="comment-section">
      <li class="comment <?php if ($warna%2 == 1) { echo 'user-comment'; }else if($warna%2 == 0){ echo 'author-comment'; } ?>"  >
       <?php  $warna++; //$mod = $warna%2; echo $warna." mod ".$mod; ?> <!-- TES MODULUS IF ELSE -->
                <div class="info">
                    <a href="#"><?php echo $hasil['nama'] ?></a>
                    <span><?php echo $hasil['waktu'] ?></span>
                    
                </div>
                <a class="avatar" href="#">
                    <img src="img_user/<?php if($penulis == 'Anonymous'){echo 'aa.png'; } else echo $g_user['gambar']; ?>" width="35" alt="Profile Avatar" style='border-radius: 2px;' />
                </a>
                <p><?php echo stripslashes($hasil['komentar']) ?> </p>
      </li>
    </ul>
<?php } ?> <!-- AKHIR WHILE -->
  <!-- Alert -->
  <?php if(isset($kirim_komen)){ ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-<?php
            if($kirim_komen){
            echo'success';}elseif(!$kirim_komen) {echo'danger';}  ?>"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
            <?php if ($kirim_komen) {
              echo '<p class="mb-0 text-center"><b>Komentar Berhasil di Kirim!</b> Berkomentar lah dengan bijak.</p>';
            }else echo '<p class="mb-0 text-center"><b>Komentar Gagal di Kirim!</b> Cek kembali komentar anda.</p>'; ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- Alert -->
  <div class="text-center">
    <div class="col-12">
        <a href="#tulis"><button type="submit" class="btn btn-danger">Tulis Komentar</button></a>
    </div>
  </div>
  </div>