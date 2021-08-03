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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Roti Kembali</li>
                    </ol>
                </div>
            </div>
        </div>
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
                    <input type="hidden" name="halaman" value="index">
                    <input type="date" class="form-control" onchange="this.form.submit();" name="tanggal_cek" value="<?php echo $tgl; ?>"> <br>
                    <a href="draf.php" class="btn btn-primary"> Tambah Roti Kembali </a>
                    <a href="../cetak/cetak_roti_kembali.php" target="_blank" class="btn btn-danger"><i class="fas fa-print">&nbsp;Print</i> </a>
                    <a href="../cetak/destroy_roti.php?roti=roti_kembali" class=" btn btn-success">Reset</a>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['tanggal_cek'])) {
                            $tgl = $_SESSION['tanggal_cek'];
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_kembali INNER JOIN varian_rasa ON roti_kembali.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_kembali.id_user = user.id INNER JOIN toko on roti_kembali.id_toko = toko.id_toko INNER JOIN roti_sampai on roti_kembali.id_ds = roti_sampai.id_ds Where tanggal_kembali = '$tgl'") or die(mysqli_error($koneksi));
                        } else {
                            $query = mysqli_query($koneksi, "SELECT * FROM roti_kembali INNER JOIN varian_rasa ON roti_kembali.id_rasa = varian_rasa.id_rasa INNER JOIN user ON roti_kembali.id_user = user.id INNER JOIN toko on roti_kembali.id_toko = toko.id_toko INNER JOIN roti_sampai on roti_kembali.id_ds = roti_sampai.id_ds ORDER BY tanggal_kembali ASC ") or die(mysqli_error($koneksi));
                        }


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
</div>

<?php
include '../layouts/footer.php';
?>