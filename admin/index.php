<?php
require '../koneksi.php';
include '../layouts/header.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <a href="create.php" class="btn btn-primary">Tambah Petinggi</a>
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Username</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM user where status = 'admin' or status = 'pimpinan' ") or die(mysqli_error($koneksi));
            $no = 1;
            while ($t = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $t['username'] ?></td>
                <td><?php echo $t['status'] ?></td>
                <td> <a href="hapus.php?id=<?php echo $t['id']; ?>" class="btn btn-danger"> Hapus</a>
                  <a href="edit.php?id=<?php echo $t['id']; ?>" class="btn btn-info"> Edit</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Nomor</th>
              <th>Username</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
        </div>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../layouts/footer.php';
?>