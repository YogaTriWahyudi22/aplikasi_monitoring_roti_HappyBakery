<?php
require '../koneksi.php';

include '../layouts/header.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Draf Roti Sampai</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">draf</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
        <form action="session_tgl.php" method="POST">
          <?php
          if (isset($_SESSION['tanggal_cek'])) {
            $tgl = $_SESSION['tanggal_cek'];
          } else {
            $tgl = date('d-m-Y');
          }
          ?>
          <input type="hidden" name="halaman" value="draf">
          <input type="date" class="form-control" onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>"> <br>
          <a href="create.php" class="btn btn-primary"> New Roti Kembali </a><br>
        </form>
      </div>

      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Varian Rasa</th>
              <th>Jumlah Roti Sampai</th>
              <th>Tanggal Roti Sampai</th>
              <th>Nama Toko</th>
              <th>Alamat Toko</th>
              <th>Tanggal Roti Kembali</th>
              <th>Jumlah Roti Kembali</th>
              <th>Keadaan Roti</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // $query = mysqli_query($koneksi, "SELECT * FROM coba INNER JOIN roti_sampai on coba.id_ds = roti_sampai.id_ds Where tanggal_kembali = '$tgl'") or die(mysqli_error($koneksi));
            $query = mysqli_query($koneksi, "SELECT * FROM draf_kembali INNER JOIN varian_rasa ON draf_kembali.id_rasa = varian_rasa.id_rasa INNER JOIN user ON draf_kembali.id_user = user.id INNER JOIN toko on draf_kembali.id_toko = toko.id_toko INNER JOIN roti_sampai on draf_kembali.id_ds = roti_sampai.id_ds Where tanggal_kembali = '$tgl'") or die(mysqli_error($koneksi));

            $no = 1;
            while ($t = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo $t['varian_rasa'] ?></td>
                <td><?php echo $t['jumlah'] ?></td>
                <td><?php echo $t['tanggal'] ?></td>
                <td><?php echo $t['nama_toko'] ?></td>
                <td><?php echo $t['alamat'] ?></td>
                <td><?php echo $t['tanggal_kembali'] ?></td>
                <td><?php echo $t['jumlah_kembali'] ?></td>
                <td><?php echo $t['status_roti'] ?></td>
                <td><a href="hapus.php?id=<?php echo $t['id_dk']; ?>" class="btn btn-danger"> Hapus</a></td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>NO</th>
              <th>Varian Rasa</th>
              <th>Jumlah Roti Sampai</th>
              <th>Tanggal Roti Sampai</th>
              <th>Nama Toko</th>
              <th>Alamat Toko</th>
              <th>Tanggal Roti Kembali</th>
              <th>Jumlah Roti Kembali</th>
              <th>Keadaan Roti</th>
              <th>Aksi</th>
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