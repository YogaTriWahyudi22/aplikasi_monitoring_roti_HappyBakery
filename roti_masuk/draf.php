<?php
require '../koneksi.php';

include '../layouts/header.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Draf Roti Masuk</h1>
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
    <div class="card">
      <div class="card-header">
        <form action="session_tgl.php" method="post">
          <div class="mb-3">
            <input type="hidden" name="halaman" value="draf">
            <?php
            if (isset($_SESSION['tanggal_cek'])) {

              $tgl = $_SESSION['tanggal_cek'];
            } else {
              $tgl = date('d-m-Y');
            }
            ?>
            <input type="date" onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>" class="form-control">
          </div>
          <h3 class="card-title"><a href="create.php" class="btn btn-primary">New Roti Masuk</a></h3>
        </form>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Varian Rasa</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">tanggal</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION['tanggal_cek'])) {
              $tgl = $_SESSION['tanggal_cek'];
              $query = mysqli_query($koneksi, "SELECT * FROM draf INNER JOIN varian_rasa ON draf.id_rasa = varian_rasa.id_rasa INNER JOIN karyawan ON draf.id_user = id_user WHERE tanggal = '$tgl' ") or die(mysqli_error($koneksi));
            } else {
              $tgl = date('d-m-Y');
              $query = mysqli_query($koneksi, "SELECT * FROM draf INNER JOIN varian_rasa ON draf.id_rasa = varian_rasa.id_rasa INNER JOIN karyawan ON draf.id_user = id_user ORDER BY tanggal ASC ") or die(mysqli_error($koneksi));
            }

            $no = 1;
            while ($t = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $t['varian_rasa'] ?></td>
                <td><?php echo $t['nama_karyawan'] ?></td>
                <td><?php echo $t['jumlah'] ?></td>
                <td><?php echo $t['tanggal'] ?></td>
                <td><a href="hapus.php?id=<?php echo $t['id']; ?>" class="btn btn-danger"> Hapus</a></td>
              </tr>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">Varian Rasa</th>
              <th scope="col">Nama Karyawan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">tanggal</th>
              <th scope="col">Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="card-footer">
        <div class="float-right">
          <a href="save.php" class="btn btn-danger">Save</a>
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