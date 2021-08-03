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
          <h1>Toko</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <a href="create.php" class="btn btn-primary">New Toko</a>
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Nama Toko</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM toko") or die(mysqli_error($koneksi));
            $no = 1;
            while ($t = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $t['nama_toko'] ?></td>
                <td><?php echo $t['alamat'] ?></td>
                <td>
                  <a href="hapus.php?id=<?php echo $t['id_toko']; ?>" class="btn btn-danger"> Hapus</a>
                  <a href="edit.php?id=<?php echo $t['id_toko']; ?>" class="btn btn-info"> Edit</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>NO</th>
              <th>Nama Toko</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>


  </section>

</div>


<?php
include '../layouts/footer.php';
?>