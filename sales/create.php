<?php
require '../koneksi.php';

include '../layouts/header.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input New Sales</h1>
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
        <h3 class="card-title">
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <div class="card-body">
        <form action="proses.php" method="POST">
          <div class="mb-3">
            <label for="1" class="form-label">Nama Sales</label>
            <input type="text" name="nama_sales" class="form-control" id="1" placeholder="Inputkan Nama Sales" required>
          </div>

          <div class="mb-3">
            <label for="1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="1" placeholder="Inputkan username Sales" required>
          </div>

          <div class="mb-3">
            <label for="1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="1" placeholder="Inputkan Password Sales" required>
          </div>

          <div class="mb-3">
            <label for="1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" placeholder="Alamat Toko" id="floatingTextarea"></textarea>
          </div>

          <button type="submit" name="cek" class="btn btn-primary">submit</button>
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