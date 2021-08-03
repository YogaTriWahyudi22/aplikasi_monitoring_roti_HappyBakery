<?php
require '../koneksi.php';

include '../layouts/header.php';
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Varian Rasa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit Varian Rasa</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <?php
      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "SELECT * FROM varian_rasa where id_rasa = '$id' ") or die(mysqli_error($koneksi));
      $no = 1;
      while ($t = mysqli_fetch_array($query)) {

      ?>
        <div class="card-body">
          <form action="proses_edit.php" method="post">
            <input type="hidden" name="id_rasa" value="<?php echo $t[0]; ?>">
            <div class="mb-3">
              <label for="1" class="form-label">Varian Rasa</label>
              <input type="text" name="varian_rasa" value="<?php echo $t[1]; ?>" class="form-control" id="1">
            </div>
          <?php } ?>
          <button type="submit" name="cek" class="btn btn-primary">Update</button>
          <a href="index.php" class="btn btn-danger">Back</a>
          </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../layouts/footer.php';
?>