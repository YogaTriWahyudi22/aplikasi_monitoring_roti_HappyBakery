<?php
require '../koneksi.php';
include '../layouts/header.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input New Akun</h1>
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
        <h3 class="card-title">New Akun</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <div class="card-body">
        <form action="proses.php" method="POST">
          <div class="mb-3">
            <label for="1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="1" placeholder="Inputkan Username" required>
          </div>

          <div class="mb-3">
            <label for="1" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="1" placeholder="Inputkan Password" required>
          </div>
        
         <div class="mb-3">
             <label for="1" class="form-label">Status</label>
            <select class="form-control" name="status" aria-label="Default select example">
              <option selected>Status</option>
              <option value="admin">Admin</option>
              <option value="pimpinan">Pimpinan</option>
            </select>
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