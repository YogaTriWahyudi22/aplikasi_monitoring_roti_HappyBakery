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
          <h1>Edit</h1>
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
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <?php
      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "SELECT * FROM toko where id_toko = '$id' ") or die(mysqli_error($koneksi));
      $no = 1;
      while ($t = mysqli_fetch_array($query)) {

      ?>
        <div class="card-body">
          <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id_toko" value="<?php echo $t[0]; ?>">
            <div class="mb-3">
              <label for="1" class="form-label">Nama Toko</label>
              <input type="text" name="nama_toko" value="<?php echo $t[1]; ?>" class="form-control" id="1" placeholder="Inputkan Username">
            </div>

            <div class="mb-3">
              <label for="1" class="form-label">Alamat Toko</label>
              <input name="alamat" class="form-control" value="<?php echo $t[2]; ?>" placeholder="Alamat Toko" required>
              </input>
            </div>
          <?php } ?>
          <button type="submit" name="cek" class="btn btn-primary">edit</button>
          <a href="index.php" class="btn btn-warning">Back</a>
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