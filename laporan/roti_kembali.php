<?php
require '../koneksi.php';
include '../layouts/header.php';
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Roti Kembali Dari Toko </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Roti Kembali</li>
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
                    <input type="hidden" value="roti_kembali" name="halaman">
                    <?php
                    if (isset($_SESSION['tanggal_cek'])) {
                        $tgl = $_SESSION['tanggal_cek'];
                    } else {
                        $tgl = date('d-m-Y');
                    }
                    ?>
                    <input type="date" class="form-control mb-3 " onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>">
                </form>
                <a href="../cetak/cetak_roti_kembali.php" target="_blank" class="btn btn-info"><i class="fas fa-print">&nbsp;Print</i> </a>
                <a href="../cetak/destroy.php?halaman=roti_kembali" class=" btn btn-danger">Reset</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['tanggal_cek'])) {
                            $tgl = $_SESSION['tanggal_cek'];
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_kembali INNER JOIN varian_rasa ON roti_kembali.id_rasa = varian_rasa.id_rasa INNER JOIN toko on roti_kembali.id_toko = toko.id_toko INNER JOIN roti_sampai on roti_kembali.id_ds = roti_sampai.id_ds WHERE tanggal_kembali = '$tgl' ") or die(mysqli_error($koneksi));
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_kembali INNER JOIN varian_rasa ON roti_kembali.id_rasa = varian_rasa.id_rasa INNER JOIN toko on roti_kembali.id_toko = toko.id_toko INNER JOIN roti_sampai on roti_kembali.id_ds = roti_sampai.id_ds ORDER BY tanggal_kembali ASC ") or die(mysqli_error($koneksi));
                        }

                        $no = 1;
                        while ($p = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no++; ?></th>
                                <td><?php echo $p['varian_rasa'] ?></td>
                                <td><?php echo $p['jumlah'] ?></td>
                                <td><?php echo $p['tanggal'] ?></td>
                                <td><?php echo $p['nama_toko'] ?></td>
                                <td><?php echo $p['alamat'] ?></td>
                                <td><?php echo $p['tanggal_kembali'] ?></td>
                                <td><?php echo $p['jumlah_kembali'] ?></td>
                                <td><?php echo $p['status_roti'] ?></td>
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