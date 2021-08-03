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
            <li class="breadcrumb-item active">Karyawan</li>
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
        <h3 class="card-title">Form Edit</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <?php
      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "SELECT * FROM karyawan where username = '$id' ") or die(mysqli_error($koneksi));
      $no = 1;
      while ($t = mysqli_fetch_array($query)) {

      ?>
        <div class="card-body">
          <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id_karyawan" value="<?php echo $t[0]; ?>">
            <div class="mb-3">
              <label for="1" class="form-label">Nama Karyawan</label>
              <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $t['nama_karyawan'] ?>" id="1" required>
            </div>

            <div class="mb-3">
              <label for="1" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $t['username'] ?>" id="1" required>
            </div>

            <div class="mb-3">
              <label for="1" class="form-label">Password</label>
              <input type="password" name="pass" class="form-control" value="<?php echo $t['password'] ?>" id="1" required>
            </div>

            <div class="mb-3">
              <label for="1" class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat_karyawan">
              <?php echo $t['alamat_karyawan']; ?>
              </textarea>
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