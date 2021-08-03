<?php
require '../koneksi.php';
include '../layouts/header.php';
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Roti Sampai Toko</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Roti Sampai</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-header">
                <form action="session_tgl.php" method="POST">
                    <input type="hidden" value="roti_sampai" name="halaman">
                    <?php
                    if (isset($_SESSION['tanggal_cek'])) {
                        $tgl = $_SESSION['tanggal_cek'];
                    } else {
                        $tgl = date('d-m-Y');
                    }
                    ?>
                    <input type="date" class="form-control mb-3" onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>">
                </form>
                <a href="../cetak/cetak_roti_sampai.php" target="_blank" class="btn btn-info"><i class="fas fa-print">&nbsp;Print</i> </a>
                <a href="../cetak/destroy.php?halaman=roti_sampai" class=" btn btn-danger">Reset</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Varian Rasa</th>
                            <th>Jumlah</th>
                            <th>Nama Sales</th>
                            <th>Nama Toko</th>
                            <th>Alamat Toko</th>
                            <th>tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_SESSION['tanggal_cek'])) {
                            $tgl = $_SESSION['tanggal_cek'];
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_sampai INNER JOIN varian_rasa ON roti_sampai.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_sampai.id_user = user.id INNER JOIN toko on roti_sampai.id_toko = toko.id_toko Where tanggal = '$tgl'") or die(mysqli_error($koneksi));
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_sampai INNER JOIN varian_rasa ON roti_sampai.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_sampai.id_user = user.id INNER JOIN toko on roti_sampai.id_toko = toko.id_toko ORDER BY tanggal ASC ") or die(mysqli_error($koneksi));
                        }

                        $no = 1;
                        while ($t = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $t['varian_rasa'] ?></td>
                                <td><?php echo $t['jumlah'] ?></td>
                                <td><?php echo $t['username'] ?></td>
                                <td><?php echo $t['nama_toko'] ?></td>
                                <td><?php echo $t['alamat'] ?></td>
                                <td><?php echo $t['tanggal'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Varian Rasa</th>
                            <th>Jumlah</th>
                            <th>Nama Sales</th>
                            <th>Nama Toko</th>
                            <th>Alamat Toko</th>
                            <th>tanggal</th>
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