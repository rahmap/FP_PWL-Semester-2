<?php //DATA DI ADMIN

  if (isset($_GET['id'])) {
    $query_modal = mysqli_query($conn, "SELECT gambar FROM data_user WHERE id_user = '".$_GET['id']."' ");
    $row_modal = mysqli_fetch_assoc($query_modal);
  ?>
  <div class="modal" id="download" data-backdrop="static" data-keyboard="false" href="#">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Photo Profile</h5>
<!--           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <a href="admin.php"><span aria-hidden="true">×</span></a>
          </button> -->
        </div>
        <div class="modal-body">
          <img width="420px" style="margin-left: 23px " class="text-center" alt="Card image cap" src="../img_user/<?php echo $row_modal['gambar'] ?>">
        </div>
        <div class="modal-footer">
          <a href="index.php"><button type="button" class="btn btn-primary">Close</button></a>
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>
  <?php } ?>