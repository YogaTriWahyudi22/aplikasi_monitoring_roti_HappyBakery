<?php
require '../koneksi.php';

include '../layouts/header.php';
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Monitoring Happy Bakery</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
            <li class="breadcrumb-item active">Roti Kembali</li>
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
        <h3 class="card-title">Roti Dikembalikan </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>
      <div class="card-body">
        <form action="proses.php" method="POST">
          <!-- Button trigger modal -->
          <label>Informasi Roti Masuk</label>
          <select class="form-control form-select-lg mb-3" id="pilih" onchange="kategori()" name="rasa">
            <option>Pilih Menu</option>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM  roti_sampai INNER JOIN varian_rasa ON roti_sampai.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_sampai.id_user = user.id INNER JOIN toko on roti_sampai.id_toko = toko.id_toko") or die(mysqli_error($koneksi));
            $no = 1;
            while ($t = mysqli_fetch_array($query)) {

            ?>
              <option id="hasil" value="<?php echo $t[0]; ?>"><?php echo $t['tanggal']; ?> ---- <?php echo $t['varian_rasa']; ?></option>

            <?php } ?>
          </select>

          <!-- Modal -->
          <?php

          $query = mysqli_query($koneksi, "SELECT * FROM  roti_sampai INNER JOIN varian_rasa ON roti_sampai.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_sampai.id_user = user.id INNER JOIN toko on roti_sampai.id_toko = toko.id_toko ") or die(mysqli_error($koneksi));
          $no = 1;
          while ($p = mysqli_fetch_array($query)) {

          ?>
            <div class="modal fade" id="modal-default<?php echo $p['id_ds']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informasi Roti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <label> Varian Rasa </label>
                    <p><?php echo $p['varian_rasa']; ?></p>
                    <input type="hidden" value="<?php echo $p['id_rasa']; ?>">
                    <label> Nama Sales </label>
                    <p><?php echo $p['username']; ?></p>

                    <input type="hidden" value="<?php echo $p['id_user']; ?>">

                    <label> Nama Toko </label>
                    <p><?php echo $p['nama_toko']; ?></p>

                    <input type="hidden" value="<?php echo $p['id_toko']; ?>">

                    <p> <label> Jumlah Roti Terkirim : </label> <?php echo $p['jumlah']; ?> </p>
                    <p> <label> Tanggal Pengiriman ke Toko : </label> <?php echo $p['tanggal']; ?> </p>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <p>
            <?php } ?>
            <div class="mb-3">
              <label for="1" class="form-label">Jumlah Roti Kembali </label>
              <input type="text" name="jumlah_kembali" class="form-control" id="1">
            </div>

            <div class="mb-3">
              <label for="1" class="form-label">Keadaan Roti </label>
              <select class="form-control" name="status_roti" aria-label="Default select example">
                <option selected>Keadaan Roti</option>
                <option value="rusak">Rusak</option>
                <option value="Kembali">Kembali</option>
              </select>
            </div>

            <button type="submit" name="cek" class="btn btn-primary">Submit</button>
            <a href="draf.php" class="btn btn-danger">Back</a>
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
<script>
  function kategori() {
    var tes = document.getElementById("pilih").value;

    $('#modal-default' + tes).modal('show');

  }
</script>


<?php
include '../layouts/footer.php';
?>