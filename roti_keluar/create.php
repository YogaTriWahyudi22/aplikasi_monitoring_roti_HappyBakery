<?php
require '../koneksi.php';

include '../layouts/header.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Input Roti Keluar </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
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
        <h3 class="card-title">New Roti keluar </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <div class="card-body">
        <form action="proses.php" method="POST">
          <label for="">Varian Rasa</label>
          <select class="form-control form-select-lg mb-3" name="rasa">
            <?php

            $query = mysqli_query($koneksi, "SELECT * FROM varian_rasa") or die(mysqli_error($koneksi));
            $no = 1;
            while ($t = mysqli_fetch_array($query)) {
              $jumlah = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT SUM(jumlah) as jumlah FROM roti_masuk where id_rasa = '$t[id_rasa]' "));
            ?>
              <option value="<?php echo $t[0]; ?>"><?php echo $t[1]; ?> <?php if (isset($jumlah)) {
                                                                          echo '-- ' . $jumlah['jumlah'];
                                                                        } ?></option>
            <?php } ?>
            <!-- <option value="2">Two</option>
                <option value="3">Three</option> -->
            <?php echo $jumlah ?>
          </select>

          <label for="">Nama Sales</label>
          <select class="form-control form-select-lg mb-3" name="nama_sales">
            <?php

            $query = mysqli_query($koneksi, "SELECT * FROM sales") or die(mysqli_error($koneksi));
            $no = 1;
            while ($t = mysqli_fetch_array($query)) {

            ?>
              <option value="<?php echo $t[0]; ?>"><?php echo $t[1]; ?></option>
            <?php } ?>
            <!-- <option value="2">Two</option>
                <option value="3">Three</option> -->
          </select>


          <div class="mb-3">
            <label for="1" class="form-label">Jumlah</label>
            <input type="text" name="jumlah" class="form-control" id="1">
          </div>

          <button type="submit" name="cek" class="btn btn-primary">Submit</button>
          <a href="index.php" class="btn btn-danger">Back</a>
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