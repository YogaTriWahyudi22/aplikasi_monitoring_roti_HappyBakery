<?php
require '../koneksi.php';
include '../layouts/header.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sales</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../sales/index.php">Home</a></li>
            <li class="breadcrumb-item active">Sales</li>
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
          <a href="create.php" class="btn btn-primary">Tambah Data Sales</a>
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Sales</th>
              <th>Username</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM sales") or die(mysqli_error($koneksi));
            $no = 1;
            while ($t = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $t['nama_sales'] ?></td>
                <td><?php echo $t['username'] ?></td>
                <td><?php echo $t['alamat'] ?></td>
                <td> <a href="hapus.php?id=<?php echo $t['username']; ?>" class="btn btn-danger"> Hapus</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Nomor</th>
              <th>Username</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../layouts/footer.php';
?>