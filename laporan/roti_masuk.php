<?php
require '../koneksi.php';
include '../layouts/header.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan Roti Masuk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
            <li class="breadcrumb-item active">Laporan Roti Masuk</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header">
        <form action="session_tgl.php" method="POST">
          <input type="hidden" value="roti_masuk" name="halaman">
          <?php
          if (isset($_SESSION['tanggal_cek'])) {
            $tgl = $_SESSION['tanggal_cek'];
          } else {
            $tgl = date('d-m-Y');
          }
          ?>
          <input type="date" class="form-control mb-3" onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>">
        </form>
        <a href="../cetak/cetak_roti_masuk.php" target="_blank" class="btn btn-info"><i class="fas fa-print">&nbsp;Print</i> </a>
        <a href="../cetak/destroy.php?halaman=roti_masuk" class=" btn btn-danger">Reset</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Varian Rasa</th>
              <th>Nama Karyawan</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION['tanggal_cek'])) {
              $tgl = $_SESSION['tanggal_cek'];
              $query = mysqli_query($koneksi, "SELECT * FROM roti_masuk INNER JOIN varian_rasa ON roti_masuk.id_rasa = varian_rasa.id_rasa  INNER JOIN user ON roti_masuk.id_user = user.id INNER JOIN karyawan ON roti_masuk.id_user = user.id WHERE tanggal= '$tgl' ") or die(mysqli_error($koneksi));
            } else {
              $query = mysqli_query($koneksi, "SELECT * FROM roti_masuk INNER JOIN varian_rasa ON roti_masuk.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_masuk.id_user = user.id INNER JOIN karyawan ON roti_masuk.id_user = user.id ORDER BY tanggal ASC ") or die(mysqli_error($koneksi));
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
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>NO</th>
              <th>Varian Rasa</th>
              <th>Nama Karyawan</th>
              <th>Jumlah</th>
              <th>Tanggal</th>
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