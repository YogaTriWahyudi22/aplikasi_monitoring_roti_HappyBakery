<?php
require '../koneksi.php';
include '../layouts/header.php';
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rekapitulasi </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../home/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Roti Kembali</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-header">
                <form action="session_tgl.php" method="POST">
                    <input type="hidden" value="rekapitulasi" name="halaman">
                    <?php
                    if (isset($_SESSION['tanggal_cek'])) {
                        $tgl = $_SESSION['tanggal_cek'];
                    } else {
                        $tgl = date('d-m-Y');
                    }
                    ?>
                    <input type="date" class="form-control mb-3" onchange="this.form.submit();" value="<?php echo $tgl; ?>" name="tanggal_cek">
                </form>
                <a href="../cetak/rekapitulasi.php" target="_blank" class="btn btn-info"><i class="fas fa-print">&nbsp;Print</i> </a>
                <a href="../cetak/destroy.php?halaman=rekapitulasi" class=" btn btn-danger">Reset</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Jumlah Roti Masuk</th>
                                <th>Jumlah Roti Keluar</th>
                                <th>Jumlah Roti Sampai</th>
                                <th>Jumlah Roti Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['tanggal_cek'])) {
                                $tgl = $_SESSION['tanggal_cek'];
                                $query = mysqli_query($koneksi, "SELECT (SELECT sum(roti_masuk.jumlah) FROM roti_masuk WHERE roti_masuk.tanggal = '$tgl') as jumlahrotimasuk, (SELECT sum(roti_keluar.jumlah) FROM roti_keluar WHERE roti_keluar.tanggal = '$tgl') as jumlahrotikeluar, (SELECT sum(roti_sampai.jumlah) FROM roti_sampai WHERE roti_sampai.tanggal = '$tgl') as jumlahrotisampai, (SELECT sum(roti_kembali.jumlah_kembali) FROM roti_kembali WHERE roti_kembali.tanggal_kembali = '$tgl') as jumlahrotikembali") or die(mysqli_error($koneksi));
                            } else {
                                $query = mysqli_query($koneksi, "SELECT (SELECT sum(roti_masuk.jumlah) FROM roti_masuk) as jumlahrotimasuk, (SELECT sum(roti_keluar.jumlah) FROM roti_keluar) as jumlahrotikeluar, (SELECT sum(roti_sampai.jumlah) FROM roti_sampai) as jumlahrotisampai, (SELECT sum(roti_kembali.jumlah_kembali) FROM roti_kembali) as jumlahrotikembali") or die(mysqli_error($koneksi));
                            }

                            $no = 1;
                            while ($p = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td>
                                        <?php
                                        if ($p['jumlahrotimasuk']) {
                                            echo $p['jumlahrotimasuk'];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($p['jumlahrotikeluar']) {
                                            echo $p['jumlahrotikeluar'];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($p['jumlahrotisampai']) {
                                            echo $p['jumlahrotisampai'];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        if ($p['jumlahrotikembali']) {
                                            echo $p['jumlahrotikembali'];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>Jumlah Roti Masuk</th>
                                <th>Jumlah Roti Keluar</th>
                                <th>Jumlah Roti Sampai</th>
                                <th>Jumlah Roti Kembali</th>
                            </tr>
                        </tfoot>
                    </table>
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